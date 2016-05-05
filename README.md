# Lobby Server

The code of server at [http://lobby.subinsb.com](http://lobby.subinsb.com)

## Note

When upgrading Lobby to a new version :

* Remove FilePicker Module
* Remove saveData.php and others in includes/lib/lobby/ajax
* Remove tooltip call in hine/src/main/js/init.js
* Before Velocity.js add http://stackoverflow.com/a/5207328/1372424 in hine/src/main/lib/material-design/materialize.js
