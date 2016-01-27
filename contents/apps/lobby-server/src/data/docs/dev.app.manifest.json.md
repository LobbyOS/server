# manifest.json

The information about the app is stored as [JSON](http://en.wikipedia.org/wiki/JSON) format in this file.

The Data should have the following items :

| Key | Value
| ----| -----
| name  | The App Name (not ID)
| short_description | A one line short description of app. Must not be more than 50 characters
| category  | The category in which the app belong. See below
| sub_category | The sub category of the category. See below
| version | The version of app.
| author  | The Author name
| author_page | The App Author's Web Page URL
| app_page | The official URL of the App
| image | Whether app has a logo image file in **AppID/src/image/logo.png**. Default : false

## short_description

A one line description will make it easy for the user to understand about the app. Here are some examples :

lEdit - The Default Text Editor of Lobby

diary - A Diary for your thoughts

The maximum characters for the short description is **50**.

## category

Lobby uses categories to quickly identify the type of app.

Only some categories are currently accepted. They are :

| Category    | Description
| -------     | -----------
| accessories | For Apps like text editors, calculator etc...
| development | Apps for programmers, developers, coders etc...
| games       | For Game Apps
| multimedia  | For Apps associated with audio, video, pictures and other media files

Your app should only be in one category

## sub_category

Subcategories helps to find an app in depth. Only some main categories have subcategories.

It is not necessary for your app to have a sub category, but it will help to quickly find apps for users.

| Category    | Sub Category| Description + Examples
| --------    | ------------| -----------
| accessories | office      | Office related apps <br/> Calculator
|             | tools       | Extra Tools <br/> Text Editors
|             | security    | Security related apps <br/> Password Manager
| development | graphics    | Apps for graphic designers <br/> Image editing softwares, etc...
|             | web         | For Web Developers <br/> HTML, CSS, JS, jQuery etc...
|             | programming | Apps related to Programming Languages <br/> Python, Java, C++ etc...
| games       | multiplayer | Multiplayer games
|             | puzzles     | Puzzle games
|             | sports      | Sports games
| multimedia  | music       | Apps associated with audio
|             | photos      | Photo gallery apps etc.. associated with photos/images
|             | video       | Video Apps <br/> Video Editor, Movie Maker etc...

Your app should only be in one category

## version

Every App is required to have a version number. The version value must be numeric characters with "**.**" as an optional character.

| Can Be | Can't Be
| ------ | --------
| 0.1    | 1.4889
| 0.5    | 1-5
| 1      | 2014-58.45
| 1.0    | one.0
| 5.25   | mi45

## image

It is better to have an image for your app though it's not essentially required.

If your app does have an image, it should be placed as **logo.png** in **app/src/image** and the `image` value should be set to "true".

## Example

Here is a sample manifest file of the **lEdit** app :

```php
{
   "name" : "lEdit",
   "short_description" : "The Default Text Editor of Lobby",
   "category" : "accessories",
   "sub_category" : "",
   "version" : "0.1",
   "author" : "Lobby",
   "author_page" : "http://lobby.subinsb.com",
   "app_page" : "http://lobby.subinsb.com/apps/ledit",
   "image" : "true"
}
```
And here is the **app/src/image/logo.png** file :

![lEdit Logo](https://googledrive.com/host/0B2VjYaTkCpiQQmYzblNwa2t0NmM/logo.png)

If you want to see full source code of **lEdit**, you can download it [here](http://lobby.subinsb.com/api/download/app/ledit).
