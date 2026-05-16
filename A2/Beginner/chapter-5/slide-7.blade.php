<?php

$content = [
    'page_title' => 'New Vocabulary',
    'title' => 'New Vocabulary',
    'subtitle' => '',
    'grid_class' => 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4',

    'groups' => [
        [
            'key' => 'adjectives',
            'title' => 'Adjectives',
            'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-5',
            'items' => [
                ['text' => 'Wonderful', 'emoji' => '✨', 'description' => 'Very good', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/wonderful.mp3')],
                ['text' => 'Bumpy', 'emoji' => '🛫', 'description' => 'Not smooth (e.g., plane moves a lot)', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/bumpy.mp3')],
                ['text' => 'Scary', 'emoji' => '😨', 'description' => 'Makes you afraid', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/scary.mp3')],
                ['text' => 'Terrible', 'emoji' => '😖', 'description' => 'Very bad', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/terrible.mp3')],
                ['text' => 'Rainy', 'emoji' => '🌧️', 'description' => 'With a lot of rain', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/rainy.mp3')],
                ['text' => 'Loud', 'emoji' => '🔊', 'description' => 'Strong/noisy sound', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/loud.mp3')],
                ['text' => 'Salty', 'emoji' => '🧂', 'description' => 'Too much salt', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/salty.mp3')],
                ['text' => 'Unfriendly', 'emoji' => '🙁', 'description' => 'Not kind', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/unfriendly.mp3')],
                ['text' => 'Nice', 'emoji' => '😊', 'description' => 'Kind / pleasant', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/nice.mp3')],
            ],
        ],
        [
            'key' => 'expressions',
            'title' => 'Expressions',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4',
            'items' => [
                ['text' => 'Pretty bad', 'emoji' => '😬', 'description' => 'Very bad', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/pretty-bad.mp3')],
                ['text' => "That's too bad", 'emoji' => '😟', 'description' => 'Expression of sympathy', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/thats-too-bad.mp3')],
                ['text' => "I'll bet", 'emoji' => '💭', 'description' => "I think / I'm sure", 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/Ill-bet.mp3')],
                ['text' => 'A little bit', 'emoji' => '👌', 'description' => 'A small amount', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/a-little-bit.mp3')],
            ],
        ],
    ],
];

?>

@include('slider.vocab.sentence-audio', ['content' => $content])