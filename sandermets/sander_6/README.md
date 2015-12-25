# TASK 6

## Start point

Point of execution resides in public_html/index.php.  

##Security

Accessable from the web should only be public_html

## run TESTS

### PHP TESTS

add ?runTESTS to URL

### JAVASCRIPT TESTS

TODO

## Start url locally

http://kool.local/sandermets/sander_6/public_html/index.php

## Requirement

php5-intl:

    sudo apt-get install php5-intl  
    print_r(ResourceBundle::getLocales(''));

## Apache virtual host

<VirtualHost final.local:80>

        ServerName final.local
	ServerAlias final.local
        ServerAdmin webmaster@local
        DocumentRoot /home/sander/school/pstk/sandermets/sander_6/public_html

        <Directory /home/sander/school/pstk/sandermets/sander_6/public_html>
                Options FollowSymLinks MultiViews
                AllowOverride All
                Order allow,deny
                allow from all
		Require all granted
        </Directory>

        ErrorLog /var/www/html/log/final_error.log
        CustomLog /var/www/html/log/final_access.log combined

</VirtualHost>
