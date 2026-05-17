<?php

$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'Emergency Calls',
    'subtitle'   => 'New Vocabulary',

    'groups' => [
        [
            'key'        => 'emergency-phrases',
            'title'      => '',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4 ',
            'items'      => [
                [
                    'text'   => 'call 911',
                    'emoji'  => '📞',
                    'script' => 'call <span class="text-red-500 font-black">911</span>',
                    'sound'  => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide7/call-911.mp3'),
                ],
                [
                    'text'  => "what's your emergency?",
                    'emoji' => '🚨',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide7/whats-your-emergency.mp3'),
                ],
                [
                    'text'  => 'stay on the line',
                    'emoji' => '☎️',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide7/stay-on-the-line.mp3'),
                ],
                [
                    'text'  => 'describe the situation',
                    'emoji' => '🗣️',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide7/describe-the-situation.mp3'),
                ],
                [
                    'text'  => 'is anyone injured?',
                    'emoji' => '🤕',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide7/is-anyone-injured.mp3'),
                ],
                [
                    'text'  => 'paramedics are on their way',
                    'emoji' => '🚑',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide7/paramedics-are-on-their-way.mp3'),
                ],
                [
                    'text'  => 'what is your location?',
                    'emoji' => '📍',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide7/what-is-your-location.mp3'),
                ],
            ],
        ],
        [
            'key'        => 'emergency-vocabulary',
            'title'      => '',
            'grid_class' => 'grid-cols-2 sm:grid-cols-3 xl:grid-cols-6 ',
            'items'      => [
                [
                    'text'  => 'Emergency',
                    'emoji' => '🚨',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide7/emergency.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-6/img/slide7/emergency.webp'),
                ],
                [
                    'text'  => 'Ambulance',
                    'emoji' => '🚑',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide7/ambulance.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-6/img/slide7/ambulance.webp'),
                ],
                [
                    'text'  => 'Injured',
                    'emoji' => '🤕',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide7/injured.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-6/img/slide7/injured.webp'),
                ],
                [
                    'text'  => 'Unconscious',
                    'emoji' => '😵',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide7/unconscious.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-6/img/slide7/unconscious.webp'),
                ],
                [
                    'text'  => 'Breathe',
                    'emoji' => '🫁',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide7/breathe.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-6/img/slide7/breathe.webp'),
                ],
                [
                    'text'  => 'Paramedic',
                    'emoji' => '🧑‍⚕️',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide7/paramedic.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-6/img/slide7/paramedic.webp'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])
