@extends('_layouts.master')

@section('body')
<!-- container max-w-6xl mx-auto  -->
<div class="bg-gray-100">
    <section class="pt-6 md:pt-12 container md:mx-auto px-6 md:px-0">
        <div class="flex flex-col md:flex-row overflow-hidden">
            <div class="flex-1 mb-10 md:mb-0 md:mt-8 md:pr-16">
                <h1 id="intro-docs-template" class="tracking-tight">{{ $page->siteName }}</h1>
                <p class="text-xl mt-2 text-gray-600">{{ $page->siteDescription }}. It includes:</p>
                <p class="text-lg text-gray-600 mb-8 hidden md:block">
                    - Forms <br>    
                    - Datepicker <br>
                    - Drag-n-Drop File Upload <br>
                    - ALerts <br>
                    - Confirm Box <br>
                    - Datatable <br>
                    - Trix Editor and many more...
                </p>
               
                <div class="flex">
                    <span class="inline-flex rounded-full shadow-sm">
                        <a href="/docs/introduction" title="{{ $page->siteName }} getting started" class="inline-flex shadow no-underline font-medium bg-blue-500 hover:bg-blue-600 text-white hover:text-white rounded-full py-3 px-6">See Documentation</a>
                    </span>
                </div>
            </div>
            
            <div class="w-full md:w-3/5">
                <img 
                    src="/assets/img/hero.svg" 
                    alt="{{ $page->siteName }}" 
                    class="object-cover -mb-6">    
            </div>

           <!--  <img src="/assets/img/hero.svg" alt="{{ $page->siteName }}" class="w-full md:hidden mx-auto mb-8 lg:mb-0"> -->
        </div>
    </section>
</div>
@endsection
