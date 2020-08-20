<li>
    @if ($url = is_string($item) ? $item : $item->url)
        {{-- Menu item with URL--}}
        <a href="{{ $page->url($url) }}"
            class="{{ 'lvl' . $level }} {{ $page->isActiveParent($item) ? 'lvl' . $level . '-active' : '' }} {{ $page->isActive($url) ? 'active font-semibold text-blue-500 bg-white md:bg-blue-100 rounded -ml-4 pl-4' : '' }} nav-menu__item hover:text-blue-500 py-1 truncate"
        >
            {{ $label }}
        </a>
    @else
        {{-- Menu item without URL--}}
        <p class="mt-6 nav-menu__item text-gray-500 uppercase text-sm tracking-wider font-bold">{{ $label }}</p>
    @endif

    @if (! is_string($item) && $item->children)
        {{-- Recursively handle children --}}
        @include('_nav.menu', ['items' => $item->children, 'level' => ++$level])
    @endif
</li>
