<?php
$content = [
    'title' => 'Greeting forms',
    'subtitle' => 'Formal / Informal Greetings',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4 md:grid-cols-2',

    'cards' => [
        [
            'type' => 'audio-list',
            'title' => 'Formal Greetings',
            'tone' => 'from-sky-400 to-blue-500',
            'items' => [
                [
                    'label' => 'Good Morning',
                    'sound' => materialAsset('slider/A1/Beginner/chapter-1/audios/greeting/gm.mpeg'),
                ],
                [
                    'label' => 'Good afternoon',
                    'sound' => materialAsset('slider/A1/Beginner/chapter-1/audios/greeting/gf.mpeg'),
                ],
                [
                    'label' => 'Good evening',
                    'sound' => materialAsset('slider/A1/Beginner/chapter-1/audios/greeting/gev.mpeg'),
                ],
                [
                    'label' => 'How do you do?',
                    'sound' => materialAsset('slider/A1/Beginner/chapter-1/audios/greeting/hdyd.mpeg'),
                ],
                [
                    'label' => 'Nice to meet you',
                    'sound' => materialAsset('slider/A1/Beginner/chapter-1/audios/greeting/nicetomeet.mpeg'),
                ],
            ],
        ],
        [
            'type' => 'audio-list',
            'title' => 'Informal Greetings',
            'tone' => 'from-purple-400 to-violet-500',
            'items' => [
                [
                    'label' => 'Hi !',
                    'sound' => materialAsset('slider/A1/Beginner/chapter-1/audios/greeting/hi.mpeg'),
                ],
                [
                    'label' => 'Hey !',
                    'sound' => materialAsset('slider/A1/Beginner/chapter-1/audios/greeting/hey.mpeg'),
                ],
                [
                    'label' => 'Hello !',
                    'sound' => materialAsset('slider/A1/Beginner/chapter-1/audios/greeting/hello.mpeg'),
                ],
                [
                    'label' => "What's up?",
                    'sound' => materialAsset('slider/A1/Beginner/chapter-1/audios/greeting/WhatsApp.mpeg'),
                ],
                [
                    'label' => "How's it going?",
                    'sound' => materialAsset('slider/A1/Beginner/chapter-1/audios/greeting/howItGoing.mpeg'),
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])