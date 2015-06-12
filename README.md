DoSomething.org Tower Playbooks
================

Ansible playbooks for DoSomething.org Tower Playbooks

Usage
================

### Tower

- Setup a git project linked to this repo:  
  `https://github.com/DoSomething/tower.git`
- Specify the valut password in your Machine Credential
- Use one of playbooks provided in your Job Template

### Manually

- Clone the repository
- Create `.vault.txt` with shared password to decrypt Ansible Vaults
- Run ansible as usual

### Vagrant

- Clone the repository
- Create `.vault.txt` with shared password to decrypt Ansible Vaults
- Run `vagrant up`
