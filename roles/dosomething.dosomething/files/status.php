<?php

if (empty($_SERVER['DOCUMENT_ROOT'])) {
  exit("Please request from a server context." . PHP_EOL);
}

chdir($_SERVER['DOCUMENT_ROOT']);
define('DRUPAL_ROOT', $_SERVER['DOCUMENT_ROOT']);

// Register our shutdown function so that no other shutdown functions run
// before this one. This shutdown function calls exit(), immediately short-
// circuiting any other shutdown functions, such as those registered by the
// devel.module for statistics.
register_shutdown_function('status_shutdown');
function status_shutdown() {
  exit();
}

// Drupal bootstrap.
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_DATABASE);

// Build up our list of errors.
$errors = array();

// Check that the main database is active.
$result = db_query('SELECT * FROM {users} WHERE uid = 1');

foreach ($result as $account) {
    if (!$account->uid == 1) {
      $errors[] = 'Primary database not responding.';
    }
    break;
}

// Check that the slave database is active.
if (function_exists('db_query_slave')) {
  $result = db_query_slave('SELECT * FROM {users} WHERE uid = 1');
  $account = db_fetch_object($result);
  foreach ($result as $account) {
      if (!$account->uid == 1) {
        $errors[] = 'Secondary database not responding.';
      }
      break;
  }
}

// Check that cache set/get are working.
$rand_key = substr(str_shuffle(MD5(microtime())), 0, 10);
$rand_val = substr(str_shuffle(MD5(microtime())), 0, 10);

cache_set($rand_key, $rand_val, 'cache', CACHE_TEMPORARY);
$retrieved = cache_get($rand_key, 'cache');

if ($retrieved->data != $rand_val) {
  $errors[] = 'Could not set and get an arbitrary cache object.';
}
else {
  cache_clear_all($rand_key, 'cache', FALSE);
}

// Check that the files directory is operating properly.
if ($test = tempnam(variable_get('file_directory_path', conf_path() .'/files'), 'status_check_')) {
  // Uncomment to check if files are saved in the correct server directory.
  //if (!strpos($test, '/mnt/nfs') === 0) {
  //  $errors[] = 'Files are not being saved in the NFS mount under /mnt/nfs.';
  //}
  if (!unlink($test)) {
    $errors[] = 'Could not delete newly create files in the files directory.';
  }
}
else {
  $errors[] = 'Could not create temporary file in the files directory.';
}

// Print all errors.
if ($errors) {
  $errors[] = 'Errors on this server will cause it to be removed from the load balancer.';
  header('HTTP/1.1 500 Internal Server Error');
  print implode("<br />\n", $errors);
}
else {
  // Split up this message, to prevent the remote chance of monitoring software
  // reading the source code if mod_php fails and then matching the string.
  print 'CONGRATULATIONS' . ' 200';
}

// Exit immediately, note the shutdown function registered at the top of the file.
exit();
