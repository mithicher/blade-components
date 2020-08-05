---
title: Avatar
description: Avatar
extends: _layouts.documentation
section: content
---

# Avatar {#Avatar}

Simple avatar component powered by Blade Components. It takes the first letter of each words given.

![Avatar](/assets/img/components/avatar.png)

### Usage

It takes a size parameter where you can pass ```small```, ```medium``` and ```large``` value.

```php
// in blade view

<x-avatar 
	name="Summer Doe" 
	class="bg-indigo-600 text-white" 
	size="medium"
/>
```

### Component

```php
// components/avatar.blade.php

@php
	if (! function_exists('getNameInitials')) {
		function getNameInitials($name) {
			return collect(explode(' ', $name))->map(function ($item) {
				return strtoupper($item[0]);
			})->implode('');
		}
	}

	$sizeClasses = [
		'small' => 'w-10 h-10',
		'medium' => 'w-12 h-12',
		'large' => 'w-16 h-16'
	];
@endphp

<div
	{{ 
		$attributes->merge([
			'class' => 'shadow-xs font-bold inline-flex bg-gray-100 rounded-full justify-center items-center '. $sizeClasses[$size ?? 'medium']		
		]) 
	}}
>
	{{ getNameInitials($name) }}
</div>
```
