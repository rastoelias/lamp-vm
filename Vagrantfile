# -*- mode: ruby -*-
# vi: set ft=ruby :

# Require YAML and ERB module
require 'yaml'
require 'erb'

# Check vagrant-hostmanager plugin
unless Vagrant.has_plugin?("vagrant-hostmanager")
  raise 'vagrant-hostmanager is required! Run `vagrant plugin install vagrant-hostmanager`'
end

# Get dir path
dir = File.dirname(File.expand_path(__FILE__))

# Read YAML files
yml = YAML.load_file("#{dir}/config.yml")

# Create /etc/apache2/sites-available/vm.conf
#vhosts = yml['vhosts']
#template = File.read('provisioning/ruby/template/vm.conf.erb')
#renderer = ERB.new(template)
#output = renderer.result(binding)
#File.write("provisioning/etc/apache2/sites-available/vm.conf", output)


# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure("2") do |config|
  # The most common configuration options are documented and commented below.
  # For a complete reference, please see the online documentation at
  # https://docs.vagrantup.com.

  # Every Vagrant development environment requires a box. You can search for
  # boxes at https://vagrantcloud.com/search.
  config.vm.box = yml['vagrant_box']

  # This sets the hostname inside the VM. This would be the output of
  # hostname command in the VM and also this is what's visible in the prompt
  # like vagrant@<hostname>, here it will look like vagrant@buzbar
  config.vm.hostname = yml['vagrant_hostname']

  # Set the name of the VM. See: http://stackoverflow.com/a/17864388/100134
  config.vm.define yml['vagrant_machine_name']

  # Disable automatic box update checking. If you disable this, then
  # boxes will only be checked for updates when the user runs
  # `vagrant box outdated`. This is not recommended.
  # config.vm.box_check_update = false

  # Add hostnames to your /etc/hosts file on the host and guest system
  vhosts = []
  yml['vhosts'].each do |vhost|
    vhosts.push(vhost['servername'])
  end
  vhosts.delete(yml['vagrant_hostname'])
  vhosts.join(" ")
  config.hostmanager.enabled = true
  config.hostmanager.manage_host = true
  config.hostmanager.manage_guest = true
  config.hostmanager.ignore_private_ip = false
  config.hostmanager.include_offline = false
  config.hostmanager.aliases = vhosts

  # Create a forwarded port mapping which allows access to a specific port
  # within the machine from a port on the host machine. In the example below,
  # accessing "localhost:8080" will access port 80 on the guest machine.
  # NOTE: This will enable public access to the opened port
  # config.vm.network "forwarded_port", guest: 80, host: 8080

  # Create a forwarded port mapping which allows access to a specific port
  # within the machine from a port on the host machine and only allow access
  # via 127.0.0.1 to disable public access
  # config.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1"

  # Create a private network, which allows host-only access to the machine
  # using a specific IP.
  config.vm.network "private_network", ip: yml['vagrant_ip']

  # Create a public network, which generally matched to bridged network.
  # Bridged networks make the machine appear as another physical device on
  # your network.
  # config.vm.network "public_network"

  # Share an additional folder to the guest VM. The first argument is
  # the path on the host to the actual folder. The second argument is
  # the path on the guest to mount the folder. And the optional third
  # argument is a set of non-required options.
  # config.vm.synced_folder "../data", "/vagrant_data"

  # Provider-specific configuration so you can fine-tune various
  # backing providers for Vagrant. These expose provider-specific options.
  # Example for VirtualBox:
  #
  config.vm.provider "virtualbox" do |vb|
  #   # Display the VirtualBox GUI when booting the machine
  #   vb.gui = true
      
      # Name
      vb.name = yml['vb_machine_name']
  #
  #   # Customize the amount of memory on the VM:
  #   vb.memory = "1024"
  end
  #
  # View the documentation for the provider you are using for more
  # information on available options.

  # Enable provisioning with a shell script. Additional provisioners such as
  # Puppet, Chef, Ansible, Salt, and Docker are also available. Please see the
  # documentation for more information about their specific syntax and use.
  #config.vm.provision :shell, path: "provisioning/bootstrap.sh"
  config.vm.provision :ansible do |ansible|
    ansible.playbook = "ansible/playbook.yml"
    ansible.extra_vars = {
        ansible_python_interpreter: "/usr/bin/python3.5",
    }
  end

end
