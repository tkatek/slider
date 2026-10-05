{{-- Canva source page 1: https://canva.link/y4h0j64e7zqgakl --}}
@php
    $content = [
        'type' => 'intro',
        'unit' => 'Eureka!',
        'unit_number' => '3',
        'lesson' => 'Inventions That Have Transformed Life Expectancy',
        'lesson_number' => '2',
        'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide1.webp'),
        'image_alt' => 'Medical innovations that have helped people live longer.',
        'button' => 'Start Session',
        'page_title' => 'Inventions That Have Transformed Life Expectancy',
    ];
@endphp

@include('slider.intro.intro-outro', ['content' => $content])
