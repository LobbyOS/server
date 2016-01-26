# Introduction
Creating Apps for Lobby is really easy. You have the full control over the app, but with some restrictions.

The Lobby tree will look something like this :
- Lobby
	- [dir]  admin
	- [dir]  contents
	- [dir]  includes
	- config-sample.php
	- index.php
	- load.php
	- lobby.json

This directory structure is like **WordPress**, but not exactly like it.

The Apps, themes and User created stuff goes in the _contents_ directory. Here is the `contents` directory tree :

- contents
	- [dir] apps
	- [dir] extra
  - [dir] modules
  - [dir] themes
	- [dir] update

_apps_ folder is where Apps are stored.

_extra_ contains extra stuff like logs. It is like a temporary folder

_update_ folder is a temporary location for all downloaded files. The app.zip (Archive) File and zip files of new versions of Lobby is downloaded to here.

## Standards

While creating apps or 
