DoSomething Search
=========

DoSomething.org Search server.

Role Variables
--------------
#### Downloading Solr
##### Version
Defaults to `5.0.0`.

```yml
solr_version: 5.0.0
```

##### Mirror
Defaults to `http://archive.apache.org/dist/lucene/solr`.

```yml
solr_mirror: http://www.us.apache.org/dist/lucene/solr
```

##### SHA 256 Sum
SHA 265 sum of Solr `tgz` archive.  
Defaults to `48c77aede40fceda73cf4e13e08e328899685446f80f76f2e893eaffea714297`.

```yml
solr_sha256sum: 48c77aede40fceda73cf4e13e08e328899685446f80f76f2e893eaffea714297
```

#### Setting up Solr
##### Port
Defaults to `8983`.
```yml
solr_port: 8080
```

##### Data Directory
Defaults to `/var/solr`.

```yml
solr_data_dir: /home/app/solr
```
#### Solr Core
Unification in progress.

```yml
solr_core_name: collection1
solr_core_repo: https://github.com/DoSomething/solr-core-drupal.git
solr_core_version: v1.0.alpha2-7.x-1.7-solr-5.x
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
     - { role: dosomething.search, solr_port: 8080 }
```

License
-------

MIT
