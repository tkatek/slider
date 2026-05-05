@php
    $content = [
        'title' => 'Let’s Learn About',
        'subtitle' => 'Silent letters',
        'image' => materialAsset('slider/activities/silent-letters/slide3.webp'),
        'image_alt' => 'Notebook and writing',
        'emojis' => ['📚', '🤫', '✨'],
        'button' => 'Start Session',
        'button_action' => 'next',
        'next_fallback' => 'slide-2.blade.php',
    ];
@endphp

@include('slider.activities.silent-letters.intro-outro', ['content' => $content])
