Vagrant.configure(2) do |config|
	config.vm.box = "debian/contrib-stretch64"
	config.vbguest.auto_update = true
	config.vm.provision :shell, path: "vagrant/server/bootstrap.sh"
	config.vm.provision :shell, path: "vagrant/server/install.sh", privileged: false
	config.vm.provision :shell, path: "vagrant/server/load.sh", run: "always"
	config.vm.network "private_network", type: "dhcp"
	config.vm.hostname = File.basename(Dir.pwd).downcase + ".v.local"
	config.ssh.forward_agent = true

	if Vagrant.has_plugin?('vagrant-hostmanager')
		config.hostmanager.enabled = true
		config.hostmanager.manage_host = true
		config.hostmanager.ip_resolver = proc do
			`vagrant ssh -c "hostname -I"`.split()[1]
		end
	end
end

Dir.glob('Vagrantfile.local').each do |path|
	load path
end
