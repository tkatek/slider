<?php
$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => '',

    'note_title' => 'Collocations',

    'items' => [
        [
            'emoji' => '🤝',
            'sound' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide7/build-trust.mp3'),
            'text'  => 'Build trust',
        ],
        [
            'emoji' => '❤️',
            'sound' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide7/create-emotions.mp3'),
            'text'  => 'Create emotions',
        ],
        [
            'emoji' => '🫶',
            'sound' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide7/give-a-sense-of-belonging.mp3'),
            'text'  => 'Give a sense of belonging',
        ],
        [
            'emoji' => '💬',
            'sound' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide7/share-information.mp3'),
            'text'  => 'Share information',
        ],
        [
            'emoji' => '⭐',
            'sound' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide7/represent-quality.mp3'),
            'text'  => 'Represent quality',
        ],
        [
            'emoji' => '🧭',
            'sound' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide7/influence-decisions.mp3'),
            'text'  => 'Influence decisions',
        ],
        [
            'emoji' => '🔗',
            'sound' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide7/connect-with-customers.mp3'),
            'text'  => 'Connect with customers',
        ],
        [
            'emoji' => '📢',
            'sound' => materialAsset('slider/B1/Intermediate/chapter-4/audios/slide7/promote-products.mp3'),
            'text'  => 'Promote products',
        ],
    ],
];
?>

@include('slider.other.new-language-emoji', ['content' => $content])