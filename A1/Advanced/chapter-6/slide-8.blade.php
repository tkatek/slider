<?php
$content = [
    'page_title' => '',
    'title'      => 'New Language',
    'subtitle'   => '1️⃣ Suggestions',

    'image'      => materialAsset('slider/A1/Advanced/chapter-6/img/slide8.webp'),
    'image_alt'  => 'Railway station action phrases',

    'footer_text' => '',
    'play_label'  => 'Play sentence',

    'items'      => [
        [
            'emoji' => '🎫',
            'text'  => 'Let’s <span class="text-red-500 font-black">buy</span> our tickets to Edinburgh.',
            'sound' => materialAsset('slider/A1/Advanced/chapter-6/audios/slide8/1.mp3'),
        ],
        [
            'emoji' => '📋',
            'text'  => 'Let’s <span class="text-red-500 font-black">check</span> the timetable.',
            'sound' => materialAsset('slider/A1/Advanced/chapter-6/audios/slide8/2.mp3'),
        ],
        [
            'emoji' => '🙋‍♀️',
            'text'  => 'Let’s <span class="text-red-500 font-black">ask</span> her if this is the right train.',
            'sound' => materialAsset('slider/A1/Advanced/chapter-6/audios/slide8/3.mp3'),
        ],
        [
            'emoji' => '🚉',
            'text'  => 'Let’s <span class="text-red-500 font-black">wait</span> on the platform.',
            'sound' => materialAsset('slider/A1/Advanced/chapter-6/audios/slide8/4.mp3'),
        ],
        [
            'emoji' => '💺',
            'text'  => 'Let’s <span class="text-red-500 font-black">find</span> our seats first.',
            'sound' => materialAsset('slider/A1/Advanced/chapter-6/audios/slide8/5.mp3'),
        ],
        [
            'emoji' => '🍵',
            'text'  => 'Let’s <span class="text-red-500 font-black">go get</span> some tea.',
            'sound' => materialAsset('slider/A1/Advanced/chapter-6/audios/slide8/6.mp3'),
        ],
    ],
];
?>
@include('slider.other.new-language-emoji', ['content' => $content])