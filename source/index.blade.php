@extends('_layouts.master')

@section('body')
<!-- container max-w-6xl mx-auto  -->
<div class="bg-gray-100">
    <section class="pt-6 md:pt-12 container md:max-w-6xl md:mx-auto">
        <div class="flex flex-col md:flex-row overflow-hidden px-4">
            <div class="flex-1 mb-10 md:mb-0 md:mt-8 md:pr-16">
                <h1 id="intro-docs-template" class="tracking-tight">{{ $page->siteName }}</h1>
                <p class="text-xl mt-2 text-gray-600">{{ $page->siteDescription }}. It includes:</p>
                <p class="text-lg text-gray-600 mb-8 hidden md:block">
                    <div class="flex mb-1">
                        <div class="flex-shrink-0 mr-2 text-blue-400">
                            <svg viewBox="1 0 20 20" fill="currentColor" class="check-circle w-6 h-6"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>    
                        </div>
                        <div>Forms</div>
                    </div>

                    <div class="flex mb-1">
                        <div class="flex-shrink-0 mr-2 text-blue-400">
                            <svg viewBox="1 0 20 20" fill="currentColor" class="check-circle w-6 h-6"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>    
                        </div>
                        <div>Datepicker</div>
                    </div>

                    <div class="flex mb-1">
                        <div class="flex-shrink-0 mr-2 text-blue-400">
                            <svg viewBox="1 0 20 20" fill="currentColor" class="check-circle w-6 h-6"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>    
                        </div>
                        <div>Drag-n-Drop File Upload</div>
                    </div>

                    <div class="flex mb-1">
                        <div class="flex-shrink-0 mr-2 text-blue-400">
                            <svg viewBox="1 0 20 20" fill="currentColor" class="check-circle w-6 h-6"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>    
                        </div>
                        <div>Alerts</div>
                    </div>

                    <div class="flex mb-1">
                        <div class="flex-shrink-0 mr-2 text-blue-400">
                            <svg viewBox="1 0 20 20" fill="currentColor" class="check-circle w-6 h-6"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>    
                        </div>
                        <div>Confirm Box</div>
                    </div>

                    <div class="flex mb-1">
                        <div class="flex-shrink-0 mr-2 text-blue-400">
                            <svg viewBox="1 0 20 20" fill="currentColor" class="check-circle w-6 h-6"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>    
                        </div>
                        <div>Datatable</div>
                    </div>

                    <div class="flex mb-1">
                        <div class="flex-shrink-0 mr-2 text-blue-400">
                            <svg viewBox="1 0 20 20" fill="currentColor" class="check-circle w-6 h-6"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>    
                        </div>
                        <div>Trix Editor and many more...</div>
                    </div>
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
