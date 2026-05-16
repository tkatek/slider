<?php

$content = [
    'page_title' => 'Useful Language',
    'title' => 'Useful Language',
    'subtitle' => '',
    'grid_class' => 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-3',

    'groups' => [
        [
            'key' => 'projecting-confidence-expressions',
            'title' => '',
            'grid_class' => 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'That’s a great question',
                    'emoji' => '💡',
                    'description' => 'Buying time',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-7/audios/slide5/thats-a-great-question.mp3'),
                ],
                [
                    'text' => 'Let me think for a moment',
                    'emoji' => '⏳',
                    'description' => 'Pausing confidently',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-7/audios/slide5/let-me-think-for-a-moment.mp3'),
                ],
                [
                    'text' => 'From my perspective',
                    'emoji' => '👀',
                    'description' => 'Giving opinion',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-7/audios/slide5/from-my-perspective.mp3'),
                ],
                [
                    'text' => 'I’m confident this deserves consideration',
                    'emoji' => '✅',
                    'description' => 'Showing confidence',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-7/audios/slide5/im-confident-this-deserves-consideration.mp3'),
                ],
                [
                    'text' => 'Let me clarify',
                    'emoji' => '🎯',
                    'description' => 'Regaining control',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-7/audios/slide5/let-me-clarify.mp3'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.sentence-audio', ['content' => $content])