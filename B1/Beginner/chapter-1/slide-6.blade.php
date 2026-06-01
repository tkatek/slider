<?php
$content = [

    'title'      => 'New Language Expressions',
    'subtitle'   => '',

    'grid_class' => 'grid-cols-2 sm:grid-cols-3',

    'items' => [

        [
            'text' => 'Would you be able to...?',
            'subtitle' => 'polite request',
            'emoji' => '🙏',
            'sound' => materialAsset('slider/B1/Beginner/chapter-1/audios/slide6/would-you-be-able-to.mp3'),
        ],

        [
            'text' => 'Would you mind...?',
            'subtitle' => 'very polite request',
            'emoji' => '🤝',
            'sound' => materialAsset('slider/B1/Beginner/chapter-1/audios/slide6/would-you-mind.mp3'),
        ],

        [
            'text' => 'Could you please...?',
            'subtitle' => 'polite request',
            'emoji' => '💬',
            'sound' => materialAsset('slider/B1/Beginner/chapter-1/audios/slide6/could-you-please.mp3'),
        ],

        [
            'text' => 'Not at all!',
            'subtitle' => 'polite positive response',
            'emoji' => '😊',
            'sound' => materialAsset('slider/B1/Beginner/chapter-1/audios/slide6/not-at-all.mp3'),
        ],

        [
            'text' => 'Of course!',
            'subtitle' => 'accepting a request',
            'emoji' => '✅',
            'sound' => materialAsset('slider/B1/Beginner/chapter-1/audios/slide6/of-course.mp3'),
        ],

        [
            'text' => 'Sure!',
            'subtitle' => 'informal positive response',
            'emoji' => '👍',
            'sound' => materialAsset('slider/B1/Beginner/chapter-1/audios/slide6/sure.mp3'),
        ],

    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])