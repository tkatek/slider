<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => 'Weather Expressions',

    'hide_image' => true,
    'footer_text' => 'Can you describe the weather in your area today?',
    'play_label'  => 'Play expression',
    'content_grid_class' => 'grid grid-cols-1 gap-8',
    'items_grid_class' => 'grid grid-cols-1 gap-4 text-left sm:grid-cols-2 xl:grid-cols-3',

    'items' => [
        [
            'emoji' => '⛅',
            'text'  => 'partly cloudy',
            'sound' => materialAsset('slider/A2/Beginner/chapter-3/audios/slide11/partly-cloudy.mp3'),
        ],
        [
            'emoji' => '🌦️',
            'text'  => 'light rain',
            'sound' => materialAsset('slider/A2/Beginner/chapter-3/audios/slide11/light-rain.mp3'),
        ],
        [
            'emoji' => '❄️',
            'text'  => 'heavy snow falling',
            'sound' => materialAsset('slider/A2/Beginner/chapter-3/audios/slide11/heavy-snow-falling.mp3'),
        ],
        [
            'emoji' => '💨',
            'text'  => 'strong winds blowing',
            'sound' => materialAsset('slider/A2/Beginner/chapter-3/audios/slide11/strong-winds-blowing.mp3'),
        ],
        [
            'emoji' => '🧣',
            'text'  => 'bundle up!',
            'sound' => materialAsset('slider/A2/Beginner/chapter-3/audios/slide11/bundle-up.mp3'),
        ],
        [
            'emoji' => '🌤️',
            'text'  => 'mild and pleasant',
            'sound' => materialAsset('slider/A2/Beginner/chapter-3/audios/slide11/mild-and-pleasant.mp3'),
        ],
        [
            'emoji' => '🌫️',
            'text'  => 'Thick fog',
            'sound' => materialAsset('slider/A2/Beginner/chapter-3/audios/slide11/thick-fog.mp3'),
        ],
        [
            'emoji' => '💧',
            'text'  => 'Humid and sticky',
            'sound' => materialAsset('slider/A2/Beginner/chapter-3/audios/slide11/humid-and-sticky.mp3'),
        ],
        [
            'emoji' => '⛈️',
            'text'  => 'A thunderstorm approaching',
            'sound' => materialAsset('slider/A2/Beginner/chapter-3/audios/slide11/a-thunderstorm-approaching.mp3'),
        ],
    ],
];
?>
@include('slider.other.new-language-emoji', ['content' => $content])
