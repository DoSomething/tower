DoSomething Base Server
=========

DoSomething.org base server.

Role Variables
--------------

#### System timezone

To see the full list of timezones, run `timedatectl list-timezones`.
```yml
timezone: America/New_York
```

####  System locale

To see the full locales list of installed locales, run `locale -a`.
```yml
locale: en_US.UTF-8
```

#### Override NTP servers
For example, here's configuration from [amazon NTP servers](http://docs.aws.amazon.com/AWSEC2/latest/UserGuide/set-time.html):

```yml
ntp_servers:
 - 0.amazon.pool.ntp.org iburst
 - 1.amazon.pool.ntp.org iburst
 - 2.amazon.pool.ntp.org iburst
 - 3.amazon.pool.ntp.org iburst
```

If not specified, ntp package defaults will be used.

Example Playbook
----------------

Usage example:

```yml
- hosts: servers
  roles:
     - { role: dosomething.base, timezone: 'America/Los_Angeles' }
```

License
-------

MIT
