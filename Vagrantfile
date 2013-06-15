# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
    config.vm.box = "ubuntu"
    config.vm.box_url = "http://cloud-images.ubuntu.com/vagrant/raring/current/raring-server-cloudimg-amd64-vagrant-disk1.box"
    config.vm.network :private_network, ip: "192.168.33.10"

    # Share an additional folder to the guest VM. The first argument is
    # the path on the host to the actual folder. The second argument is
    # the path on the guest to mount the folder. And the optional third
    # argument is a set of non-required options.
    # config.vm.synced_folder "../data", "/vagrant_data"

    # Enable provisioning with Puppet stand alone.  Puppet manifests
    # are contained in a directory path relative to this Vagrantfile.
    # You will need to create the manifests directory and a manifest in
    # the file ubuntu.pp in the manifests_path directory.
    #
    # An example Puppet manifest to provision the message of the day:
    #
    # # group { "puppet":
    # #   ensure => "present",
    # # }
    # #
    # # File { owner => 0, group => 0, mode => 0644 }
    # #
    # # file { '/etc/motd':
    # #   content => "Welcome to your Vagrant-built virtual machine!
    # #               Managed by Puppet.\n"
    # # }
    #
    config.vm.provision :puppet do |puppet|
        puppet.manifests_path = "puppet/manifests"
        puppet.module_path = "puppet/modules"
        puppet.manifest_file  = "init.pp"
        puppet.options = "--verbose --debug"
    end
end
