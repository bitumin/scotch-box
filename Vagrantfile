# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|

    config.vm.box = "scotch/box"
    config.vm.network "private_network", ip: "192.168.33.10"
    config.vm.hostname = "scotchbox"
    config.vm.synced_folder ".", "/var/www", :mount_options => ["dmode=777", "fmode=666"]
    
    # Optional NFS. Make sure to remove other synced_folder line too
    #config.vm.synced_folder ".", "/var/www", :nfs => { :mount_options => ["dmode=777","fmode=666"] }

    # Download
    config.vm.provision "shell", path: "01_directories_setup.sh"    # private folders cachewebbook/books /pieces, moodledata, phpu_moodledata, permissions
    config.vm.provision "shell", path: "02_database_setup.sh"       # create databases moodle and testmoodle
    config.vm.provision "shell", path: "03_git_setup.sh"            # git init, remote add, git checkout dev
    config.vm.provision "shell", path: "04_pre_moodle_setup.sh"     # mv _gitignore, mv _config
    config.vm.provision "shell", path: "05_moodle_download.sh"      # curl, unzip
    config.vm.provision "shell", path: "06_moodle_setup.sh"         # composer install, sudo -u apache /usr/bin/php admin/cli/install.php --lang=es

end
