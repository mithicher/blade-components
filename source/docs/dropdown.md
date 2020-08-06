---
title: Dropdown
description: Dropdown
extends: _layouts.documentation
section: content
---

# Dropdown {#dropdown}

Dropdown powered by ALpineJS and Laravel Blade View Components.

### Usage

```php
// in blade view

<x-dropdown alignment="right">
	<x-slot name="trigger">
		<button class="relative w-8 h-8 text-gray-600 rounded-full border bg-gray-100 font-semibold focus:outline-none focus:shadow-outline text-sm overflow-hidden">
			<img src="{{ auth()->user()->avatarUrl() }}" alt="Profile Photo" class="absolute inset-0 h-full w-full object-cover">
		</button>
	</x-slot>
	
	<div class="text-gray-600 text-sm truncate px-4 py-2">Hi, {{ auth()->user()->name }}</div>

	<x-dropdown-item to="{{ route('dashboard') }}" class="flex items-center">
		<span class="flex-shrink-0 w-5 h-5 mr-2 text-gray-500">@svg(url('/cms/icons/clipboard-list.svg'))</span> Dashboard
	</x-dropdown-item>
	<x-dropdown-item to="{{ route('contacts') }}" class="flex items-center">
		<span class="flex-shrink-0 w-5 h-5 mr-2 text-gray-500">@svg(url('/cms/icons/annotation.svg'))</span> Contacts
	</x-dropdown-item>
	<x-dropdown-item to="{{ route('articles.create') }}" class="flex items-center">
		<span class="flex-shrink-0 w-5 h-5 mr-2 text-gray-500">@svg(url('/cms/icons/pencil-alt.svg'))</span> New Article
	</x-dropdown-item>
	<x-dropdown-item to="{{ route('profile') }}" class="flex items-center">
		<span class="flex-shrink-0 w-5 h-5 mr-2 text-gray-500">@svg(url('/cms/icons/user.svg'))</span> Profile
	</x-dropdown-item>
	<x-dropdown-item to="{{ route('settings') }}" class="flex items-center">
		<span class="flex-shrink-0 w-5 h-5 mr-2 text-gray-500">@svg(url('/cms/icons/cog.svg'))</span> Settings
	</x-dropdown-item>
	<x-dropdown-item to="#" class="flex items-center" onclick="event.preventDefault(); document.getElementById('js-logout').submit()">
		<span class="flex-shrink-0 w-5 h-5 mr-2 text-gray-500">@svg(url('/cms/icons/logout.svg'))</span> Log out
	</x-dropdown-item>

	<x-form method="POST" action="{{ route('logout') }}" id="js-logout"></x-form>
</x-dropdown>
```


### Component

```php
// components/dropdown.blade.php

@props(['alignment' => 'left'])

@php
    $alignmentClasses = [
        'left' => 'left-0',
        'right' => 'right-0',
    ];   
@endphp

<div x-data="{ open: false }" class="relative" x-cloak>
    <div x-on:click="open = ! open" class="cursor-pointer">
		{{ $trigger }}
	</div>

    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-95"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-95"
		@click.away="open = false"
		class="absolute {{ $alignmentClasses[$alignment] }} w-40 z-20 shadow-xs shadow-lg overflow-hidden rounded-lg p-1 bg-white mt-2 -mr-1"
    >   
        {{ $slot }}
    </div>
</div>
```

```php
// components/dropdown-item.blade.php

@php
	$navlinkActive = \Illuminate\Support\Str::startsWith(request()->url(), $to) 
		? 'bg-indigo-100 text-indigo-600' 
		: 'text-gray-700';
@endphp

<a 
	href="{{ $to }}" 
	{{ 
		$attributes->merge([
			'class' => 'truncate mb-1 rounded-lg px-4 py-1 block hover:bg-indigo-100 transition duration-200 ease-out '. $navlinkActive
		])
	}}>
	{{ $slot }}
</a>
```

```php
// components/form.php

@props([
	'method' => 'POST',
	'action'
])
 
<form 
	action="{{ $action }}" 
	method="{{ $method === 'GET' ? 'GET' : 'POST' }}"
	{{ $attributes }}
	onsubmit="
		event.submitter.disabled = true; 
		event.submitter.classList.add(
			'base-spinner', 
			'cursor-not-allowed', 
			'opacity-75'
		)
	">
	@csrf

	@if (!in_array($method, ['GET', 'POST']))
		@method($method)
	@endif

	{{ $slot }}
</form>
```