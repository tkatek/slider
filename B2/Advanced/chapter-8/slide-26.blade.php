{{-- Canva source page 26: https://canva.link/y4h0j64e7zqgakl --}}
@php
    $content = [
        'title' => 'Thank You!',
        'subtitle' => 'Inventions That Have Transformed Life Expectancy',
        'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide26.webp'),
        'image_alt' => 'A brighter future through life-saving innovation.',
        'label' => 'Exit Ticket',
        'heading' => 'Before you leave, complete the idea:',
        'questions' => [
            [
                'title' => 'One life-saving invention you learnt about today…',
                'text' => 'One life-saving invention I learnt about today is __________.',
            ],
        ],
        'footer' => '',
        'page_title' => 'Thank You!',
    ];
@endphp

@include('slider.thankYou.image-discussion', ['content' => $content])
