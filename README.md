DoSomething.org Tower Playbooks
================

Ansible playbooks for DoSomething.org Tower Playbooks

Usage
================

#### In Tower

- Setup a git project linked to this repo:  
  `https://github.com/DoSomething/tower.git`
- Specify the valut password in your Machine Credential
- Use one of playbooks provided in your Job Template

#### Manually

- Clone the repository
- Create `.vault.txt` with shared password to decrypt Ansible Vaults
- Download playbooks:  
  `ansible-galaxy install -r requirements.yml -p roles/ --force`
- Run ansible as usual

Contribution
================

Changes must be made in according role repositores.

For now it's required to update those manually:

- Remove existing playbooks (don't forget to sync your changes to actual repos):  
  `rm -r roles`
- Download playbooks:  
  `ansible-galaxy install -r requirements.yml -p roles/ --force`
- Commit and push the changes

New Tower version is expected to have direct support of `requirements.yml` file,
so the manual update won't be needed anymore.

You can make test changes directly in `roles`, but don't forget
to move them into accoring repos.

