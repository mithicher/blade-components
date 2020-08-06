---
title: Read More / Read Less
description: Read More / Read Less
extends: _layouts.documentation
section: content
---

# Read More / Read Less {#read-more}

Simple read more/read less component powered by Blade Components.

Here is an example:

![Read-more-read-less](/assets/img/components/readmore.png)

### Usage

```php
// in blade view

<x-readmore :content="$post->body" limit="200" />
```

### Component

```php
<div x-data="{ open: false }" x-ref="demo" x-cloak>
	<span x-show="!open">
		{!! 
			\Illuminate\Support\Str::limit(
				strip_tags(trim($content ?? '')), 
				(int) $limit ?? 100
			) 
		!!}	
	</span>

	<a href="#0" @click.prevent="open = true" x-show="! open">Show more</a>
	
	<div x-show="open">
		{!! $content ?? '' !!}
		<a 
			href="#0" 
			@click.prevent="
				open = false; 
				$refs.demo.scrollIntoView({behaviour: 'smooth'})
			" 
			x-show="open"
		>Show less</a>
	</div>
</div>
```
