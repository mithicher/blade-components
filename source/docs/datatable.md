---
title: Datatable
description: Basic datatable with ALpineJS and Laravel Blade View Component
extends: _layouts.documentation
section: content
---

# Datatable {#datatable}

Simple datatable powered by Laravel Blade Components and ALpineJS. For this datatable to works we have to do some modification in our Controller.

![Datatable](/assets/img/components/datatable.png)

Create a route in ```web.php```

```php
Route::get('/contacts', 'ContactController@index')->name('contacts');
```

### Controller

```php
<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $contact = Contact::query();

        if ($request->ajax()) {
            if($search = request('s')) {
                $contact->where('email', 'like', '%' . $search . '%')
                    ->orWhere('first_name', 'like', '%' . $search . '%')
                    ->orWhere('last_name', 'like', '%' . $search . '%');
            }

            $contacts = $contact->latest()->paginate(10);

            return view('contacts._partial', compact('contacts'))->render();
    	}

        $contacts = $contact->latest()->paginate(10);

        return view('contacts.index', [
            'contacts' => $contacts
        ]);   
    }
}
```

### View

```php
// contacts/_partial.blade.php

@if ($contacts->isNotEmpty())
	<x-base-datatable
		:headings="['#', 'First name', 'Last name', 'Email', 'Phone', 'Zip', 'Created at']"
		:values="[
			[
				'key' => 'id', 
				'type' => 'data'
			],
			[
				'key' => 'first_name', 
				'type' => 'data'
			],
			[
				'key' => 'last_name', 
				'type' => 'data'
			],
			[
				'key' => 'type', 
				'type' => 'data',
				'theme' => [
					'type' => 'badge',
					'colors' => [
						'client' => 'bg-green-200 text-green-700',
						'broker' => 'bg-orange-200 text-orange-700',
						'partner' => 'bg-blue-200 text-blue-700',
						'agent' => 'bg-indigo-200 texindigoge-700',
					]
				]
			],
			[
				'key' => 'email', 
				'type' => 'data'
			],
			[
				'key' => 'phone', 
				'type' => 'data'
			],
			[
				'key' => 'zip', 
				'type' => 'data'
			],
			[
				'key' => 'created_at', 
				'type' => 'date',
			]
		]"
		:data="$contacts"
		model="contacts"
		table-striped
	>
	</x-base-datatable>	
@else
	No contacts found. 
@endif
```

```php
// contacts/index.blade.php

<div
	x-data="{
		// checks any search query string in browser URL
		query: new URLSearchParams(location.search).get('s') || '',

		// fetches data using fetch api
		fetchData(page = null) {
			// Check if any page query string is available in browser URL
			// then grab that value
			let currentPageFromUrl = location.search.match(/page=(\d+)/) 
							? location.search.match(/page=(\d+)/)[1] 
							: 1
		
			if (this.query) {
				currentPageFromUrl = 1;
				history.pushState(null, null, '?page=1&s='+ this.query);
			}
			
			// TODO: Change the endpoint
			const endpointURL =  page !== null 
						? `${page}&s=${this.query}` 
						: `/contacts?page=${currentPageFromUrl}&s=${this.query}`;
			
			if (page) {
				// 1. if page is valid http://domain.test/users/partial?page=2&s=

				// 2. create a URL object from the page
				const urlObj = new URL(page);
				
				// 3. initialize URLSearchParams
				const params = new URLSearchParams(urlObj.search);
					
				// 4. Push to Current Browser URL
				history.pushState(null, null, '?page=' + params.get('page') );
			}
				
			fetch(endpointURL, {
					headers: {
						'X-Requested-With': 'XMLHttpRequest'
					}
				})
				.then(response => response.text())
				.then(html => {
					document.querySelector('#js-contacts-body').innerHTML = html
				})
		}
	}"
	x-init="
		$watch('query', (value) => {
			const url = new URL(window.location.href);
			url.searchParams.set('s', value);
			history.pushState(null, document.title, url.toString());
		})
	"
	@goto-page="fetchData($event.detail.page)"
	@reload.window="fetchData()"
	x-cloak>

	<div class="my-4">
		<x-search-input
			placeholder="Search contacts..." 
			name="s" 
			x-model="query" 
			x-on:input.debounce.750="fetchData()" />
	</div>

	<div id="js-contacts-body">
		@include('contacts._partial')
	</div>
</div>
```

### Component

This component has a custom pagination dependency. Place the pagination in ```resources/partials/tailwindPaginationAlpine.blade.php```.

```php
// components/base-datatable.blade.php

<div class="mb-5 overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">			
	<table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
		<thead>
			<tr class="text-left">
				@foreach($headings as $heading)
				<th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
					{{ $heading }}
				</th>
				@endforeach
			</tr>
		</thead>
		<tbody>
			@foreach($data as $index => $item)
				<tr 
					x-data="{ 
						showConfirm: false, 
						deleteitem(id) {
							return fetch(`/{{ $model }}/${id}`, {
								method: 'POST',
								body: JSON.stringify({
									'_method': 'DELETE'
								}),
								headers: {
									'Content-Type': 'application/json',
									'Accept': 'application/json',
									'X-CSRF-TOKEN': '{{ csrf_token() }}'
								}
							})
							.then(response => response.json());
						}
					}" 
					x-cloak
					class="{{ $tableStriped && ($index % 2 != 0) ? 'bg-gray-100' : ''}}"
				>
					@foreach($values as $value)
						<td x-show="!showConfirm" class="border-t border-gray-200">

							@php $valueItem = explode('.', $value['key']); @endphp

							@if($value['type'] === 'data')
								<span class="text-gray-700 px-6 py-3 block items-center truncate {{ $value['width'] ?? '' }}">
									@if(count($valueItem) == 1)
										@if(isset($value['theme']) && $value['theme']['type'] === 'badge')
											<span class="inline-flex font-bold uppercase text-sm tracking-wide px-2 rounded-full {{ $value['theme']['colors'][$item->{$valueItem[0]}] }}">
												{{ $item->{$valueItem[0]} }}
											</span>
										@else
											{{ $item->{$valueItem[0]} }}
										@endif
									@endif

									@if(count($valueItem) == 2)
										@if(isset($value['theme']) && $value['theme']['type'] === 'badge')
											<span class="inline-flex font-bold uppercase text-sm tracking-wide px-2 rounded-full {{ $value['theme']['colors'][$item->{$valueItem[0]}->{$valueItem[1]}] }}">
												{{ $item->{$valueItem[0]}->{$valueItem[1]} }}
											</span>
										@else
											{{ $item->{$valueItem[0]}->{$valueItem[1]} }}
										@endif	 
									@endif

									@if(count($valueItem) == 3)
										{{ $item->{$valueItem[0]}->{$valueItem[1]}->{$valueItem[2]} }}	 
									@endif
								</span>
							@endif

							@if($value['type'] === 'date')
								<span class="text-gray-700 px-6 py-3 flex items-center">
									@if(count($valueItem) == 1)
										@if(isset($value['format']))
											{{ $item->{$valueItem[0]}->format($value['format']) }}
										@else
											{{ $item->{$valueItem[0]}->format('j M, Y') }}
										@endif
									@endif

									@if(count($valueItem) == 2)
										@if(isset($value['format']))
											{{ $item->{$valueItem[0]}->{$valueItem[1]}->format($value['format']) }}
										@else
											{{ $item->{$valueItem[0]}->{$valueItem[1]}->format('j M, Y') }}	
										@endif 
									@endif

									@if(count($valueItem) == 3)
										@if(isset($value['format']))
											{{ $item->{$valueItem[0]}->{$valueItem[1]}->{$valueItem[2]}->format($value['format']) }}
										@else
											{{ $item->{$valueItem[0]}->{$valueItem[1]}->{$valueItem[2]}->format('j M, Y') }}
										@endif	 
									@endif
								</span>
							@endif

							@php $actions = collect($value['type']); @endphp

							@if($actions->contains('edit') || $actions->contains('delete'))
								<div class="text-gray-700 px-6 py-3 flex items-center justify-center">
									@if($actions->contains('edit'))
										<a class="underline text-indigo-500 mr-2" href="{{ route($model.'.edit', $item->id) }}">Edit</a>
									@endif
									@if($actions->contains('delete'))
										<a class="underline text-red-500" href="#" x-on:click.prevent="showConfirm = true">Delete</a>
									@endif
								</div>
							@endif
						</td>
					@endforeach

					<td x-show="showConfirm" class="border-t border-gray-200" :colspan="showConfirm === true ? '{{ count($values) }}' : 1">
					 
						<div class="bg-gray-100 flex-1 px-6 py-2">
							<div class="flex items-center justify-between">
								<div class="ml-auto">
									<h3 class="font-semibold text-gray-700 pr-4">Are you sure?</h3>
								</div>
								<div class="flex items-center pt-1">
									<span class="shadow-xs mr-2 rounded-lg">
										<button type="button" x-on:click="showConfirm = false" class="px-2 py-1 rounded-lg bg-white text-gray-600">Cancel</button>
									</span>
			 
									<button 
										x-ref="deleteButton"
										x-on:click="$refs.deleteButton.classList.add('base-spinner', 'cursor-not-allowed'); deleteitem('{{ $item->id }}').then(() => $dispatch('reload')); $dispatch('notice', { type: 'success', text: 'item Deleted'})"
										type="button" 
										class="px-2 py-1 rounded-lg bg-red-500 text-white shadow-sm">Delete</button>
								</div>
							</div>
						</div>
						 
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

<div>
	{{ $data->onEachSide(2)->links('partials.tailwindPaginationAlpinejs') }}	
</div>
```

### Custom Pagination View

```php
// partials/tailwindPaginationAlpinejs.blade.php

@if ($paginator->hasPages())
    <div class="flex md:flex-row-reverse items-center justify-between w-full px-4">
    	<div class="flex items-center">
		 
			<div class="mr-1">
				@if ($paginator->onFirstPage())
					<span class="cursor-not-allowed opacity-50 py-2 px-3 text-gray-800 font-medium inline-flex items-center border border-transparent hover:border-gray-300 leading-none rounded-lg"
					>
						<svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
							<path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/>
						</svg>Previous
					</span>
				@else
					<button
						x-on:click="$dispatch('goto-page', { page: '{{ $paginator->previousPageUrl() }}' })"
						class="py-2 px-3 leading-none rounded-lg text-gray-700 font-medium inline-flex items-center border border-transparent hover:border-gray-300"
					>
						<svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
							<path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/>
						</svg>Previous
					</button>
				@endif
			</div>
 
	        <div class="hidden md:block">
				@foreach ($elements as $element)
				 
					@if (is_string($element))
						<span class="-mt-1 inline border border-transparent px-4 py-3 no-underline inline-flex items-center cursor-not-allowed no-underline">{{ $element }}</span>
					@endif
					
				 
	            	@if (is_array($element))
	                	@foreach ($element as $page => $url)
							@if ($page == $paginator->currentPage())
								<div class="border border-transparent text-white bg-indigo-500 inline px-3 py-2 rounded-lg leading-none  no-underline inline-flex items-center">{{ $page }}</div>
							@else
								<button
									x-on:click="$dispatch('goto-page', {page: '{{ $paginator->url($page) }}'})"
									class="cursor-pointer text-gray-700 hover:text-indigo-500 border border-transparent hover:border-gray-300 px-3 py-2 rounded-lg leading-none no-underline inline-flex items-center">{{ $page }}
								</button>
							@endif
						@endforeach
	            	@endif
				@endforeach
			</div>
 
			<div class="ml-1">
				@if ($paginator->hasMorePages())
					<button 
						x-on:click="$dispatch('goto-page', { page: '{{ $paginator->nextPageUrl() }}'  })" 
						class="py-2 px-3 leading-none text-gray-700 font-medium inline-flex items-center border border-transparent hover:border-gray-300 rounded-lg">
						Next<svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
							<path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
						</svg>
					</button>
				@else
					<span class="py-2 px-3 leading-none text-gray-700 font-medium inline-flex items-center border border-transparent hover:border-gray-300 rounded-lg cursor-not-allowed opacity-50">
						Next<svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
							<path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
						</svg>
					</span>
				@endif
			</div>
	    </div>
	    <div class="flex-1">
			<div class="text-gray-600 text-sm ml-5 md:ml-0 truncate">
				Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }}  of {{ $paginator->total() }} results
			</div>
		</div>
	</div>
@endif
```

### Badge Display

Display content type as badge by adding additional ```theme``` key. In the example given below, the key inside ```colors``` array is the value in datatable.

```php
// in your blade view
<x-base-datatable
	...

	:values="[
		...

		[
			'key' => 'type', 
			'type' => 'data',
			'theme' => [
				'type' => 'badge',
				'colors' => [
					'client' => 'bg-green-200 text-green-700',
					'broker' => 'bg-orange-200 text-orange-700',
					'partner' => 'bg-blue-200 text-blue-700',
					'agent' => 'bg-indigo-200 texindigoge-700',
				]
			]
		]
		
		...
	]"
	
	...
>
</x-base-datatable>	
```

### Format Date

Format date for type ```date``` with Carbon date format.

```php
// in your blade view
<x-base-datatable
	...

	:values="[
		...

		[
			'key' => 'created_at', 
			'type' => 'date',
			'format' => 'y/m/d'
		],
		
		...
	]"
	
	...
>
</x-base-datatable>	
```