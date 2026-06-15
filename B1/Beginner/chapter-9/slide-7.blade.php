<?php
$content = [
    'title'    => 'Language Focus',
    'subtitle' => '',

    'groups' => [
        [
            'title'      => '',
            'grid_class' => 'grid-cols-1 md:grid-cols-3',
            'items'      => [
                [
                    'text' => 'Asking for advice',
                    'subtitle' => "I'm not sure what to do about this situation.",
                    'emoji' => '💬',
                    'sound' => materialAsset('slider/B1/Beginner/chapter-9/audios/slide7/asking-for-advice.mp3'),
                ],

                [
                    'text' => 'Asking about a problem',
                    'subtitle' => "What's wrong?",
                    'emoji' => '❓',
                    'sound' => materialAsset('slider/B1/Beginner/chapter-9/audios/slide7/asking-about-a-problem.mp3'),
                ],

                [
                    'text' => 'Giving advice with Second Conditional',
                    'subtitle' => 'If I were you, I would talk to her.',
                    'emoji' => '💡',
                    'sound' => materialAsset('slider/B1/Beginner/chapter-9/audios/slide7/giving-advice1.mp3'),
                ],

                [
                    'text' => 'Giving advice with Second Conditional',
                    'subtitle' => 'If I were you, I would try to approach the conversation calmly.',
                    'emoji' => '💡',
                    'sound' => materialAsset('slider/B1/Beginner/chapter-9/audios/slide7/giving-advice2.mp3'),
                ],

                [
                    'text' => 'Accepting advice',
                    'subtitle' => "That's a good idea.",
                    'emoji' => '✅',
                    'sound' => materialAsset('slider/B1/Beginner/chapter-9/audios/slide7/thats-a-good-idea.mp3'),
                ],
            ],
        ],
    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])