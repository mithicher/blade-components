---
title: Confirm Dialog
description: Confirm Dialog
extends: _layouts.documentation
section: content
---

# Confirm Dialog {#confirm-dialog}

Confirm Dialog powered by ALpineJS and Laravel Blade View Components.

![Confirm Dialog](/assets/img/components/confirm.png)

### Usage

```php
// in blade view

<x-confirm title="Delete?" subtitle="Cannot revert back after delete.">
	<x-slot name="trigger">
		<span>Delete</span>
	</x-slot>

	// content goes here...
</x-confirm>
```

### Component

```php
// components/confirm.blade.php

<div 
	x-data="{ open: false }" 
	@close-modal.window="open = false" 
	x-cloak>

	<div 
		class="cursor-pointer" 
		role="button" 
		@click.prevent="open = true">
		{{ $trigger }}
	</div>

	<div 
		class="fixed inset-0 flex h-screen w-full items-center justify-center z-10" 
		x-show="open">
		<div 
			class="cursor-pointer absolute inset-0 bg-black opacity-50" 
			@click="open = false"></div>

		<div
			class="shadow-md m-5 absolute right-0 top-0 w-10 h-10 rounded-full bg-white text-gray-500 hover:text-gray-800 inline-flex items-center justify-center cursor-pointer"
			@click="open = false"
		>
			<svg class="fill-current w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
				<path
					d="M16.192 6.344L11.949 10.586 7.707 6.344 6.293 7.758 10.535 12 6.293 16.242 7.707 17.656 11.949 13.414 16.192 17.656 17.606 16.242 13.364 12 17.606 7.758z"
				/>
			</svg>
		</div>
		<div class="bg-white w-full max-w-md mx-4 md:mx-auto relative z-10 rounded-lg shadow-lg">

			<div class="px-6 md:px-8 py-6">
				<h2 class="text-gray-800 text-xl font-bold mb-1">{{ $title ?? '' }}</h2>
				<div class="text-gray-600">{{ $subtitle ?? '' }}</div>	
			</div>
			
			 
			<div class="flex items-center justify-between border-t"> 
				<button 
					type="button" 
					class="font-medium focus:outline-none border-r w-1/2 px-4 py-4 text-gray-500" 
					@click.prevent="open = false">Cancel</button>	

				<div class="w-1/2">
					{{ $slot }}
				</div>
			</div>
		</div>
	</div>
</div>
```

