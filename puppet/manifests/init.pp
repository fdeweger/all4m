#puppet essential...
group { 'puppet': ensure => 'present' }

#global path def.
Exec { path => [ "/bin/", "/sbin/" , "/usr/bin/", "/usr/sbin/" ] }

node default {
    $default_packages = [ "vim", "strace", "wget", "git", "man", "patch", "sshfs" ]
    package { $default_packages :
        ensure => latest,
    }

    class { "puppi" : }

    class { "apache": }

    apache::vhost { 'default':
        docroot             => '/vagrant/public',
        server_name         => 'www.all4m.dev' ,
        priority            => '1',
        template            => 'apache/virtualhost/vhost.conf.erb',
    }

    class { "php" : }
    class { "postgresql" :
      port => '5432'
    }
}