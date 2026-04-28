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
                ['text' => 'wonderful', 'emoji' => '✨', 'description' => 'very good', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/wonderful.mp3')],
                ['text' => 'bumpy', 'emoji' => '🛫', 'description' => 'not smooth', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/bumpy.mp3')],
                ['text' => 'scary', 'emoji' => '😨', 'description' => 'makes you afraid', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/scary.mp3')],
                ['text' => 'terrible', 'emoji' => '😖', 'description' => 'very bad', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/terrible.mp3')],
                ['text' => 'rainy', 'emoji' => '🌧️', 'description' => 'with a lot of rain', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/rainy.mp3')],
                ['text' => 'loud', 'emoji' => '🔊', 'description' => 'strong/noisy sound', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/loud.mp3')],
                ['text' => 'salty', 'emoji' => '🧂', 'description' => 'too much salt', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/salty.mp3')],
                ['text' => 'unfriendly', 'emoji' => '🙁', 'description' => 'not kind', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/unfriendly.mp3')],
                ['text' => 'nice', 'emoji' => '😊', 'description' => 'kind / pleasant', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/nice.mp3')],
            ],
        ],
        [
            'key' => 'expressions',
            'title' => 'Expressions',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4',
            'items' => [
                ['text' => 'pretty bad', 'emoji' => '😬', 'description' => 'very bad', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/pretty-bad.mp3')],
                ['text' => "that's too bad", 'emoji' => '😟', 'description' => 'expression of sympathy', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/thats-too-bad.mp3')],
                ['text' => "I'll bet", 'emoji' => '💭', 'description' => "I think / I'm sure", 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/Ill-bet.mp3')],
                ['text' => 'a little bit', 'emoji' => '👌', 'description' => 'a small amount', 'sound' => materialAsset('slider/A2/Beginner/chapter-5/audios/slide7/a-little-bit.mp3')],
            ],
        ],
    ],
];
?>

@include('slider.vocab.sentence-audio', ['content' => $content])