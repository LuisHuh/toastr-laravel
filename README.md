# Toast
Simple toastr notifications for laravel

## Installation

<!-- Pull in the package through Composer. -->

<!-- Run `composer require roksta/toast` -->

Install [Toastr](https://github.com/CodeSeven/toastr) via npm 
```bash
    npm install toastr --save
```

Require the js in resources/assets/js/bootstrap.js as 
`window.toastr = require('toastr');`

Import the sass in resources/assets/sass/app.scss as 
`@import "node_modules/toastr/toastr";`
then build via npm `npm run prod`.

Install via composer
```bash
    composer require "luishuh/toastr-laravel-v2:@dev"
```

Include the service provider and its alias within the `config/app.php`.

```php
'providers' => [
    LuisHuh\Toastr\ToastrServiceProvider::class,
];

'aliases' => [
    'Toast' => LuisHuh\Toastr\Toast::class,
];
```

Run 
```bash
php artisan vendor:publish --provider="LuisHuh\Toastr\ToastrServiceProvider"
```
to publish the package view in your resources/assets/vendor/luishuh/toastr.blade.php

Add `@include('vendor.luishuh.toastr')` in your main view, eg,
```html
    <!DOCTYPE html>
    <html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="/css/app.css">
    </head>
    <body>
        <div id="app"></div>
        <script type="text/javascript" src="js/app.js"></script>
        @include('vendor.luishuh.toastr')
    </body>
    </html>
```

## Use

Just use the helper function `toast()` to make the notifier.

```php
    toast()->success('message', 'title');
    toast()->info('message', 'title');
    toast()->warning('message', 'title');
    toast()->error('message', 'title');
```
You may specify the timeout duration by 
```php
    toast()->success('message', 'title')->timeOut(5000);
```
You may activate the close button by
```php
    toast()->success('message', 'title')->closeButton(true);
```
You may activate debug by
```php
    toast()->success('message', 'title')->debug(true);
```
You may add the newest on top by
```php
    toast()->success('message', 'title')->newestOnTop(true);
```
You may activate the progressBar by
```php
    toast()->success('message', 'title')->progressBar(true);
```
You may change the position by
```php
    toast()->success('message', 'title')->positionClass('top-right');
    toast()->success('message', 'title')->positionClass('bottom-right');
    toast()->success('message', 'title')->positionClass('bottom-left');
    toast()->success('message', 'title')->positionClass('top-left');
    toast()->success('message', 'title')->positionClass('top-full-width');
    toast()->success('message', 'title')->positionClass('bottom-full-width');
    toast()->success('message', 'title')->positionClass('top-center');
    toast()->success('message', 'title')->positionClass('bottom-center');
```
You may prevent duplicates by
```php
    toast()->success('message', 'title')->preventDuplicates(true);
```
You may specify the show duration by 
```php
    toast()->success('message', 'title')->showDuration(300);
```
You may specify the hide duration by 
```php
    toast()->success('message', 'title')->hideDuration(1000);
```
You may extend the timeout duration by
```php
    toast()->success('message', 'title')->extendedTimeOut(1000);
```
you may specify the speed of the animation to show and hide toastr by
```php
    toast()->success('message', 'title')->showEasing('swing');
    toast()->success('message', 'title')->hideEasing('linear');
```
you can specify the type of the animation to show and hide toastr by
```php
    toast()->success('message', 'title')->showMethod('fadeIn');
    toast()->success('message', 'title')->hideMethod('fadeOut');
```
you may add behavior on toast click
```javascript
    <script type="text/javascript">
        function behavior(){
            alert("Hello World");
        }
    </script>
```
```php
    toast()->success('message', 'title')->onclick('behavior');    
```
you may add all the options, you do not need to add all, only the ones you need.
```php
    toast()->success('message', 'title')->options([
        'closeButton'       =>  true,
        'debug'             =>  false,
        'newestOnTop'       =>  false,
        'progressBar'       =>  true,
        'positionClass'     =>  'toast-top-right',
        'preventDuplicates' =>  false,
        'onclick'           =>  'behavior',
        'showDuration'      =>  300,
        'hideDuration'      =>  1000,
        'timeOut'           =>  5000,
        'extendedTimeOut'   =>  1000,
        'showEasing'        =>  'swing',
        'hideEasing'        =>  'linear',
        'showMethod'        =>  'fadeIn',
        'hideMethod'        =>  'fadeOut'
    ]);    
```
