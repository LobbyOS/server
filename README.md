# Lobby Server

The code of server at [http://lobby.subinsb.com](http://lobby.subinsb.com)

## Docs

If you would like to fix a mistake or add new documentation, [go here and do what you like](https://github.com/LobbyOS/server/tree/master/contents/apps/lobby-server/src/data/docs).

## Notes

When upgrading Lobby to a new version :

* Remove FilePicker Module
* Remove saveData.php and others in includes/lib/lobby/ajax
* Remove tooltip call in hine/src/main/js/init.js
* Before Velocity.js add http://stackoverflow.com/a/5207328/1372424 in hine/src/main/lib/material-design/materialize.js
