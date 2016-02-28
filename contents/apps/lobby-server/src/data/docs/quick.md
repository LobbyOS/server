Install Lobby

# Quick Install

How to download & install Lobby on various systems :

* [Windows](/docs/quick/windows)
* [Linux](/docs/quick/linux)
* [Mac](/docs/quick/mac)

## Requirements

1. Ubuntu/Linux, Windows 7/8/10, Apple Mac etc...
2. Localhost that has :
  1. Apache Web Server with :
    * Rewrite Module (mod_rewrite)
  2. MySQL 5.0 or later versions
  3. PHP version 5.3 or later with :
    * PDO extension
    * cURL extension (recommended)
    * JSON extension
    * Output Buffering Enabled

## Configure Lobby {#configure-lobby}

You will see an installation page when you first visit **Lobby** in your Browser after installing Lobby in a directory.

Follow the instructions in the installation page to successfully configure & install **Lobby** in your system.

* The first step is to verify that all dependencies of Lobby is met

  If everything is satisfied, a "Proceed To Installation" button will be available at the far bottom of page.
  
  The dependency of "mod_rewrite" module will be seen only if you are running Lobby on Apache Server.
  
* In the second step, you have to choose what Database to use

  The quickest way is to use SQLite (Windows recommended).
  
  If you are installing Lobby in a **Public Server, use MySQL** (Don't use SQLite).
  
* #### MySQL
  
  The database will be created if it doesn't exist.
  
  If tables with the same "prefix" exists, then an error is shown and "config.php" won't be installed.
  
  #### SQLite
  Type in the location where the ".sqlite" DB file should be created and submit it.
  
  If the file already exists, error will not shown and instead it will be used.
  
* A "config.php" file will be created in the Lobby directory

* After Setup is finished, a message will be shown to Proceed.

  Congratulations, you have successfuly installed Lobby !

## Common Problems

#### 404 Not Found Error

Sometimes, when you visit **[//lobby.dev](//lobby.dev)**, a 404 error is shown. This is because the rules in **.htaccess** is not active. To make it active, you must edit the configuration file.

For this run the following command to edit the config file :

```
sudo nano /etc/apache2/apache2.conf
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

#### 500 Internal Server Error

A server error had occured. This problem occurs due to many reasons. It occured maybe due to missing components in your system. Make sure all the dependencies of Lobby is met in your system.

For Example, if **cURL** PHP extension is not installed, this error occurs.
