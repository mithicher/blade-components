---
title: Trix
description: Trix
extends: _layouts.documentation
section: content
---

# Trix Editor {#Trix}

Trix text editor powered by ALpineJS and Laravel Blade View Components.

![EasyMDE](/assets/img/components/trix.png)

### Usage

Add the style and script file of Trix Editor.

```
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" />
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js" defer></script>
@endpush
```

```php
// in blade view

<x-trix-editor 
	label="Body"
	name="body"
	placeholder="Write something..." />
```

Add this custom css for the component that uses svg icons instead of the default icons.

```css
trix-toolbar {
	position: sticky;
	top: 0;
	z-index: 10;
	background-color: #fff;
	border: 0 !important;
	border-top-right-radius: 0.5em;
	border-top-left-radius: 0.5em;
	padding: 0.5em;
	box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
	margin-left: 1px;
	margin-right: 1px;
	margin-top: 0.5em;
}
.trix-editor {
	margin-top: -2.8em;
	padding-top: 4em;
}
trix-toolbar .trix-button-group {
	/* border-color: #ddd;
	border-bottom-color: #ccc; */
	overflow: hidden;
	border-radius: 4px;
	margin-bottom: 0;
	border: 0;
}
trix-toolbar .trix-button:not(:first-child) {
    border-left: 0; 
}
trix-toolbar .trix-button {
	border: 0;
	background-color: #fff;
}
trix-toolbar .trix-button--icon::before {
	opacity: 0.75;
}
trix-toolbar .trix-button--icon-bold::before {
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-bold' width='44' height='44' viewBox='0 0 24 24' stroke-width='1.5' stroke='%232c3e50' fill='none' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath stroke='none' d='M0 0h24v24H0z'/%3E%3Cpath d='M7 5h6a3.5 3.5 0 0 1 0 7h-6z' /%3E%3Cpath d='M13 12h1a3.5 3.5 0 0 1 0 7h-7v-7' /%3E%3C/svg%3E");
}

trix-toolbar .trix-button--icon-italic::before {
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-italic' width='44' height='44' viewBox='0 0 24 24' stroke-width='1.5' stroke='%232c3e50' fill='none' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath stroke='none' d='M0 0h24v24H0z'/%3E%3Cline x1='11' y1='5' x2='17' y2='5' /%3E%3Cline x1='7' y1='19' x2='13' y2='19' /%3E%3Cline x1='14' y1='5' x2='10' y2='19' /%3E%3C/svg%3E");
}
trix-toolbar .trix-button--icon-strike::before {
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-strikethrough' width='44' height='44' viewBox='0 0 24 24' stroke-width='1.5' stroke='%232c3e50' fill='none' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath stroke='none' d='M0 0h24v24H0z'/%3E%3Cline x1='5' y1='12' x2='19' y2='12' /%3E%3Cpath d='M16 6.5a4 2 0 0 0 -4 -1.5h-1a3.5 3.5 0 0 0 0 7' /%3E%3Cpath d='M16.5 16a3.5 3.5 0 0 1 -3.5 3h-1.5a4 2 0 0 1 -4 -1.5' /%3E%3C/svg%3E");
}

trix-toolbar .trix-button--icon-code::before {
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-code' width='44' height='44' viewBox='0 0 24 24' stroke-width='1.5' stroke='%232c3e50' fill='none' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath stroke='none' d='M0 0h24v24H0z'/%3E%3Cpolyline points='7 8 3 12 7 16' /%3E%3Cpolyline points='17 8 21 12 17 16' /%3E%3Cline x1='14' y1='4' x2='10' y2='20' /%3E%3C/svg%3E");
}

trix-toolbar .trix-button--icon-link::before {
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-link' width='44' height='44' viewBox='0 0 24 24' stroke-width='1.5' stroke='%232c3e50' fill='none' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath stroke='none' d='M0 0h24v24H0z'/%3E%3Cpath d='M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5' /%3E%3Cpath d='M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5' /%3E%3C/svg%3E");
}

trix-toolbar .trix-button--icon-bullet-list::before {
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-list' width='44' height='44' viewBox='0 0 24 24' stroke-width='1.5' stroke='%232c3e50' fill='none' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath stroke='none' d='M0 0h24v24H0z'/%3E%3Cline x1='9' y1='6' x2='20' y2='6' /%3E%3Cline x1='9' y1='12' x2='20' y2='12' /%3E%3Cline x1='9' y1='18' x2='20' y2='18' /%3E%3Cline x1='5' y1='6' x2='5' y2='6.01' /%3E%3Cline x1='5' y1='12' x2='5' y2='12.01' /%3E%3Cline x1='5' y1='18' x2='5' y2='18.01' /%3E%3C/svg%3E");
}

trix-toolbar .trix-button--icon-decrease-nesting-level::before {
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-indent-decrease' width='44' height='44' viewBox='0 0 24 24' stroke-width='1.5' stroke='%232c3e50' fill='none' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath stroke='none' d='M0 0h24v24H0z'/%3E%3Cline x1='20' y1='6' x2='13' y2='6' /%3E%3Cline x1='20' y1='12' x2='11' y2='12' /%3E%3Cline x1='20' y1='18' x2='13' y2='18' /%3E%3Cpath d='M8 8l-4 4l4 4' /%3E%3C/svg%3E");
}

trix-toolbar .trix-button--icon-increase-nesting-level::before {
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-indent-increase' width='44' height='44' viewBox='0 0 24 24' stroke-width='1.5' stroke='%232c3e50' fill='none' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath stroke='none' d='M0 0h24v24H0z'/%3E%3Cline x1='20' y1='6' x2='9' y2='6' /%3E%3Cline x1='20' y1='12' x2='13' y2='12' /%3E%3Cline x1='20' y1='18' x2='9' y2='18' /%3E%3Cpath d='M4 8l4 4l-4 4' /%3E%3C/svg%3E");
}

trix-toolbar .trix-button--icon-attach::before {
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-photo' width='44' height='44' viewBox='0 0 24 24' stroke-width='1.5' stroke='%232c3e50' fill='none' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath stroke='none' d='M0 0h24v24H0z'/%3E%3Cline x1='15' y1='8' x2='15.01' y2='8' /%3E%3Crect x='4' y='4' width='16' height='16' rx='3' /%3E%3Cpath d='M4 15l4 -4a3 5 0 0 1 3 0l 5 5' /%3E%3Cpath d='M14 14l1 -1a3 5 0 0 1 3 0l 2 2' /%3E%3C/svg%3E");
}

trix-toolbar .trix-button--icon-quote::before {
	background-image: url("data:image/svg+xml,%3Csvg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-blockquote-left' fill='%232c3e50' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath fill-rule='evenodd' d='M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm5 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z'/%3E%3Cpath d='M3.734 6.352a6.586 6.586 0 0 0-.445.275 1.94 1.94 0 0 0-.346.299 1.38 1.38 0 0 0-.252.369c-.058.129-.1.295-.123.498h.282c.242 0 .431.06.568.182.14.117.21.29.21.521a.697.697 0 0 1-.187.463c-.12.14-.289.21-.503.21-.336 0-.577-.108-.721-.327C2.072 8.619 2 8.328 2 7.969c0-.254.055-.485.164-.692.11-.21.242-.398.398-.562.16-.168.33-.31.51-.428.18-.117.33-.213.451-.287l.211.352zm2.168 0a6.588 6.588 0 0 0-.445.275 1.94 1.94 0 0 0-.346.299c-.113.12-.199.246-.257.375a1.75 1.75 0 0 0-.118.492h.282c.242 0 .431.06.568.182.14.117.21.29.21.521a.697.697 0 0 1-.187.463c-.12.14-.289.21-.504.21-.335 0-.576-.108-.72-.327-.145-.223-.217-.514-.217-.873 0-.254.055-.485.164-.692.11-.21.242-.398.398-.562.16-.168.33-.31.51-.428.18-.117.33-.213.451-.287l.211.352z'/%3E%3C/svg%3E");
}
trix-toolbar .trix-button--icon-number-list::before {
	background-image: url("data:image/svg+xml,%3Csvg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-list-ol' fill='%232c3e50' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath fill-rule='evenodd' d='M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5z'/%3E%3Cpath d='M1.713 11.865v-.474H2c.217 0 .363-.137.363-.317 0-.185-.158-.31-.361-.31-.223 0-.367.152-.373.31h-.59c.016-.467.373-.787.986-.787.588-.002.954.291.957.703a.595.595 0 0 1-.492.594v.033a.615.615 0 0 1 .569.631c.003.533-.502.8-1.051.8-.656 0-1-.37-1.008-.794h.582c.008.178.186.306.422.309.254 0 .424-.145.422-.35-.002-.195-.155-.348-.414-.348h-.3zm-.004-4.699h-.604v-.035c0-.408.295-.844.958-.844.583 0 .96.326.96.756 0 .389-.257.617-.476.848l-.537.572v.03h1.054V9H1.143v-.395l.957-.99c.138-.142.293-.304.293-.508 0-.18-.147-.32-.342-.32a.33.33 0 0 0-.342.338v.041zM2.564 5h-.635V2.924h-.031l-.598.42v-.567l.629-.443h.635V5z'/%3E%3C/svg%3E");
}

trix-toolbar .trix-button--icon-undo::before {
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-arrow-back-up' width='44' height='44' viewBox='0 0 24 24' stroke-width='1.5' stroke='%232c3e50' fill='none' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath stroke='none' d='M0 0h24v24H0z'/%3E%3Cpath d='M9 13l-4 -4l4 -4m-4 4h11a4 4 0 0 1 0 8h-1' /%3E%3C/svg%3E");
}

trix-toolbar .trix-button--icon-redo::before {
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-arrow-forward-up' width='44' height='44' viewBox='0 0 24 24' stroke-width='1.5' stroke='%232c3e50' fill='none' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath stroke='none' d='M0 0h24v24H0z'/%3E%3Cpath d='M15 13l4 -4l-4 -4m4 4h-11a4 4 0 0 0 0 8h1' /%3E%3C/svg%3E");
}

trix-toolbar .trix-button--icon-heading-1::before {
	background-image: url("data:image/svg+xml,%3Csvg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-type-h1' fill='%232c3e50' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M8.637 13V3.669H7.379V7.62H2.758V3.67H1.5V13h1.258V8.728h4.62V13h1.259zm5.329 0V3.669h-1.244L10.5 5.316v1.265l2.16-1.565h.062V13h1.244z'/%3E%3C/svg%3E");
}

trix-editor:empty:not(:focus)::before {
    color: #a0aec0;
}

.trix-content h1 {
	font-size: 2rem;
	font-weight: 700;
	margin-bottom: 0.75rem;
}

.trix-content a {
	text-decoration: underline;
	cursor: pointer;
	color: #667eea;
}

.trix-content blockquote {
	border-left-color: #667eea;
}

.trix-content pre {
	border-radius: 0.5em;
}

.trix-content ol,
.trix-content ul {
	margin-bottom: 1rem;
}

.trix-content li {
	position: relative;
	padding-left: 1.5em;
	margin-bottom: 1rem;
}
.trix-content ul li:before {
	position: absolute;
	top: 10px;
	left: 0;
	content: "";
	width: 0.4em;
	height: 0.4em;
	background-color: #667eea;
	border-radius: 50%;
	display: inline-block;
}

.trix-content ol {
	counter-reset: custom-counter;
}
.trix-content ol li:before {
	counter-increment: custom-counter;
	position: absolute;
	top: 2px;
	left: 0;
	content: counter(custom-counter) ".";
	display: inline-block;
	font-size: 0.85em;
	font-weight: 500;
	color: #667eea;
	text-align: right;
}
```

### Trix File Upload

By default file upload to server is disabled. To active file upload add a ```upload``` key with value ```true```. Then create two endpoints in your route ```web.php```

```php
Route::post('/uploads', 'UploadController@upload');
Route::post('/uploads/remove', 'UploadController@remove');
```

In the controllers folder create a new controller named ```UploadController.php``` and add the following code:

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
    	if ($request->file('image')) {
    		$path = $request->image->store('editor-uploads');
    	 
    		return response()->json([
    			'url' => '/'. $path
    		], 200);
    	}

    	return;
    }

    public function remove(Request $request)
    {
    	if ($request->has('image')) {
    		$image = $request->image;
    		$exists = Storage::disk('public')->exists($image);
	        if ($exists) {
				Storage::delete($image);
				
				return response()->json('Deleted', 200);
	        }
    	}
    }
}
```

```php
// in blade view
<x-trix-editor
	label="Body"
	name="body"
	placeholder="Write something..." 
	upload="true"
	endpoint="/uploads" 
	delete-endpoint="/uploads/remove"
/>
```



### Content Styles

Add the following css styles for styling the content in your view

```css
.markdown-content {
	max-width: 65ch; // change according to need...
}
.markdown-content pre code {
	padding: 1rem;
	font-size: 0.9rem;
}
.markdown-content div,
.markdown-content p,
.markdown-content pre,
.markdown-content blockquote,
.markdown-content ol,
.markdown-content ul {
	margin-bottom: 1.5rem;
}
.markdown-content h1,
.markdown-content h2,
.markdown-content h3 {
	color: #1a202c;
	font-size: 2rem;
	font-weight: bold;
	margin-top: 0;
	margin-bottom: 0.75rem;
	line-height: 1.2;
}
.markdown-content strong {
	font-weight: bold;
}
.markdown-content blockquote {
	display: block;
	border-left: 4px solid #667eea;
	padding-left: 0.8em;
	font-size: 1.25rem;
	font-style: italic;
	font-weight: 400;
}
.markdown-content a {
	color: #667eea;
	text-decoration: underline;
	text-decoration-color: hsla(229,76%,66%, 0.3);
	-moz-text-decoration-color: hsla(229,76%,66%, 0.3);
}
.markdown-content a:hover {
	text-decoration-color: hsla(229,76%,66%, 1);
	-moz-text-decoration-color: hsla(229,76%,66%,1);
}

.markdown-content ol,
.markdown-content ul {
	display: block;
}

.markdown-content li {
	position: relative;
	padding-left: 1.5em;
	margin-bottom: 1rem;
}
.markdown-content ul li:before {
	position: absolute;
	top: 10px;
	left: 0;
	content: "";
	width: 0.4em;
	height: 0.4em;
	background-color: #667eea;
	border-radius: 50%;
	display: inline-block;
}

.markdown-content ol {
	counter-reset: custom-counter;
}
.markdown-content ol li:before {
	counter-increment: custom-counter;
	position: absolute;
	top: 2px;
	left: 0;
	content: counter(custom-counter) ".";
	display: inline-block;
	font-size: 0.85em;
	font-weight: 500;
	color: #667eea;
	text-align: right;
}
```

### Component

```php
// components/trix-editor.blade.php

<div class="mb-5">
	 @if($label ?? null)
		<label for="{{ $name }}" class="form-label block mb-1 font-semibold text-gray-700">
			{{ $label }} 
			@if($optional ?? null)
				<span class="text-sm text-gray-500 font-normal">(optional)</span>
			@endif
		</label>
	@endif
 
	@php $id = $name . Str::random(8); @endphp
	
	<input 
		id="{{ $id }}" 
		type="hidden" 
		name="{{ $name }}" 
		x-ref="{{ $name }}" 
		value="{{ old($name, $value ?? '') }}" />

	<div x-data="{ 
			csrf: '{{ csrf_token() }}',
			error: '', 
			showUploadButton: Boolean('{{ $upload ?? false }}'),
			endpoint: '{{ $endpoint ?? '' }}',
			deleteEndpoint: '{{ $deleteEndpoint ?? '' }}',
			uploadAttachment(event) {
				console.log(event.attachment);
				let attachment = event.attachment;
				let file = attachment.file
				if (file) {
				    let form = new FormData; 
				    form.append('Content-Type', file.type);
				    form.append('image', file);

				    xhr = new XMLHttpRequest;
				    xhr.open('POST', this.endpoint, true);
				    xhr.setRequestHeader('X-CSRF-Token', this.csrf);

				    xhr.upload.onprogress = function(event) {
				    	var progress = event.loaded / event.total * 100;
				    	return attachment.setUploadProgress(progress);
				    };

				    xhr.onload = function() {
				    	if (this.status >= 200 && this.status < 300) {
					        var data = JSON.parse(this.responseText);
					        return attachment.setAttributes({
					        	url: data.url,
					        	href: data.url
					        });
				      	}
				    };

				    return xhr.send(form);
				}
			},
			deleteAttachment(event) {
				// console.log(event.attachment.attachment);
				let attachment = event.attachment;

				let url = attachment.attachment.attributes.values.url.split('/');
				// console.log(`${url[1]}/${url[2]}`);
				let previewURL = `${url[1]}/${url[2]}`;

				if (previewURL && this.deleteEndpoint) {
					let form = new FormData; 
					form.append('image', previewURL);

					xhr = new XMLHttpRequest;
				    xhr.open('POST', this.deleteEndpoint, true);
				    xhr.setRequestHeader('X-CSRF-Token', this.csrf);

				    xhr.upload.onprogress = function(event) {
				    	var progress = event.loaded / event.total * 101;
				    	return attachment.setUploadProgress(progress);
				    };

				    xhr.onload = function() {
				    	if (this.status >= 201 && this.status < 300) {
					        var data = JSON.parse(this.responseText);
					        return '';
				      	}
				    };

				    return xhr.send(form);
				}
			}
		}" 
		x-init="
			document.addEventListener('DOMContentLoaded', () => {
				Trix.config.attachments.preview.caption = {
			    	name: false,
			    	size: false
			  	};
			});
		"
		@js-errors.window="error = $event.detail.errors.{{ $name }} || ''" 
		class="relative"
		x-cloak>
		
	    <trix-editor 
	    	placeholder="{{ $placeholder ?? '' }}"
	    	input="{{ $id }}" 
	    	class="trix-editor border-gray-300 trix-content"
	    	:class="{' border-red-500 bg-red-100' : error.length || '{{ $errors->has($name) }}'}"
	    	x-ref="trix-editor"
			x-on:trix-change="$dispatch('input', event.target.value)"
			x-on:keydown="error.length ? error = '' : ''"
			x-on:trix-initialize="$refs['trix-editor'].classList.add('rounded-lg', 'bg-white', 'shadow-sm', 'p-6')
				uploadBtn = document.querySelector('.trix-button-group--file-tools');
				if (showUploadButton == true) {
					uploadBtn.setAttribute('style', 'display: block');
				} else  {
					uploadBtn.setAttribute('style', 'display: none');
				}
			"
			x-on:trix-focus="$refs['trix-editor'].classList.add('focus:shadow-outline', 'focus:border-blue-300')"
			x-on:trix-attachment-add="showUploadButton == true ? uploadAttachment(event) : ''"
			x-on:trix-attachment-remove="deleteAttachment(event)"
	    	></trix-editor>

	    @isset($hint)
			<div class="text-sm text-gray-500 my-2 leading-tight help-text">{{ $hint }}</div>
		@endisset

	    <div x-show="error.length > 0">
			<svg class="absolute text-red-600 fill-current w-5 h-5" style="top: 48px; right: 12px"
				xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
				<path
					d="M11.953,2C6.465,2,2,6.486,2,12s4.486,10,10,10s10-4.486,10-10S17.493,2,11.953,2z M13,17h-2v-2h2V17z M13,13h-2V7h2V13z" />
			</svg>
			<div class="text-red-600 mt-2 text-sm block leading-tight error-text" x-html="error"></div>
		</div>

		@error($name)
			<svg class="absolute text-red-600 fill-current w-5 h-5" style="top: 48px; right: 12px"
				xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
				<path
					d="M11.953,2C6.465,2,2,6.486,2,12s4.486,10,10,10s10-4.486,10-10S17.493,2,11.953,2z M13,17h-2v-2h2V17z M13,13h-2V7h2V13z" />
			</svg>
			<div class="text-red-600 mt-2 text-sm block leading-tight error-text">{{ $message }}</div>
		@enderror
	
    </div>
</div>
```