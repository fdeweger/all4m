#!/bin/bash

DIR=$(date +%s)
mkdir /srv/all4m/$DIR

#git checkout
git clone https://fdeweger@bitbucket.org/fdeweger/all4m.git /srv/all4m/$DIR
cd /srv/all4m/$DIR
rm -r .git/

#composer
composer.phar install --prefer-source
if [ $? -ne 0 ]; then
        echo "Composer failed."
        exit -1
fi

#config file
cp /home/frank/config.yml ./config/
if [ $? -ne 0 ]; then
        echo "Copy of config file failed."
        exit -2
fi

#generate assets
php console dumpassets
if [ $? -ne 0 ]; then
        echo "Dumping assets failed."
        exit -2
fi

php vendor/bin/doctrine orm:schema-tool:update --force
if [ $? -ne 0 ]; then
        echo "Updating database scheme failed."
        exit -2
fi

rm /srv/all4m/current
ln -s /srv/all4m/$DIR /srv/all4m/current
service varnish restart