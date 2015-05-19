DoSomething.org Redis Server
=========

DoSomething.org Redis server.

Dependencies
------------

- [`dosomething.base`](https://github.com/DoSomething/ansible-base)

Role Variables
--------------
#### Bind
A network interface to bind.  
Defaults to `127.0.0.1`.

```yml
redis_bind: 0.0.0.0
```

#### Port
Accept connections on the specified port.  
Defaults to `6379`.

```yml
reddis_port: 6380
```


Example Playbook
----------------

Usage example:

```yml
- hosts: servers
  roles:
     - { role: dosomething.redis, redis_bind: 0.0.0.0 }
```

License
-------

MIT
