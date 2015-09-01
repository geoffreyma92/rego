#!/usr/bin/env bash

echo "Hello! This vagrant provision file is written by Zouhir"

echo "-- Updating packages list --"
sudo apt-get update

echo "-- MySql settings --"

sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password root'
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password root'

echo "-- Installing base packages  --"
sudo apt-get install -y vim curl python-software-properties

echo "-- Updating packages list --"
sudo apt-get update

echo "-- getting PHP bleeding edge version --"
sudo add-apt-repository -y ppa:ondrej/php5-5.6

echo "Update again --"
sudo apt-get update

echo "-- installing PHP-specific packages --"
#sudo apt-get install -y php5 apache2 libapache2-mod-php5 php5-curl php5-gd php5-mcrypt mysql-server-5.5 php5-mysql git-core
sudo apt-get install -y php5 apache2 libapache2-mod-php5 php5-mysql php5-curl php5-gd php5-mcrypt php5-xdebug mysql-server git-core 

echo "-- Installing and configuaring Xdebug --"
sudo apt-get install -y php5-xdebug

cat << EOF | sudo tee -a /etc/php5/mods-available/xdebug.ini
xdebug.scream=1
xdebug.cli_color=1
xdebug.show_local_vars=1
EOF

echo "-- enable mod-rewrite --"
sudo a2enmod rewrite

echo "-- Setting document root to public directory --"
sudo rm -rf /var/www/html
sudo ln -fs /vagrant/public /var/www/html

echo "-- display errors --"
sed -i "s/error_reporting = .*/error_reporting = E_ALL/" /etc/php5/apache2/php.ini
sed -i "s/display_errors = .*/display_errors = On/" /etc/php5/apache2/php.ini

echo "-- restarting apache --"
sudo service apache2 restart

echo "-- installing composer  --"
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer


