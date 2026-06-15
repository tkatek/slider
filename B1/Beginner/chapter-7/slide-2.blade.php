<?php
$content = [
    'page_title' => 'What Does "I Wish" Mean?',
    'title'      => 'What Does "I Wish" Mean?',
    'subtitle'   => '',

    'image' => materialAsset('slider/B1/Beginner/chapter-7/img/slide2.webp'),

    'note_title' => 'We use "I wish" to talk about things we want to be different.',

    'items' => [
        [
            'emoji' => '💭',
            'text'  => 'It expresses wishes or regrets about the present or past.',
        ],
        [
            'emoji' => '🏠',
            'text'  => 'Example: "I wish I had a bigger house"',
        ],
    ],
];
?>

@include('slider.other.new-language-emoji', ['content' => $content])