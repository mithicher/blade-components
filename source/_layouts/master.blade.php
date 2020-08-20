<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="{{ $page->description ?? $page->siteDescription }}">

        <meta property="og:site_name" content="{{ $page->siteName }}"/>
        <meta property="og:title" content="{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}"/>
        <meta property="og:description" content="{{ $page->description ?? $page->siteDescription }}"/>
        <meta property="og:url" content="{{ $page->getUrl() }}"/>
        <meta property="og:image" content="/assets/img/logo.png"/>
        <meta property="og:type" content="website"/>

        <meta name="twitter:image:alt" content="{{ $page->siteName }}">
        <meta name="twitter:card" content="summary_large_image">

        @if ($page->docsearchApiKey && $page->docsearchIndexName)
            <meta name="generator" content="tighten_jigsaw_doc">
        @endif

        <title>{{ $page->siteName }}{{ $page->title ? ' | ' . $page->title : '' }}</title>

        <link rel="home" href="{{ $page->baseUrl }}">
        <link rel="icon" href="/favicon.ico">

        @stack('meta')

        @if ($page->production)
            <!-- Insert analytics code here -->
        @endif

        <link href="https://fonts.googleapis.com/css2?family=DM+Mono:ital,wght@0,400;0,500;1,400&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">

        @if ($page->docsearchApiKey && $page->docsearchIndexName)
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.css" />
        @endif

        <style>
            html { font-family: 'Inter', sans-serif; }
            code { font-family: 'DM Mono', monospace; }
        </style>
    </head>

    <body class="antialiased flex flex-col justify-between min-h-screen bg-white text-gray-700 leading-normal">
        <header class="z-50 sticky top-0 flex items-center shadow-sm bg-white h-16 py-2" role="banner">
            <div class="container flex items-center max-w-6xl mx-auto px-4 lg:px-4">
                <div class="flex items-center">
                    <a href="/" title="{{ $page->siteName }} home" class="inline-flex items-center no-underline">
                        <img class="h-6 md:h-6 mr-3" src="/assets/img/logo.svg" alt="{{ $page->siteName }} logo" />

                        <h1 class="text-lg md:text-2xl text-blue-900 font-semibold hover:text-blue-600 my-0 pr-4">{{ $page->siteName }}</h1>
                    </a>
                </div>

                <div class="flex flex-1 justify-end items-center text-right md:pl-10">
                    @if ($page->docsearchApiKey && $page->docsearchIndexName)
                        @include('_nav.search-input')
                    @endif
                </div>

                <div class="hidden lg:flex items-center justify-end">
                    <a href="https://github.com/mithicher" target="_blank" rel="noopener" class="no-underline flex mr-4 text-gray-600 pl-8">
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-8 h-8" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M12.026,2c-5.509,0-9.974,4.465-9.974,9.974c0,4.406,2.857,8.145,6.821,9.465	c0.499,0.09,0.679-0.217,0.679-0.481c0-0.237-0.008-0.865-0.011-1.696c-2.775,0.602-3.361-1.338-3.361-1.338	c-0.452-1.152-1.107-1.459-1.107-1.459c-0.905-0.619,0.069-0.605,0.069-0.605c1.002,0.07,1.527,1.028,1.527,1.028	c0.89,1.524,2.336,1.084,2.902,0.829c0.091-0.645,0.351-1.085,0.635-1.334c-2.214-0.251-4.542-1.107-4.542-4.93	c0-1.087,0.389-1.979,1.024-2.675c-0.101-0.253-0.446-1.268,0.099-2.64c0,0,0.837-0.269,2.742,1.021	c0.798-0.221,1.649-0.332,2.496-0.336c0.849,0.004,1.701,0.115,2.496,0.336c1.906-1.291,2.742-1.021,2.742-1.021	c0.545,1.372,0.203,2.387,0.099,2.64c0.64,0.696,1.024,1.587,1.024,2.675c0,3.833-2.33,4.675-4.552,4.922	c0.355,0.308,0.675,0.916,0.675,1.846c0,1.334-0.012,2.41-0.012,2.737c0,0.267,0.178,0.577,0.687,0.479	C19.146,20.115,22,16.379,22,11.974C22,6.465,17.535,2,12.026,2z"/></svg>
                    </a>
                    <a href="https://codepen.io/mithicher" target="_blank" rel="noopener" title="See my pens" class="no-underline flex mr-4 text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-8 h-8" viewBox="0 0 24 24"><path d="M21.838,8.445C21.838,8.444,21.837,8.444,21.838,8.445c-0.002-0.001-0.002-0.002-0.003-0.004l0,0	c-0.001,0-0.001-0.001-0.001-0.001c0-0.001,0-0.001,0-0.001c-0.063-0.093-0.145-0.171-0.235-0.228l-9.164-6.08	c-0.255-0.175-0.644-0.175-0.898,0L2.371,8.214C2.278,8.271,2.196,8.351,2.133,8.445C2.04,8.585,1.997,8.742,2,8.897v6.16	c-0.003,0.153,0.04,0.309,0.131,0.448c0,0,0,0,0,0.001c0.001,0.001,0.001,0.001,0.002,0.002l0,0c0.003,0.006,0.007,0.01,0.01,0.015	v0.002c0.001,0,0.001,0,0.001,0c0.001,0,0.001,0,0.001,0.001c0.001,0,0.001,0.001,0.001,0.001c0.063,0.088,0.14,0.16,0.226,0.215	l9.165,6.082c0.128,0.088,0.282,0.139,0.448,0.139c0.169,0,0.323-0.051,0.45-0.139l9.165-6.082c0.091-0.058,0.172-0.134,0.235-0.229	c0.094-0.141,0.139-0.3,0.136-0.456v-6.16C21.974,8.742,21.93,8.585,21.838,8.445z M12.781,4.273l6.953,4.613l-3.183,2.112	l-3.771-2.536V4.273z M11.189,4.273v4.189l-3.771,2.536L4.237,8.887L11.189,4.273z M3.594,10.371l2.395,1.59l-2.395,1.611V10.371z M11.189,19.682l-6.96-4.617l3.195-2.15l3.765,2.498V19.682z M11.984,14.029l-3.128-2.078l3.128-2.105l3.131,2.105L11.984,14.029z M12.781,19.682v-4.27l3.766-2.498l3.193,2.15L12.781,19.682z M20.378,13.572l-2.396-1.611l2.396-1.59V13.572z"/></svg>
                    </a>
                    <a href="https://twitter.com/mithicher" target="_blank" rel="noopener" title="Follow me on twitter" class="no-underline text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-8 h-8" viewBox="0 0 24 24"><path d="M19.633,7.997c0.013,0.175,0.013,0.349,0.013,0.523c0,5.325-4.053,11.461-11.46,11.461c-2.282,0-4.402-0.661-6.186-1.809	c0.324,0.037,0.636,0.05,0.973,0.05c1.883,0,3.616-0.636,5.001-1.721c-1.771-0.037-3.255-1.197-3.767-2.793	c0.249,0.037,0.499,0.062,0.761,0.062c0.361,0,0.724-0.05,1.061-0.137c-1.847-0.374-3.23-1.995-3.23-3.953v-0.05	c0.537,0.299,1.16,0.486,1.82,0.511C3.534,9.419,2.823,8.184,2.823,6.787c0-0.748,0.199-1.434,0.548-2.032	c1.983,2.443,4.964,4.04,8.306,4.215c-0.062-0.3-0.1-0.611-0.1-0.923c0-2.22,1.796-4.028,4.028-4.028	c1.16,0,2.207,0.486,2.943,1.272c0.91-0.175,1.782-0.512,2.556-0.973c-0.299,0.935-0.936,1.721-1.771,2.22	c0.811-0.088,1.597-0.312,2.319-0.624C21.104,6.712,20.419,7.423,19.633,7.997z"/></svg>
                    </a>
                </div>
            </div>

            @yield('nav-toggle')
        </header>

        <main role="main" class="w-full flex-auto">
            @yield('body')
        </main>

        <footer class="bg-white text-center text-sm py-4" role="contentinfo">
            <ul class="flex flex-col md:flex-row justify-center">
                <li class="md:mr-2">
                   Created by <a href="https://mithicher.dev">Mithicher</a>.
                </li>

                <li>
                    Built with <a href="http://jigsaw.tighten.co" title="Jigsaw by Tighten">Jigsaw</a>
                    and <a href="https://tailwindcss.com" title="Tailwind CSS, a utility-first CSS framework">Tailwind CSS</a>.
                </li>
            </ul>
        </footer>

        <script src="{{ mix('js/main.js', 'assets/build') }}"></script>
        <script>
            document.addEventListener('keypress', function(event) {
                if (event.code == 'Slash') {
                    event.preventDefault();
                    document.getElementById('docsearch-input').focus();
                }
            });
        </script>
        @stack('scripts')
    </body>
</html>
