Install Lobby In Windows

# Windows

There are two ways to install Lobby in Windows :

* [By installing Lobby Standalone](#section-lobby-standalone)
* [Manual Install](#section-manual)

## Lobby Standalone

* Download the **Zip** file [from here](/api/lobby/download/windows).

* Extract the folder "Lobby" inside the Zip file to a location of your choice.

That's it. Now you should [run Lobby](#section-running-lobby).

### Running Lobby

Run the "Lobby.exe" file in the "Lobby" folder.

PHP that is inside Lobby will sometimes make the following error upon starting :
```
msvcr110.dll is missing
```

This is because **Visual Studio C++** is not installed in your system. You can get the installer file from [Microsoft's website](https://www.microsoft.com/en-in/download/details.aspx?id=48145). It's only about **13MB**.

When Lobby.exe is ran, an icon with [Lobby favicon](/favicon.ico) can be see in the tray area (Notification area) :

![Lobby Windows Tray Icon](/contents/apps/lobby-server/src/image/screenshots/windows/tray.png)

It means that the PHP Server embedded in Lobby is running. The server runs on [127.0.0.1:9000](http://127.0.0.1:2020) by default, so Lobby can be accessed by going to that [URL](http://127.0.0.1:2020) :

![Lobby Running On Windows](/contents/apps/lobby-server/src/image/screenshots/windows/running.png)

If you want to stop the PHP server and exit Lobby, right click on the tray icon and choose "Exit" :

![Lobby Tray App](/contents/apps/lobby-server/src/image/screenshots/windows/tray-open.png)

To further complete installation, [see this](/docs/quick#configure-lobby).

#### Change Host

You can change the host where Lobby server should listen. The default is **127.0.0.1:2020**. To change it, open **lobby.ini** file inside the "Lobby" folder and change the **serverHost** property :

```ini
[LobbyConfig]
serverHost = "127.0.0.1:9000"
```

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
