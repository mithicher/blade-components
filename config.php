<?php

use Illuminate\Support\Str;

return [
    'baseUrl' => '',
    'production' => false,
    'siteName' => 'Blade Components',
    'siteDescription' => 'Beautiful Reusable UI powered by AlpineJS and Laravel Blade',
   
    // Algolia DocSearch credentials
    'docsearchApiKey' => '25626fae796133dc1e734c6bcaaeac3c',
    'docsearchIndexName' => 'docsearch',

    // navigation menu
    'navigation' => require_once('navigation.php'),

    // helpers
    'isActive' => function ($page, $path) {
        return Str::endsWith(trimPath($page->getPath()), trimPath($path));
    },
    'isActiveParent' => function ($page, $menuItem) {
        if (is_object($menuItem) && $menuItem->children) {
            return $menuItem->children->contains(function ($child) use ($page) {
                return trimPath($page->getPath()) == trimPath($child);
            });
        }
    },
    'url' => function ($page, $path) {
        return Str::startsWith($path, 'http') ? $path : '/' . trimPath($path);
    },
];
