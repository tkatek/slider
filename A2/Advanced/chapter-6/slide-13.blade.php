<?php
$content = [
    'page_title' => 'Language Focus',
    'title'      => 'Language Focus',
    'subtitle'   => 'How long have you lived here? for or since?!',

    'grid_class' => 'grid-cols-1',

    'groups' => [
        [
            'key'        => 'conversation-1',
            'title'      => 'Listen to these 2 conversations and learn the difference between “since” and “for”, Then, role-play the dialogue',
            'grid_class' => 'grid-cols-2',
            'items'      => [
                [
                    'text'  => "I've been wondering, John.",
                    'emoji' => '👩',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-6/audios/slide13/1.mp3'),
                ],
                [
                    'text'  => 'About what?',
                    'emoji' => '👨',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-6/audios/slide13/2.mp3'),
                ],
                [
                    'text'  => 'How long have you lived here?',
                    'emoji' => '👩',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-6/audios/slide13/3.mp3'),
                ],
                [
                    'text'      => "I've lived in Korea for 10 years.",
                    'text_html' => 'I\'ve lived in Korea <span class="text-orange-500 dark:text-orange-300">for</span> 10 years.',
                    'emoji'     => '👨',
                    'sound'     => materialAsset('slider/A2/Advanced/chapter-6/audios/slide13/4.mp3'),
                ],
                [
                    'text'  => "Wow, that's a long time.",
                    'emoji' => '👩',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-6/audios/slide13/5.mp3'),
                ],
            ],
        ],
        [
            'key'        => 'conversation-2',
            'title'      => 'Conversation 2:',
            'grid_class' => 'grid-cols-2',
            'items'      => [
                [
                    'text'  => "She's very good at her job. She's one of the best employees here.",
                    'emoji' => '👨',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-6/audios/slide13/6.mp3'),
                ],
                [
                    'text'  => 'How long has she worked here?',
                    'emoji' => '👩',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-6/audios/slide13/7.mp3'),
                ],
                [
                    'text'      => "She's worked here since 2000.",
                    'text_html' => 'She\'s worked here <span class="text-rose-500 dark:text-rose-300">since</span> 2000.',
                    'emoji'     => '👨',
                    'sound'     => materialAsset('slider/A2/Advanced/chapter-6/audios/slide13/9.mp3'),
                ],
                [
                    'text'  => "She's been there a long time.",
                    'emoji' => '👩',
                    'sound' => materialAsset('slider/A2/Advanced/chapter-6/audios/slide13/9.mp3'),
                ],
            ],
        ],
    ],
];
?>

@include('slider.vocab.sentence-audio', ['content' => $content])
