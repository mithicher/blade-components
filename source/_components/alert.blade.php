@props(['variant' => 'info'])

@php
$alertClass = [
    'info' => 'text-lg bg-blue-100 text-blue-700 border-t-8 border-blue-300',
    'success' => 'text-lg bg-green-100 text-green-700 border-t-8 border-green-300',
    'error' => 'text-lg bg-red-100 text-red-700 border-t-8 border-red-300'
]   
@endphp

<div>
    <div class="w-full my-4 relative flex px-6 py-4 rounded-lg {{ $alertClass[$variant] }}" role="alert">
        <div class="flex-shrink-0 mr-5 pt-px">
            @if($variant == 'info')   
                <svg class="w-8 h-8 text-blue-600" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            @endif
            @if($variant == 'success')   
                <svg class="w-8 h-8 text-green-600" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            @endif
            @if($variant == 'error')   
                <svg class="w-8 h-8 text-red-600" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
            @endif
        </div>

        <div class="flex-1 pt-1">
            {{ $slot }}
        </div>
    </div>
</div>