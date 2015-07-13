Vagrant.configure("2") do |config|

  ## Choose your base box
  config.vm.box = "ubuntu/trusty64"

  config.vm.provider "virtualbox" do |v|
    v.customize ["modifyvm", :id, "--memory", 3072]
    v.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
  end

  # SSH Agent forwarding
  config.ssh.forward_agent = true

  # Hostname
  config.vm.hostname = "dev.dosomething.org"

  config.vm.provision :host_shell do |host|
    host.inline = 'ansible-galaxy install -r requirements.yml -f'
  end

  config.vm.provision "ansible" do |ansible|
    ansible.verbose = :v
    ansible.playbook = "vagrant.yml"
    ansible.vault_password_file = ".vault.txt"

    ansible.groups = {
      "vagrant" => ["default"],
    }

    ansible.tags = ENV['tag'] if ENV['tag']
  end

  # Http and https.
  config.vm.network :forwarded_port, guest: 80, host: 8888
  config.vm.network :forwarded_port, guest: 443, host: 8889

  # Rabbit
  config.vm.network :forwarded_port, guest: 15672, host: 15672

  # Solr.
  config.vm.network :forwarded_port, guest: 8983, host: 8983

end
