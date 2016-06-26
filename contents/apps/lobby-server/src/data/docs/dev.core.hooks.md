Hooks

# Hooks

To extend Lobby functionality, hooks are implemented in Lobby. This is similar to how **WordPress** uses hooks.

There are two types of hooks :

* Actions - Do something at some places
* Filters - Change data used inside Lobby

Examples

* Actions - If you want to print "Hello World" at the top of `<body>`, you should use Actions
* Filters - If you want to change the `srcURL` in `Lobby\App->info`, you should use Filters

## Action Hooks

* [init](#section-init)
* [body.begin](#section-body.begin)
* [admin.body.begin](#section-admin.body.begin)
* [head.begin](#section-head.begin)
* [admin.head.begin](#section-admin.head.begin)
* [head.end](#section-head.end)
* [router.finish](#section-router.finish)
* [panel.end](#section-panel.end)

### init

When every class is loaded and just before HTML output starts.

### body.begin

Just after `<body>` tag is made and before other contents inside `<body>` are made.

### admin.body.begin

Same as [body.begin](#section-body.begin), but in admin pages

### head.begin

Just after `<head>` tag is made and before other contents inside `<head>` are made.

### admin.head.begin

Same as [head.begin](#section-head.begin), but in admin pages

### head.end

Just before `</head>` is made

### router.finish

Just before all routes are dispatched.

### panel.end

Just before the closing `div` tag of panel is made. This is called after contents inside panel `div` tag is made.

## Filter Hooks

* [app.manifest.load](#section-app.manifest.load)

### app.manifest.load

| Argument | Description
| -------- | -----------
| info     | Array of information made from `manifest.json` file

Just before `\Lobby\App->info` property is initialized.

## Implementation

The static class `Hooks` is used to implement hooks.

### Adding A Hook

```php
Hooks::addAction("hook", function(){

});
```

Example :

```php
Hooks::addAction("body.begin", function(){
  echo "Hello World !";
});
```

## Adding A Filter

```php
Hooks::addFilter("hook", function($args,...){
  return "new_value";
});
```
