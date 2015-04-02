DoSomething Web
=========

DoSomething.org Web server.

Role Variables
--------------
### Composer
#### Composer path
A path to install composer.  
Defaults to `/usr/local/bin`.

```yml
composer_path: '/usr/bin'
```

#### Composer self update

Run `composer self-update`.  
Defaults to `no`.

```yml
composer_self_update: yes
```

### PHP
#### php.ini settings

You can override `/etc/php5/fpm/php.ini` settings
(or introduce new configuration statements) using the following format:

```yml
php_ini_settings:
  - section: PHP
    option: upload_max_filesize
    value: 10M
  - section: PHP
    option: display_errors
    value: "On"
  - section: Date
    option: date.timezone
    value: "America/New_York"
```

#### FPM Pool

You can override `/etc/php5/fpm/pool.d/www.conf` settings
(or introduce new configuration statements) using the following format:

```yml
php_fpm_settings:
  - { option: user,   value: "app" }
  - { option: group,  value: "app" }
```

#### FPM Socket
A path to PHP-fpm socket.  
Defaults to `/var/run/php5-fpm.sock`.

```yml
php_fpm_socket: /var/run/application.sock
```

### PHP Extensions
By default, only `php5-curl` is installed. To include additional extensions,
override `php_extensions`:

```yml
php_extensions:
  - php5-mysql
  - php5-gd
```

### PHP Third Party Extensions
#### New Relic
Install [PHP New Relic](https://docs.newrelic.com/docs/agents/php-agent/getting-started/new-relic-php)
extenstion.  
Defaults to `no`.

```yml
php_thirdparty_newrelic: yes
```

Dependencies
------------

- [`dosomething.base`](https://github.com/DoSomething/ansible-base)

Example Playbook
----------------

Usage example:

```yml
- hosts: servers
  roles:
     - { role: dosomething.web, php_thirdparty_newrelic: yes }
```

License
-------

MIT
