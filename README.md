# LAMP VM
Simple LAMP stack, build with [Vagrant](https://www.vagrantup.com) and [Ansible](https://www.ansible.com).

* Ubuntu 16.04 LTS (xenial64)
* Apache2
* PHP 7.0
* MySQL 5.7
* Adminer

## Requirements
* [VirtualBox](https://www.virtualbox.org) 5.2+
* [Ansible](https://www.ansible.com) 2.5+
* [Vagrant](https://www.vagrantup.com) 2.1+
* [Vagrant-hostmanager plugin](https://github.com/devopsgroup-io/vagrant-hostmanager)
* [Vagrant-vbguest plugin](https://github.com/dotless-de/vagrant-vbguest)

## Installation
1. Download and install [VirtualBox](https://www.virtualbox.org).
2. Download and install [Vagrant](https://www.vagrantup.com).
3. Install [Ansible](https://www.ansible.com).
4. Install [Vagrant-hostmanager](https://github.com/devopsgroup-io/vagrant-hostmanager) plugin.
    ```
    vagrant plugin install vagrant-hostmanager
    ```
5. Install [Vagrant-vbguest](https://github.com/dotless-de/vagrant-vbguest) plugin.
    ```
    vagrant plugin install vagrant-vbguest
    ```
3. Clone this repository.
    ```sh
    git clone https://github.com/rastoelias/lamp-vm.git vm
    ```
4. Go to the folder containing the `Vagrantfile`, and copy the configuration file.
    ```
    cp config.example.yml config.yml
    ```
5. Lunch the box.
    ```
    vagrant up
    ```

Once you've done, you could visit [http://vm/](http://vm/) in a browser, and you'll see the VM Welcome page.

## Usage
### Add new Project
1. Create a new folder inside the `www` folder.
    ```
    www/my-new-project.vm
    ```
2. Create a `public` or `www` folder inside your project folder.
    ```
    www/my-new-project.vm/public
    ```
3. Open the `config.yml` file and add a new virtual host.
    ```yml
    # Virtual hosts.
    vhosts:
        .
        .
        .
      - servername: "my-new-project.vm"
        documentroot: "/var/www/my-new-project.vm/public"
        dbname: "mydatabasename_vm"
    ```

    The database `mydatabasename_vm` will be automatically created. 
    ```
    dbname: mydatabasename_vm
    host: localhost
    username: root
    password: root
    ```
4. Run following commands.
    ```
    $ vagrant reload --provision
    $ vagrant hostmanager
    ```

## Tools
* Adminer ([http://adminer.vm/](http://adminer.vm/))

## Author
* Rastislav Elias - [rastoelias](https://github.com/rastoelias)

## License
This project is licensed under the MIT open source license.
