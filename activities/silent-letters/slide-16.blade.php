@php
    $content = [
        'title' => 'Thank You',
        'subtitle' => '',
        'image' => materialAsset('slider/activities/silent-letters/slide3.webp'),
        'image_alt' => 'Notebook and writing',
        'emojis' => ['🎉', '📚', '✨'],
        'button' => 'Start again',
        'button_action' => 'restart',
        'restart_fallback' => 'slide-1.blade.php',
    ];
@endphp

@include('slider.activities.silent-letters.intro-outro', ['content' => $content])
