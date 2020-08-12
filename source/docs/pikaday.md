---
title: Pikaday Datepicker
description: Pikaday Datepicker
extends: _layouts.documentation
section: content
---

# Pikaday Datepicker {#pikaday}

Pikaday Datepicker component powered by AlpineJS, Blade Component and Uppy.

[Pikaday - A refreshing JavaScript Datepicker](https://pikaday.com/).

![Datepicker](/assets/img/components/pikaday.png)


### Usage

Include the script and style of pikaday.

```php
@push('styles')
<style>
.pikaday-white {
	--backgroundColor: #ffffff;
	--textColor: #718096;
	--currentDateTextColor: #3182ce;
	--selectedDateBackgroundColor: #3182ce;
	--selectedDateTextColor: #ffffff;

	--labelTextColor: #4a5568; /* eg. May 2020 */
	--weekDaysTextColor: #a0aec0; /* eg. Mo Tu We ....*/

	background-color: var(--backgroundColor);
	border-radius: 10px;
	padding: 0.7rem;
	z-index: 2000;
    margin: 6px 0 0 0;
	box-shadow: 0 1px 2px 0 rgba(60, 64, 67, .30), 0 1px 3px 1px rgba(60, 64, 67, .15);
	font-family: inherit;
}

.pikaday-white.is-hidden {
    display: none;
}

.pikaday-white .pika-title {
    padding: 0.2rem 0;
    width: 100%;
	text-align: center;
	display: flex;
	justify-content: flex-start;
}

/* Next/Previous */
.pikaday-white .pika-prev,
.pikaday-white .pika-next {
    position: absolute;
    outline: none;
    padding: 0;
    width: 24px;
	height: 24px;
	top: 15px;
	display: inline-block;
    margin-top: 0;
    cursor: pointer;
	/* hide text using text-indent trick, using width value (it's enough) */
    text-indent: -9999px;
    white-space: nowrap;
    overflow: hidden;
    background-color: transparent;
    background-position: center center;
    background-repeat: no-repeat;
	opacity: .7;
}
.pikaday-white .pika-prev:hover,
.pikaday-white .pika-next:hover {
	opacity: 1;
}
.pikaday-white .pika-prev {
	right: 30px;
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%23a0aec0'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15 19l-7-7 7-7'%3E%3C/path%3E%3C/svg%3E");
}
.pikaday-white .pika-next {
	right: 10px;
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%23a0aec0'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 5l7 7-7 7'%3E%3C/path%3E%3C/svg%3E");
}
.pika-prev.is-disabled,
.pika-next.is-disabled {
    cursor: default;
    opacity: .2;
}

.pikaday-white .pika-label {
	font-size: 1.2rem;
	font-weight: 700;
	padding-right: 4px;
	padding-left: 4px;
	color: var(--labelTextColor);
}

/* Show Month & Year select */
.pikaday-white .pika-select-month,
.pikaday-white .pika-select-year {
	display: none;
}

.pikaday-white table {
    width: 100%;
    border-collapse: collapse;
}
.pikaday-white table th {
    width: 2em;
    height: 2em;
    font-weight: normal;
    color: var(--weekDaysTextColor);
    text-align: center;
}
.pikaday-white table th abbr {
    text-decoration: none;
}
.pikaday-white table td {
	padding: 1px;
}
.pikaday-white table td button {
    width: 2em;
    height: 2em;
    text-align: center;
    border-radius: 50%;
}
.pikaday-white table td:not(.is-disabled) button:hover {
    background-color: var(--selectedDateBackgroundColor);
}
.pikaday-white table td.is-disabled button {
	cursor: disabled;
	opacity: 0.5;
}
.pikaday-white table td.is-disabled button:hover {
    background-color: transparent;
	color: inherit;
}
.pikaday-white table td.is-today button {
	color: var(--currentDateTextColor);
}
.pikaday-white table td.is-selected button {
	background-color: var(--selectedDateBackgroundColor);
}

.pikaday-white table td button {
	color: var(--textColor);
}
.pikaday-white table td button:hover,
.pikaday-white table td.is-selected button,
.pikaday-white table td.is-selected button:hover {
    color: var(--selectedDateTextColor);
}
</style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.8.0/pikaday.min.js"></script>
@endpush
```

> For dark theme visit here: [https://gist.github.com/mithicher/2266302fd2040b9acdd055b24baf224d](https://gist.github.com/mithicher/2266302fd2040b9acdd055b24baf224d)

```php
// in blade view

<x-pikaday 
	label="Publish date" 
	name="publish_date" 
	value="{{ now()->format('D M d Y') }}" />
```
 

### Component

```php
// components/pikaday.blade.php

<div class="mb-5">
	@if($label ?? null)
		<label class="form-label block mb-1 font-semibold text-gray-700">
			{{ $label }}
		</label>
	@endif
	
	<div class="relative w-full">
		<input
			x-data
    		x-ref="input"
			x-init="
				datepicker = new Pikaday({ 
					defaultDate: $refs.input.value,
					field: $refs.input,
					theme: 'pikaday-white',
					minDate: new Date(),
					firstDay: 1,
					{{-- format: 'D/M/YYYY',
					toString(date, format) {
						const day = date.getDate();
						const month = date.getMonth() + 1;
						const year = date.getFullYear();
						return `${day}/${month}/${year}`;
					}, --}}
					i18n: {
						previousMonth: 'Prev',
						nextMonth: 'Next',
						months: [
							'January',
							'February',
							'March',
							'April',
							'May',
							'June',
							'July',
							'August',
							'September',
							'October',
							'November',
							'December'
						],
						weekdays: [
							'Sunday',
							'Monday',
							'Tuesday',
							'Wednesday',
							'Thursday',
							'Friday',
							'Saturday'
						],
						weekdaysShort: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa']
					},

					onSelect() {
						$dispatch('input', $refs.input.value)
					}
				})"
			{{ $attributes->merge([
				'class' => 'pl-12 pr-2 py-2 leading-normal block w-full text-gray-800 font-sans rounded-lg text-left appearance-none border bg-white focus:outline-none focus:shadow-outline shadow-sm w-full'
			]) }}
			type="text"
			readonly
		>
		
		<svg style="top: 8px; left: 12px" class="absolute text-gray-400 w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
	</div>
</div>
```
