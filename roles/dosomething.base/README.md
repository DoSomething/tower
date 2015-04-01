DoSomething Base Server
=========

DoSomething.org base server.

Role Variables
--------------

### Required
#### App user password
For generation crypted passwords for the user module see the instruction on
[docs.ansible.com](http://docs.ansible.com/faq.html#how-do-i-generate-crypted-passwords-for-the-user-module).

```yml
app_user_password: $password-hash$
```

### Optional
#### System timezone
To see the full list of timezones, run `timedatectl list-timezones`.  
Defaults to `America/New_York`.

```yml
timezone: America/Los_Angeles
```

####  System locale

To see the full locales list of installed locales, run `locale -a`.  
Defaults to `en_US.UTF-8`.

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

#### App user name
The application user name.  
Defaults to `app`.

```yml
app_user: dosomething
```

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
