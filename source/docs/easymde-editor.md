---
title: EasyMDE
description: EasyMDE
extends: _layouts.documentation
section: content
---

# EasyMDE {#easymde}

EasyMDE Markdown text editor powered by ALpineJS and Laravel Blade View Components.

![EasyMDE](/assets/img/components/easymde.png)

### Usage

Add the style and script file of EasyMDE.

```
@push('styles')
<link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
@endpush

@push('scripts')
<script src="https://unpkg.com/easymde/dist/easymde.min.js" defer></script>
@endpush
```

```php
// in blade view

<x-easymde-editor 
	label="Body"
	name="body" />
```

Add this custom css for the component that uses svg icons instead of the default FontAwesome icons.

```css
.editor-toolbar {
	border: none;
	position: sticky;
	top: 0;
	left: 0;
	z-index: 10;
	background: white;
	opacity: 1;
	margin-left: 1px;
	margin-right: 1px;
	box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
	border-top-right-radius: 0.5em;
	border-top-left-radius: 0.5em;
	overflow: hidden;
}
.editor-toolbar:hover {
	opacity: 1;
}
.editor-preview {
	top: 50px;
}
.CodeMirror, .CodeMirror-scroll {
	min-height: 100px;
	border-radius: 0.5rem;
}
.CodeMirror {
	overflow: hidden;
	margin-top: -50px;
	padding-top: 60px;
	box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
	border-color: #e2e8f0;
}
.CodeMirror-focused {
	box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.5);
}
.simplemde-haserror .CodeMirror,
.easymde-haserror .CodeMirror {
	border: 1px solid rgb(245,101,101);
	background-color: rgb(255,245,245);
}
.editor-toolbar a.active, 
.editor-toolbar a:hover {
	background-color: none !important;
}
.editor-toolbar a,
.editor-toolbar button {
	margin-right: 10px;
}

.editor-toolbar.disabled-for-preview button:not(.no-disable) {
    opacity: .2;
}

.button-bold:before,
.button-heading-2:before,
.button-italic:before, 
.button-strike:before,
.button-code:before, 
.button-link:before,
.button-unordered-list:before, 
.button-ordered-list:before,
.button-image:before, 
.button-preview:before, 
.button-quote:before, 
.button-columns:before, 
.button-fullscreen:before,
.button-clean-block::before {
	content: '';
	display: flex;
	width: 24px;
	height: 24px;
	background-size: 20px;
	background-position: 3px 2px;
	background-repeat: no-repeat;
}

.editor-toolbar button.heading-2:after {
    content: "";
}
.editor-toolbar:after, 
.editor-toolbar:before {
    display: block;
    content: '';
    height: 0;
}

.button-clean-block::before {
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-eraser' width='44' height='44' viewBox='0 0 24 24' stroke-width='1.5' stroke='%232c3e50' fill='none' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath stroke='none' d='M0 0h24v24H0z'/%3E%3Cpath d='M19 19h-11l-4 -4a1 1 0 0 1 0 -1.41l10 -10a1 1 0 0 1 1.41 0l5 5a1 1 0 0 1 0 1.41l-9 9' /%3E%3Cpath d='M18 12.3l-6.3 -6.3' /%3E%3C/svg%3E");
}

.button-preview:before {
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-eye' width='44' height='44' viewBox='0 0 24 24' stroke-width='1.5' stroke='%232c3e50' fill='none' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath stroke='none' d='M0 0h24v24H0z'/%3E%3Ccircle cx='12' cy='12' r='2' /%3E%3Cpath d='M2 12l1.5 2a11 11 0 0 0 17 0l1.5 -2' /%3E%3Cpath d='M2 12l1.5 -2a11 11 0 0 1 17 0l1.5 2' /%3E%3C/svg%3E");	
}

.button-bold:before {
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-bold' width='44' height='44' viewBox='0 0 24 24' stroke-width='1.5' stroke='%232c3e50' fill='none' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath stroke='none' d='M0 0h24v24H0z'/%3E%3Cpath d='M7 5h6a3.5 3.5 0 0 1 0 7h-6z' /%3E%3Cpath d='M13 12h1a3.5 3.5 0 0 1 0 7h-7v-7' /%3E%3C/svg%3E");
}

.button-italic:before {
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-italic' width='44' height='44' viewBox='0 0 24 24' stroke-width='1.5' stroke='%232c3e50' fill='none' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath stroke='none' d='M0 0h24v24H0z'/%3E%3Cline x1='11' y1='5' x2='17' y2='5' /%3E%3Cline x1='7' y1='19' x2='13' y2='19' /%3E%3Cline x1='14' y1='5' x2='10' y2='19' /%3E%3C/svg%3E");
}
.button-strike:before {
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-strikethrough' width='44' height='44' viewBox='0 0 24 24' stroke-width='1.5' stroke='%232c3e50' fill='none' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath stroke='none' d='M0 0h24v24H0z'/%3E%3Cline x1='5' y1='12' x2='19' y2='12' /%3E%3Cpath d='M16 6.5a4 2 0 0 0 -4 -1.5h-1a3.5 3.5 0 0 0 0 7' /%3E%3Cpath d='M16.5 16a3.5 3.5 0 0 1 -3.5 3h-1.5a4 2 0 0 1 -4 -1.5' /%3E%3C/svg%3E");
}

.button-code:before {
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-code' width='44' height='44' viewBox='0 0 24 24' stroke-width='1.5' stroke='%232c3e50' fill='none' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath stroke='none' d='M0 0h24v24H0z'/%3E%3Cpolyline points='7 8 3 12 7 16' /%3E%3Cpolyline points='17 8 21 12 17 16' /%3E%3Cline x1='14' y1='4' x2='10' y2='20' /%3E%3C/svg%3E");
}

.button-link:before {
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-link' width='44' height='44' viewBox='0 0 24 24' stroke-width='1.5' stroke='%232c3e50' fill='none' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath stroke='none' d='M0 0h24v24H0z'/%3E%3Cpath d='M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5' /%3E%3Cpath d='M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5' /%3E%3C/svg%3E");
}

.button-unordered-list:before {
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-list' width='44' height='44' viewBox='0 0 24 24' stroke-width='1.5' stroke='%232c3e50' fill='none' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath stroke='none' d='M0 0h24v24H0z'/%3E%3Cline x1='9' y1='6' x2='20' y2='6' /%3E%3Cline x1='9' y1='12' x2='20' y2='12' /%3E%3Cline x1='9' y1='18' x2='20' y2='18' /%3E%3Cline x1='5' y1='6' x2='5' y2='6.01' /%3E%3Cline x1='5' y1='12' x2='5' y2='12.01' /%3E%3Cline x1='5' y1='18' x2='5' y2='18.01' /%3E%3C/svg%3E");
}
 
 
.button-image:before {
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-photo' width='44' height='44' viewBox='0 0 24 24' stroke-width='1.5' stroke='%232c3e50' fill='none' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath stroke='none' d='M0 0h24v24H0z'/%3E%3Cline x1='15' y1='8' x2='15.01' y2='8' /%3E%3Crect x='4' y='4' width='16' height='16' rx='3' /%3E%3Cpath d='M4 15l4 -4a3 5 0 0 1 3 0l 5 5' /%3E%3Cpath d='M14 14l1 -1a3 5 0 0 1 3 0l 2 2' /%3E%3C/svg%3E");
}

.button-quote:before {
	background-image: url("data:image/svg+xml,%3Csvg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-blockquote-left' fill='%232c3e50' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath fill-rule='evenodd' d='M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm5 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z'/%3E%3Cpath d='M3.734 6.352a6.586 6.586 0 0 0-.445.275 1.94 1.94 0 0 0-.346.299 1.38 1.38 0 0 0-.252.369c-.058.129-.1.295-.123.498h.282c.242 0 .431.06.568.182.14.117.21.29.21.521a.697.697 0 0 1-.187.463c-.12.14-.289.21-.503.21-.336 0-.577-.108-.721-.327C2.072 8.619 2 8.328 2 7.969c0-.254.055-.485.164-.692.11-.21.242-.398.398-.562.16-.168.33-.31.51-.428.18-.117.33-.213.451-.287l.211.352zm2.168 0a6.588 6.588 0 0 0-.445.275 1.94 1.94 0 0 0-.346.299c-.113.12-.199.246-.257.375a1.75 1.75 0 0 0-.118.492h.282c.242 0 .431.06.568.182.14.117.21.29.21.521a.697.697 0 0 1-.187.463c-.12.14-.289.21-.504.21-.335 0-.576-.108-.72-.327-.145-.223-.217-.514-.217-.873 0-.254.055-.485.164-.692.11-.21.242-.398.398-.562.16-.168.33-.31.51-.428.18-.117.33-.213.451-.287l.211.352z'/%3E%3C/svg%3E");
}
.button-ordered-list:before {
	background-image: url("data:image/svg+xml,%3Csvg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-list-ol' fill='%232c3e50' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath fill-rule='evenodd' d='M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5z'/%3E%3Cpath d='M1.713 11.865v-.474H2c.217 0 .363-.137.363-.317 0-.185-.158-.31-.361-.31-.223 0-.367.152-.373.31h-.59c.016-.467.373-.787.986-.787.588-.002.954.291.957.703a.595.595 0 0 1-.492.594v.033a.615.615 0 0 1 .569.631c.003.533-.502.8-1.051.8-.656 0-1-.37-1.008-.794h.582c.008.178.186.306.422.309.254 0 .424-.145.422-.35-.002-.195-.155-.348-.414-.348h-.3zm-.004-4.699h-.604v-.035c0-.408.295-.844.958-.844.583 0 .96.326.96.756 0 .389-.257.617-.476.848l-.537.572v.03h1.054V9H1.143v-.395l.957-.99c.138-.142.293-.304.293-.508 0-.18-.147-.32-.342-.32a.33.33 0 0 0-.342.338v.041zM2.564 5h-.635V2.924h-.031l-.598.42v-.567l.629-.443h.635V5z'/%3E%3C/svg%3E");
}

.button-heading-2:before {
	background-image: url("data:image/svg+xml,%3Csvg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-type-h2' fill='%232c3e50' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M7.638 13V3.669H6.38V7.62H1.759V3.67H.5V13h1.258V8.728h4.62V13h1.259zm3.022-6.733v-.048c0-.889.63-1.668 1.716-1.668.957 0 1.675.608 1.675 1.572 0 .855-.554 1.504-1.067 2.085l-3.513 3.999V13H15.5v-1.094h-4.245v-.075l2.481-2.844c.875-.998 1.586-1.784 1.586-2.953 0-1.463-1.155-2.556-2.919-2.556-1.941 0-2.966 1.326-2.966 2.74v.049h1.223z'/%3E%3C/svg%3E");
}

.button-columns:before {
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-layout-columns' width='44' height='44' viewBox='0 0 24 24' stroke-width='1.5' stroke='%232c3e50' fill='none' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath stroke='none' d='M0 0h24v24H0z'/%3E%3Crect x='4' y='4' width='16' height='16' rx='2' /%3E%3Cline x1='12' y1='4' x2='12' y2='20' /%3E%3C/svg%3E");
}

.button-fullscreen:before {
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-maximize' width='44' height='44' viewBox='0 0 24 24' stroke-width='1.5' stroke='%232c3e50' fill='none' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath stroke='none' d='M0 0h24v24H0z'/%3E%3Cpath d='M4 8v-2a2 2 0 0 1 2 -2h2' /%3E%3Cpath d='M4 16v2a2 2 0 0 0 2 2h2' /%3E%3Cpath d='M16 4h2a2 2 0 0 1 2 2v2' /%3E%3Cpath d='M16 20h2a2 2 0 0 0 2 -2v-2' /%3E%3C/svg%3E");
}

.editor-preview-active pre {
	border-radius: 0.5rem;
	padding: 10px;
}
```

### Syntax Highlighting

For syntax highlighting in blade view include the following files.

```php
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.18.3/styles/atom-one-dark.min.css">
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/highlight.js/latest/highlight.min.js" defer></script>
<script>
	document.addEventListener('DOMContentLoaded', () => {
		document.querySelectorAll('pre code').forEach((block) => {
			hljs.highlightBlock(block);
			block.classList.add('rounded-lg');
		});
	});
</script>
@endpush
```

### Markdown Styles

Add the following css styles for styling the markdown content in your view

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
// components/easymde-editor.blade.php

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
	
	<div 
		x-data="{ error: '', showToolbar: true }" 
		x-init="
			showToolbar = Boolean('{{ $toolbar ?? true }}');
			document.addEventListener('DOMContentLoaded', () => {
				toolbarSettings = [
					{
						name: 'bold',
						action: EasyMDE.toggleBold,
						className: 'button-bold',
						title: 'Bold'
					},
					{
						name: 'italic',
						action: EasyMDE.toggleItalic,
						className: 'button-italic',
						title: 'Italic'
					},
					{
						name: 'strikethrough',
						action: EasyMDE.toggleStrikethrough,
						className: 'button-strike',
						title: 'Strikethrough'
					},
					{
						name: 'heading-2',
						action: EasyMDE.toggleHeading2,
						className: 'button-heading-2',
						title: 'Heading'
					},
					{
						name: 'quote',
						action: EasyMDE.toggleBlockquote,
						className: 'button-quote',
						title: 'Quote'
					},
					{
						name: 'unordered-list',
						action: EasyMDE.toggleUnorderedList,
						className: 'button-unordered-list',
						title: 'Unordered list'
					},
					{
						name: 'ordered-list',
						action: EasyMDE.toggleOrderedList,
						className: 'button-ordered-list',
						title: 'Ordered list'
					},
					{
						name: 'link',
						action: EasyMDE.drawLink,
						className: 'button-link',
						title: 'Create Link'
					},
					{
						name: 'code',
						action: EasyMDE.toggleCodeBlock,
						className: 'button-code',
						title: 'Code'
					},
					{
						name: 'image',
						action: EasyMDE.drawImage,
						className: 'button-image',
						title: 'Insert Image'
					},
					{
						name: 'clean-block',
						action: EasyMDE.cleanBlock,
						className: 'button-clean-block',
						title: 'Clean block'
					},
					{
						name: 'preview',
			            action: EasyMDE.togglePreview,
			            className: 'button-preview no-disable',
			            title: 'Toggle Preview'
					},
					{
						name: 'side-by-side',
			            action: EasyMDE.toggleSideBySide,
			            className: 'button-columns no-disable no-mobile',
			            title: 'Toggle Side by Side'
					},
					{
						name: 'fullscreen',
			            action: EasyMDE.toggleFullScreen,
			            className: 'button-fullscreen no-disable no-mobile',
			            title: 'Toggle Fullscreen'
					}
				];
				new EasyMDE({ 
					hideIcons: {{ json_encode($hideIcons ?? []) }},
					status: false,
					autoDownloadFontAwesome: false,
					forceSync: true,
					element: $refs.input,
					toolbar: showToolbar == true ? toolbarSettings : false,
					renderingConfig: {
						codeSyntaxHighlighting: true
					},
					indentWithTabs: true,
        			lineWrapping: true,
					tabSize: 4,
					placeholder: '{{ $placeholder ?? 'Write something...' }}'
				});	
			});
		"
		@js-errors.window="error = $event.detail.errors.{{ $name }} || ''" 
		class="relative"
		x-cloak>
		
		<div
			class="relative" 
			:class="{'easymde-haserror' : error.length || '{{ $errors->has($name) }}'}">
			<textarea 
		    	id="{{ $id }}" 
		    	placeholder="{{ $placeholder ?? '' }}"
		    	{{ $attributes->merge() }}
		    	x-ref="input">{{ old($name, $value ?? '') }}</textarea>	
		
		    @isset($hint)
				<div class="text-sm text-gray-500 my-2 leading-tight help-text">{{ $hint }}</div>
			@endisset

		    <div x-show="error.length > 0">
				<svg class="z-20 absolute text-red-600 fill-current w-5 h-5" style="top: 12px; right: 12px"
					xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
					<path
						d="M11.953,2C6.465,2,2,6.486,2,12s4.486,10,10,10s10-4.486,10-10S17.493,2,11.953,2z M13,17h-2v-2h2V17z M13,13h-2V7h2V13z" />
				</svg>
				<div class="text-red-600 mt-2 text-sm block leading-tight error-text" x-html="error"></div>
			</div>

			@error($name)
				<svg class="z-20 absolute text-red-600 fill-current w-5 h-5" style="top: 12px; right: 12px"
					xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
					<path
						d="M11.953,2C6.465,2,2,6.486,2,12s4.486,10,10,10s10-4.486,10-10S17.493,2,11.953,2z M13,17h-2v-2h2V17z M13,13h-2V7h2V13z" />
				</svg>
				<div class="text-red-600 mt-2 text-sm block leading-tight error-text">{{ $message }}</div>
			@enderror
		</div>
    </div>
</div>
```