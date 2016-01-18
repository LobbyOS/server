# Quick Install

How to download & install Lobby on various systems.

## Requirements

1. An OS : Ubuntu/Linux, Windows XP/7/8, Apple Mac etc...
2. Localhost that has :
  1. Apache Web Server with :
    * Rewrite Module (mod_rewrite)
  2. MySQL 5.0 or later versions
  3. PHP version 5.3 or later with :
    * PDO extension
    * cURL extension
    * JSON extension
    * Output Buffering Enabled
  
Lobby can be installed in Windows & Mac. There is no special download package for them.

There are localhost softwares with everything already buiilt into it. Here are some of them :

* [XAMPP](http://sourceforge.net/projects/xampp/) - Windows, Linux, Mac
* [WAMP](http://sourceforge.net/projects/wampserver/) - Windows
* [MAMP](http://sourceforge.net/projects/mamp/) - Mac
* [AMMPS](http://sourceforge.net/projects/ampps/) - Windows, Linux, Mac

## Linux

As you may know, the localhost site directory on Linux is 
```
/var/www/html
```
So, we install Lobby in this directory.

In older systems, it was "/var/www". So, if you're installing on an older system, replace the "/var/www/html" location mentioned in the Lobby Docs with just "/var/www"

  * Make sure dependencies of Lobby is satisfied
  * [Download Lobby](/api/download/lobby/latest)
  * Become the root user & open the "/var/www/html" folder :
    ```bash
    gksudo nautilus /var/www/html
    ```
    
  * Create a Direcory named **lobby** in "/var/www/html" directory :
    ```bash
    sudo mkdir /var/www/html/lobby
    ```
    
  * Extract the downloaded Lobby Zip file into **/var/www/lobby**
  * Do the steps in the **Permissions** section below
  * Open a Web Browser and visit the URL [//localhost/lobby](http://localhost/lobby) to configure Lobby

### Permissions

After installing Lobby, change the permission of **Lobby Directory** (/var/www/lobby) to **Read & Write**.

An easy way is to do this is by the following commands :
```bash
chown -R root:www-data /var/www/lobby
chmod -R ug+rw /var/www/lobby
chmod -R o+r /var/www/lobby
```
The above commands will make root the owner and sets the group as "www-data" ie Apache. And the second & third command will make the owner & group have full permissions where as others will only have read permission.

### Lobby on a Domain

Lobby can also be installed on a special domain in localhost. By using this, you can access Lobby easily from a domain. Examples :
```
http://lobby.dev
http://lobby.localhost
http://lobby.com
```
I (Subin Siby) have written Blog posts addressing this localhost site creation :

1. [How To Create A Localhost Web Site In Linux Using Apache Web Server](http://subinsb.com/linux-apache-localhost)
2. [Create a localhost Website in Ubuntu 11.04 & Up](http://subinsb.com/ubuntu-linux-create-localhost-website)

## Windows

It is recommended that on Windows, you install [WampServer]() instead of XAMPP.

* Make sure dependencies of Lobby is satisfied
* [Download Lobby](/api/download/lobby/latest)
* Open the "C:\wamp\www" folder
* Create a Folder named "lobby" in "C:\wamp\www" folder.
* Extract the downloaded Lobby Zip file into "C:\wamp\www"
* Open a Web Browser and visit the URL [//localhost/lobby](http://localhost/lobby) to configure Lobby

## Configure Lobby

The first time you visit **Lobby** in your Browser after setting up localhost, you will see an installation page.

Follow the instructions in the installation page to successfully configure & install **Lobby** in your system.

* The first step is to verify that all dependencies of Lobby is met

  If everything is satisfied, a "Proceed To Installation" button is seen at the far bottom.
  
* In the second step, you have to provide your Database credentials.

  Double check before continuing
  
* Setup will create tables in the given database and will also create a "config.php" file

* After Setup is finished, a message will be shown to Proceed.

  Congratulations, you have successfuly installed Lobby.

## Common Problems

### 404 Not Found Error

Sometimes, when you visit **[//lobby.dev](//lobby.dev)**, a 404 error is shown. This is because the rules in **.htaccess** is not active.To make it active, you must edit the configuration file.

For this run the following command to edit the config file :

```
gksudo gedit /etc/apache2/apache2.conf
```
Search for **Directory /var/www** and under the found string replace :

```
AllowOverride None
```
with

```
AllowOverride All
```

Also, make sure the Apache **rewrite** module is active. To make it active, do : 
```
sudo a2enmod rewrite && sudo service apache2 restart
```

### 500 Internal Server Error

A server error had occured. This problem occurs due to many reasons. It occured maybe due to missing components in your system. Make sure all the dependencies of Lobby is met in your system.

For Example, if **cURL** PHP extension is not installed, this error occurs.
