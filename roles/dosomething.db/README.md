DoSomething DB
=========

DoSomething.org DB server.

Role Variables
--------------

### Optional
#### MySQL configuration
You can override MySQL settings (or introduce new configuration statements)
using the following format:

```yml
my_cnf_settings:
  - section: mysqld
    option: max_allowed_packet
    value: 128M
  - section: mysqld
    option: character_set_server
    value: utf8
  - section: mysqld
    option: collation_server
    value: utf8_general_ci
  - section: mysqld
    option: innodb_file_per_table
    value: "ON"
  - section: mysqldump
    option: max_allowed_packet
    value: 128M
```

By default, nothing is overriden and package defaults are used.

Dependencies
------------

- [`dosomething.base`](https://github.com/DoSomething/ansible-base)

Example Playbook
----------------

Usage example:

```yml
- hosts: servers
  roles:
     - { role: dosomething.db }
```

License
-------

MIT
