<li>
    @if ($url = is_string($item) ? $item : $item->url)
        {{-- Menu item with URL--}}
        <a href="{{ $page->url($url) }}"
            class="{{ 'lvl' . $level }} {{ $page->isActiveParent($item) ? 'lvl' . $level . '-active' : '' }} {{ $page->isActive($url) ? 'active font-semibold text-blue-500' : '' }} nav-menu__item hover:text-blue-500"
        >
            {{ $label }}
        </a>
    @else
        {{-- Menu item without URL--}}
        <p class="md:mt-6 nav-menu__item text-gray-500 uppercase text-xs tracking-wider font-medium">{{ $label }}</p>
    @endif

    @if (! is_string($item) && $item->children)
        {{-- Recursively handle children --}}
        @include('_nav.menu', ['items' => $item->children, 'level' => ++$level])
    @endif
</li>
