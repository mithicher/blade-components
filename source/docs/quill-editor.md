---
title: Quill Editor
description: Quill Editor
extends: _layouts.documentation
section: content
---

# Quill Editor {#quill-editor}

Quill text editor powered by ALpineJS and Laravel Blade View Components.

![Quill Editor](/assets/img/components/quill.png)

> Currently file upload is not working.

### Usage

Add the style and script file of Quill Editor.

```php
@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.1/styles/night-owl.min.css" rel="stylesheet">
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
@endpush
```

Custom styles for Quill Editor

```css
/* Toolbar Styles */
.ql-editor-haserror .ql-toolbar.ql-snow + .ql-container.ql-snow {
	border: 1px solid #f56565;
	border-radius: 0.5rem;
}
.ql-toolbar.ql-snow + .ql-container.ql-snow {
    border: 1px solid #e2e8f0; 
    border-radius: 0.5rem;
}
.ql-toolbar.ql-snow {
    font-family: inherit;
	border-top-left-radius: 0.5rem;
  	border-top-right-radius: 0.5rem;
	background-color: #fff;
	border: none;
	box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
	position: sticky;
	top: 0;
	z-index: 1;
	margin-left: 1px;
	margin-right: 1px;
}
.ql-container {
	color: #2d3748;
	font-family: inherit;
	font-size: inherit;
}
.ql-container.ql-snow {
	box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
	border-color: #e2e8f0;
	margin-top: -44px;
}
.ql-editor {
	overflow-y: visible; 
	padding-top: 64px;
}
.ql-scrolling-container {
	height: 100%;
	min-height: 100%;
	overflow-y: auto;
}

.ql-editor.ql-blank::before {
    color: #a0aec0;
    font-style: normal;
}
.ql-editor:focus {
	border-radius: 0.5rem;
	box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.5);
}

.ql-editor h1,
.ql-editor h2,
.ql-editor h3 {
	font-size: 1.75rem !important;
	font-weight: 700;
	color: #2d3748;
	border-bottom: 0;
	margin-bottom: 0.75em;
	line-height: 1.2;
}
.ql-editor p {
	margin-bottom: 1em;
}
.ql-editor strong {
	font-weight: 700;
}

.ql-editor ul,
.ql-editor ol {
	margin-bottom: 1em;
}
.ql-editor li {
	margin-bottom: 0.25em;
}
.ql-editor a {
	color: #4299e1;
	text-decoration: none;
	border-bottom: 1px solid #bee3f8;
}
.ql-editor blockquote {
	position: relative;
	display: block;
	margin-top: 1.875em !important;
	margin-bottom: 1.875em !important;
	font-size: 1.875rem;
	line-height: 1.2;
	border-left: 3px solid #cbd5e0;
	font-weight: 600;
	color: #4a5568;
	font-style: normal;
	letter-spacing: -0.05em;
}
.ql-editor pre {
	border-radius: 0.5rem;
	padding: 1rem;
	margin-bottom: 1em;
	font-size: 1rem;
}
.ql-editor iframe {
	width: 100%;
	max-width: 100%;
	height: 400px;
}
```

```php
// in blade view

<x-quill-editor 
	label="Body" 
	name="body" 
	value="" 
	placeholder="Content here..." />
```

### Component

```php
// components/quill-editor.blade.php

<div 
	class="mb-5" 
	x-data="{ content: '' }" 
	x-init="
		quill = new Quill($refs.quillEditor, {
			scrollingContainer: '.ql-scrolling-container',
			modules: {
				toolbar: {
					container: [
					    [{'header': 2}, 'bold', 'italic', 'underline', 'strike'],
					    ['link', 'blockquote', 'code-block', 'image', 'video'],
						[{ list: 'ordered' }, { list: 'bullet' }],
						['clean']
					],
					handlers: {
						image: function () {
							var range = quill.getSelection();
							var value = prompt('Please enter your image URL');
							if(value){
								quill.insertEmbed(range.index, 'image', value, Quill.sources.USER);
							}
						}
					}
				}
			},
			theme: 'snow',
			placeholder: '{{ $placeholder ?? 'Write something great!' }}'
		});
		quill.on('text-change', function () {
			content = quill.root.innerHTML;
		});
		quill.clipboard.addMatcher(Node.ELEMENT_NODE, function (node, delta) {
			var plaintext = node.innerText;
			var Delta = Quill.import('delta');
			return new Delta().insert(plaintext);
		});
		content = quill.root.innerHTML;
	"
	x-cloak>
	@if($label ?? null)
		<label for="{{ $name }}" class="form-label block mb-1 font-semibold text-gray-700">
			{{ $label }}
			@if($optional ?? null)
				<span class="text-sm text-gray-500 font-normal">(optional)</span>
			@endif
		</label>
	@endif

	<div class="relative {{ $errors->has($name) ? 'ql-editor-haserror' : '' }}">
		<input type="hidden" name="{{ $name }}" :value="content">
		<div x-ref="quillEditor" x-model="content" class="bg-white min-h-full h-auto">
			{!! old($name, $value) !!}
		</div>
		
		@error($name)
			<svg class="absolute z-10 text-red-600 fill-current w-5 h-5" style="top: 12px; right: 12px"
				xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
				<path
					d="M11.953,2C6.465,2,2,6.486,2,12s4.486,10,10,10s10-4.486,10-10S17.493,2,11.953,2z M13,17h-2v-2h2V17z M13,13h-2V7h2V13z" />
			</svg>
			<div class="text-red-600 mt-2 text-sm block leading-tight">{{ $message }}</div>
		@enderror
	</div>
</div>
```

 