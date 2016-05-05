Install Lobby In Windows

# Windows

There are two ways to install Lobby in Windows :

* [By installing .MSI package](#msi-package)
* [Manual Install](#manual)

## Lobby Installer 

Download the .msi file [from here](/api/lobby/download/msi). Run the installer :

![Lobby Windows Installer Startup](/contents/apps/lobby-server/src/image/screenshots/windows/start.png)

Click Next, accept the License Terms, choose location, and Install !

Windows will ask for administrative permissions while installing Lobby. Please allow it.

![Lobby Windows Installer Finish](/contents/apps/lobby-server/src/image/screenshots/windows/finish.png)

After finishing install, open the Start menu and you can see Lobby in it.

#### Running Lobby

PHP that is inside Lobby will sometimes make the following error upon starting :
```
msvcr110.dll is missing
```
To solve this, please go to this [page](http://www.dll-files.com/dllindex/dll-files.shtml?msvcr110), download the **Zip File** and extract the `msvcr110.dll` file to 
```
C:\Program Files\Lobby\php
```
Or you may extract it into the Windows System32 directory.

A Lobby shortcut will be created in the desktop and in Start Menu. This shortcut will open `Lobby.exe`.

When Lobby.exe is ran, an icon with [Lobby favicon](/favicon.ico) can be see in the tray area (Notification area) :

![Lobby Windows Tray Icon](/contents/apps/lobby-server/src/image/screenshots/windows/tray.png)

It means that the PHP Server embedded in Lobby is running. The server runs on [127.0.0.1:9000](http://127.0.0.1:9000), so Lobby can be accessed by going to that [URL](http://127.0.0.1:9000) :

![Lobby Running On Windows](/contents/apps/lobby-server/src/image/screenshots/windows/running.png)

If you want to stop the PHP server and exit Lobby, right click on the tray icon and choose "Exit" :

![Lobby Tray App](/contents/apps/lobby-server/src/image/screenshots/windows/tray-open.png)

To configure Lobby through the web installation, [see this](/docs/quick#configure-lobby).

## Manual Install 

The following localhost servers are available for Windows :

* [XAMPP](http://sourceforge.net/projects/xampp/)
* [WAMP](http://sourceforge.net/projects/wampserver/)
* [MAMP](http://sourceforge.net/projects/mamp/)
* [AMMPS](http://sourceforge.net/projects/ampps/)

If you don't have a Web Server, install any of the above (or something else).

Once the server and the [requirements](/docs/quick) are installed, [Download Lobby](/api/download/lobby/latest).

Open the "www" (Web root) folder of the server and create a folder called "lobby" in it.

Extract the contents of the downloaded Lobby Zip file into the "lobby" folder created just before.

Open a Web Browser and visit the URL [//localhost/lobby](http://localhost/lobby) to [install Lobby](/docs/quick#configure-lobby).
