# Introduction
Creating Apps for Lobby is really Easy. You have the full control over the app, but with some restrictions. The Lobby Tree will look something like this :
- Lobby
	- [dir]  admin
	- [dir]  contents
	- [dir]  includes
	- config-sample.php
	- index.php
	- load.php
	- lobby.json

This directory structure is like **WordPress**, but not exactly like it.

The Apps, Extra Stuff and User created stuff goes in the _contents_ directory. Here is the `contents` directory tree :

- contents
	- [dir] apps
	- [dir] extra
	- [dir] upgrade

_apps_ folder has the Apps Source Code.

_extra_ contains extra stuf like logs. The user can create what she/he like here.

_upgrade_ folder is a temporary location for all downloaded files. The App Source code containing Zip (Archive) File and New Versions of Lobby is downloaded to here.
