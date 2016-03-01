Updates

# Updates

Learn how to update Lobby and apps in it.

Lobby automatically checks for updates when any of the admin pages (admin/) are visited. This is done only once on a session even if getting response from server was failed.

You can manually check for updates by going to the Updates Page (Lobby -> Settings -> Updates) (lobby.dev/admin/update.php)

## Notification

If an update is available, an icon will appear on the top panel saying "Updates are available". When you click it, you will see the Updates page.

The Update page will show the updates available. You also have the option to once again check with the server for updates.

## Updating Lobby

If a latest version of Lobby is released, the Update page will show the latest version, it's release date and release notes.

You must read the release notes before updating, because it will have any important messages to know before updating.

Here is the procedure to update Lobby :

* Lobby will automatically download the latest version and install. In case something happens, Lobby will not be accessible anymore. So backup your database and Lobby installation before you do anything. You can do this by clicking on the buttons available.
  The database backup only applies to MySQL and for it, your system must have the "mysqldump" package. This won't work on Windows.

  The Lobby Folder backup will download a ".zip" file of the Lobby directory.

  The backups are just a precautionary measure. Updates are expected to work smoothly. But, nothing is perfect in this world. :-)

* Click on "Setup Lobby Update" button
  
  The next page will check whether the Lobby directory is writable.
  
  If everything is Ok, then a big green button "Start Update" will be seen. Click on it to start the update
  
If the update is interrupted (during download), you can start again.
