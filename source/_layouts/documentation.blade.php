@extends('_layouts.master')

@section('nav-toggle')
    @include('_nav.menu-toggle')
@endsection

@section('body')
<section class="container md:max-w-6xl mx-auto px-6 md:px-8 py-4 mt-8">
    <div class="flex flex-col lg:flex-row">
        <nav id="js-nav-menu" class="nav-menu hidden lg:block pl-8 md:pl-0 md:pr-10">
            @include('_nav.menu', ['items' => $page->navigation])
        </nav>

        <div class="DocSearch-content w-full lg:w-4/6 break-words pb-16 lg:pl-8 markdown-content" v-pre>
            @yield('content')
        </div>
    </div>
</section>
@endsection
