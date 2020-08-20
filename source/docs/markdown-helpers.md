---
title: Markdown
description: Markdown
extends: _layouts.documentation
section: content
---

# Markdown {#markdown}

Laravel have a built-in markdown parser using ```\Illuminate\Mail\Markdown::parse($content)```.

```php
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid', 'title', 'slug', 'body', 'active', 'user_id',
    ];

    /**
     * Get the Article's markdown content as HTML
     *
     * @return \Illuminate\Support\HtmlString
     */
    public static function getBodyAttribute($value)
    {
       return \Illuminate\Mail\Markdown::parse($value);
    }
}
```

### Basic Markdown http link parser

It just converts markdown syntax ```[]()``` to an anchor tag.

```php
if (! function_exists('markdownLinkParser')) {
	function markdownLinkParser($html)
	{
	    $reg_ex = "/\\[([^\\[]+)\\]\\(([^\\(]+)\\)/";

	    if(preg_match($reg_ex, $html, $url)) {
	        return preg_replace(
	        	$reg_ex, 
	        	'<a target="_blank" rel="noopener" class="ml-1 text-indigo-500 hover:underline hover:text-indigo-500 transition duration-300 ease-out" href="'. $url[2] . '"> '. $url[1] .'</a>', 
	        	$html
	        );
	    }
	    
	   return $html;
	}
}
```
