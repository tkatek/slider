<?php

$content = [
    'page_title' => 'Useful Language',
    'title' => 'Useful Language Expressions',
    'subtitle' => '',
    'grid_class' => 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-3',

    'groups' => [
        [
            'key' => 'roommate-useful-language',
            'title' => '',
            'grid_class' => 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'It’s Your Turn.',
                    'emoji' => '🔄',
                    'description' => 'Used To Say Someone Should Do Something Now',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-5/audios/slide5/its-your-turn.mp3'),
                ],
                [
                    'text' => 'How Long Are You Going To Be?',
                    'emoji' => '⏰',
                    'description' => 'Asking About Time',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-5/audios/slide5/how-long-are-you-going-to-be.mp3'),
                ],
                [
                    'text' => 'Turn Off The Lights.',
                    'emoji' => '💡',
                    'description' => 'Asking Someone To Switch The Lights Off',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-5/audios/slide5/turn-off-the-lights.mp3'),
                ],
                [
                    'text' => 'How Am I Supposed To See Anything?',
                    'emoji' => '👀',
                    'description' => 'Complaining About Difficulty',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-5/audios/slide5/how-am-i-supposed-to-see-anything.mp3'),
                ],
                [
                    'text' => 'That’s Much Better.',
                    'emoji' => '👍',
                    'description' => 'Showing Satisfaction',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-5/audios/slide5/thats-much-better.mp3'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.sentence-audio', ['content' => $content])