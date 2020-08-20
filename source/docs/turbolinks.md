---
title: Turbolinks
description: Turbolinks
extends: _layouts.documentation
section: content
---

# Turbolinks {#turbolinks}

[Turbolinks](https://github.com/turbolinks/turbolinks) provides out-of-box support to convert simple web application into a Single Page Application(SPA).

> Get the performance benefits of a single-page application without the added complexity of a client-side JavaScript framework, as stated in their github repo.

Some of the features it provides are given below:

- Ability in navigating to any part of the web app without reloading the entire page.
- Increase in performance.
- SEO friendly.
- Easy client-side integration.

> To make Third Party Libraries work alongside Turbolinks, we have to initialise Turbolinks first.


```js
document.addEventListener('turbolinks:load', function() {
   // third party init goes here
});
```

You need to add the ```data-turbolinks-track="true"``` attribute to any scripts that load on a per-page basis.

```html
<script 
	defer src="{{ mix('js/posts.js') }}" 
	data-turbolinks-track="true"
></script>

<link 
	href="{{mix('css/app.css')}}" 
	rel="stylesheet" 
	data-turbolinks-track="true"
>
```

To completely disable caching in your application, ensure every page contains a no-cache directive.

```html
<head>
	...
	<meta name="turbolinks-cache-control" content="no-cache">
</head>
```

### Persisting Elements Across Page Loads

```html
<div id="cart-counter" data-turbolinks-permanent>1 item</div>
```

### Integration with Laravel

Create a middleware to handle the redirect issue of Turbolinks with Laravel.

```php
<?php

namespace App\Http\Middleware;

use Closure;

class SetTurbolinksHeader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // if($request->has('page')) {
        //     return $response;
        // } else {
        //     $response->header('Turbolinks-Location', $request->url());
        // }
        
        $turbolinksLocation = session('_turbolinks_location');

        if ($request->ajax() && ! $request->isMethod('get')) {
            $script = [];
            $script[] = "Turbolinks.clearCache()";
            $script[] = "Turbolinks.visit('" . $turbolinksLocation . "')";

            $response->setContent(join(";", $script));
            $response->header('Content-Type', 'application/javascript');
            $response->setStatusCode(202);
        } else if ($turbolinksLocation) {
            $response->header("Turbolinks-Location", $turbolinksLocation);
        }

        return $response;
    }
}
```

Put it inside the ```Kernel.php```.

```php
protected $middlewareGroups => [
	'web' => [
	    // Other Middlewares

	    App\Http\Middleware\SetTurbolinksHeader::class,
	]
];	
```

### Turbolinks Macro For Redirect in Controller

Create a new service provider

```php
php artisan make:provider ResponseTurbolinksServiceProvider
```

```php
<?php

namespace App\Providers;

use Response;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Routing\ResponseFactory;

class ResponseTurbolinksServiceProvider extends ServiceProvider
{
    public function boot(ResponseFactory $factory)
    {
        Response::macro('turbolinks', function ($url) use ($factory) {
            return $factory->redirectTo($url)
                ->with('_turbolinks_location', $url);
        });
    }

    public function register()
    {
    }
}
```

Register your new service provider in ```config/app.php```.

```php
'providers' => [
    // Other Service Providers

    /*
     * Turbolinks Service Providers...
     */
    App\Providers\ResponseTurbolinksServiceProvider::class,
]	
```

### Example Controller

```php
<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\StoreRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function example()
    {
        return response()->turbolinks('/home');
    }

    public function login()
    {
        return view('login');
    }

    public function store(StoreRequest $request)
    {
        return response()->turbolinks('/home');
    }

    /**
     * Alternative
     *
     * Using Validation
     */
    public function storeWithManualValidation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        return redirect('/home')
            ->with('_turbolinks_location', '/home');
    }
}
```

### References

- [Turbolinks Github page](https://github.com/turbolinks/turbolinks)
- [Make Your Apps Faster With Turbolinks - Laracasts](https://laracasts.com/series/javascript-techniques-for-server-side-developers/episodes/3)
- [Turbolinks Demo Laravel](https://github.com/rodrigore/turbolinks-demo-laravel)