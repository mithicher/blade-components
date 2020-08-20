---
title: Snippets
description: Snippets
extends: _layouts.documentation
section: content
---

# Snippets {#snippets}

### Searching Models Using a where-like-query in Laravel

[Searching Models Using a where-like-query in Laravel - By Freek](https://freek.dev/1182-searching-models-using-a-where-like-query-in-laravel)

```php
// app/Providers/AppServiceProvider.php
// use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Support\Arr;
// use Illuminate\Support\Str;

Builder::macro('whereLike', function ($attributes, string $searchTerm) {
    $this->where(function (Builder $query) use ($attributes, $searchTerm) {
        foreach (Arr::wrap($attributes) as $attribute) {
            $query->when(
                Str::contains($attribute, '.'),
                function (Builder $query) use ($attribute, $searchTerm) {
                    [$relationName, $relationAttribute] = explode('.', $attribute);

                    $query->orWhereHas($relationName, function (Builder $query) use ($relationAttribute, $searchTerm) {
                        $query->where($relationAttribute, 'LIKE', "%{$searchTerm}%");
                    });
                },
                function (Builder $query) use ($attribute, $searchTerm) {
                    $query->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
                }
            );
        }
    });

    return $this;
});
```

Usage

```php
Product::whereLike(['name', 'price', 'category.name', 'shop.name'], $this->search)
		->get();
```

### Scope Filter

```php
public function scopeFilterTickets($query)
{
    $query->when(request()->input('priority'), function($query) {
            $query->whereHas('priority', function($query) {
                $query->whereId(request()->input('priority'));
            });
        })
        ->when(request()->input('category'), function($query) {
            $query->whereHas('category', function($query) {
                $query->whereId(request()->input('category'));
            });
        })
        ->when(request()->input('status'), function($query) {
            $query->whereHas('status', function($query) {
                $query->whereId(request()->input('status'));
            });
        });
}
```

### Useful Blade Directives

```php
Blade::directive('datetime', function ($expression) {
    return "<?php echo ($expression)->format('m/d/Y H:i'); ?>";
});
// Usage @datetime($var)

Blade::directive('currency', function ($amount) {
    return "<?php echo '&#8377;' . $amount ?>";
});
// Usage @currency($amount)


Blade::directive('nl2br', function ($expression) {
    return sprintf('<?php echo nl2br(e(%s)); ?>', $expression);
});
```

### Display SVG inline

```php
Blade::directive('svg', function ($argument) {
    return "<?php echo file_get_contents($argument); ?>";
});
```

### Pagination in Collections

[The easiest way to paginate a @laravelphp collection using Laravel Macros - By Rashid Laasri](https://twitter.com/RashidLaasri/status/1225184640295755776)

```php
Collection::macro('paginate', function ($perPage = 14, $page = null, $options = []) {
	$page = request('page', $page);

	return new LengthAwarePaginator(
		$this->forPage($page, $perPage),
		$this->count(),
		$perPage,
		$page,
		$options
	);
});
```

Usage

```php
$movies = collect([
	'John Wick: 1',
	'John Wick: 2',
	'John Wick: 3'
]);

$movies->paginate(3);
```

### Formatting Date Display 

```php
public function getJobPublishedAtFormattedAttribute()
{
    if ($this->job_published_at == null) {
        return 'Not published yet';
    }

    $created = new Carbon($this->job_published_at);
    $now = Carbon::now();

    if ($created->diff($now)->days <= 1) {
        $difference = $created->diffForHumans(null, null, true); // * time ago
    } else if ($created->diff($now)->days < 2) {
        $difference = 'Yesterday';
    } else if (in_array($created->diff($now)->days, [3, 4, 5, 6, 7])) {
        $difference = $created->diff($now)->days . ' days ago';
    } else {
        $difference = $created->toFormattedDateString(); // Dec 19, 2015
    }

    return $difference;
}
``` 

### Validate Start and End Date

```php
$rules =  [
	'job_starting_date' => [
		'required', 
		'date_format:d/m/Y', 
		'before_or_equal:job_closing_date'
	],
	'job_closing_date' => [
		'required', 
		'date_format:d/m/Y', 
		'after_or_equal:job_starting_date'
	]
];
```

### Convert http text to links

It converts text starting with ```http/https``` to anchor links.

```php
if (! function_exists('textToLinks')) {
	function textToLinks($html)
	{
	     // Check for http/ftp/email and convert to links
	     $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";

	     if(preg_match($reg_exUrl, $html, $url)) {
	         return preg_replace($reg_exUrl, '<a target="_blank" rel="noopener" class="text-indigo-500 border-b border-indigo-200 hover:text-indigo-700 transition duration-300 ease-out" href="'. $url[0] . '"> '. $url[0] .'</a> ', $html);
	     }
	     
	    return $html;
	}
}
```