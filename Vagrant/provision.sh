if [[ ! -d /root/.ssh ]]; then
  echo "Add github.com to known_hosts"
  mkdir /root/.ssh && touch /root/.ssh/known_hosts && ssh-keyscan -H github.com >> /root/.ssh/known_hosts && chmod 600 /root/.ssh/known_hosts
fi
    export DEBIAN_FRONTEND=noninteractive
    apt-get update
    mkdir /var/cache/nginx/
    mkdir /var/log/zaga-krk/
    chmod a+w /var/cache/nginx/
    apt-get install apt-transport-https -y --force-yes
    apt-key adv --keyserver hkp://p80.pool.sks-keyservers.net:80 --recv-keys 58118E89F3A912897C070ADBF76221572C52609D
    wget https://www.dotdeb.org/dotdeb.gpg | sudo apt-key add dotdeb.gpg

    echo "deb http://ppa.launchpad.net/webupd8team/java/ubuntu xenial main" | tee /etc/apt/sources.list.d/webupd8team-java.list
    echo "deb-src http://ppa.launchpad.net/webupd8team/java/ubuntu xenial main" | tee -a /etc/apt/sources.list.d/webupd8team-java.list
    apt-key adv --keyserver hkp://keyserver.ubuntu.com:80 --recv-keys EEA14886

    echo "deb http://packages.dotdeb.org jessie all" | tee -a /etc/apt/sources.list.d/dotdeb.list
    echo "deb-src http://packages.dotdeb.org jessie all" | tee -a /etc/apt/sources.list.d/dotdeb.list

    echo "deb http://ftp.hr.debian.org/debian/ jessie-backports main" | tee -a /etc/apt/sources.list

    apt-key update
    apt-get update
    apt-get install python-software-properties libssl-dev dialog -y --force-yes
    apt-get install curl wget htop byobu -y --force-yes

    apt-get install php7.0-fpm php7.0-dev php7.0-curl php7.0-mysql php7.0-gd php7.0-apcu php7.0-memcached php7.0-imagick php7.0-mbstring php7.0-intl -y --force-yes

    apt-get install nginx-extras -t jessie-backports -y --force-yes
    apt-get install git vim -y --force-yes
    apt-get install memcached -y --force-yes

    debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password password password'
    debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password_again password password'
    apt-get install mariadb-server -y

    echo "create database zaga_krk" | mysql -uroot -ppassword

    rm /etc/nginx/sites-enabled/default
    ln -s /vagrant/Vagrant/nginx/zaga-krk /etc/nginx/sites-enabled/zaga-krk
    ln -s /vagrant/Vagrant/nginx/zaga-krk /etc/nginx/sites-available/zaga-krk

    git config core.preloadindex true

    byobu-enable
    byobu-enable-prompt

    runuser -l vagrant -c 'byobu-enable'
    runuser -l vagrant -c 'byobu-enable-prompt'

    service nginx restart

    rm /etc/php/7.0/fpm/pool.d/www.conf
    ln -s /vagrant/Vagrant/php7-fpm/www.conf /etc/php/7.0/fpm/pool.d/www.conf

    cd /vagrant/
    curl -sS https://getcomposer.org/installer | php
    composer config -g github-oauth.github.com a967eab59684a92bad1dbe9f44a39cd9221f569c
    mv composer.phar /usr/bin/composer
    cd /vagrant
    composer install

    ln -s /vagrant/vendor/phalcon/devtools/phalcon.php /usr/bin/phalcon
    chmod ugo+x /usr/bin/phalcon

    export LANGUAGE=en_US.UTF-8
    export LANG=en_US.UTF-8
    export LC_ALL=en_US.UTF-8
    locale-gen en_US.UTF-8
    dpkg-reconfigure locales
