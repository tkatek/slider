<?php

$content = [
    'page_title' => '',
    'title' => 'Slang time!',
    'subtitle' => '',
    'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',

    'groups' => [
        [
            'key' => 'maintaining-professional-connections',
            'title' => '',
            'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'Keep the conversation alive',
                    'emoji' => '💬',
                    'description' => 'Maintain engagement with contacts',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-5/audios/slide12/Keep the conversation alive Maintain engagement wi.mp3'),
                ],
                [
                    'text' => 'Nurture connections',
                    'emoji' => '🌱',
                    'description' => 'Build long-term professional relationships',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-5/audios/slide12/Nurture connections Build long-term professional r.mp3'),
                ],
                [
                    'text' => 'Strategic follow-up',
                    'emoji' => '🎯',
                    'description' => 'Contact purposefully and timely',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-5/audios/slide12/Strategic follow-up Contact purposefully and timel.mp3'),
                ],
                [
                    'text' => 'Reinforce rapport',
                    'emoji' => '🤝',
                    'description' => 'Strengthen positive relationship',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-5/audios/slide12/Reinforce rapport Strengthen positive relationship.mp3'),
                ],
                [
                    'text' => 'Professional courtesy',
                    'emoji' => '💼',
                    'description' => 'Polite and respectful behavior',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-5/audios/slide12/Professional courtesy Polite and respectful behavi.mp3'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])