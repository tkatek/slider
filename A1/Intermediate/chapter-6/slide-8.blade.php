<?php

$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'Emergency Calls',
    'subtitle'   => 'New Vocabulary',

    'groups' => [
        [
            'key'        => 'emergency-situations',
            'title'      => '🚨 Emergency Situations',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4 xl:grid-cols-6',
            'items'      => [
                [
                    'text'  => '<span class="text-red-500 font-black">Accident</span>',
                    'emoji' => '🚗',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide8/accident.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-6/img/slide8/accident.webp'),
                ],
                [
                    'text'  => '<span class="text-red-500 font-black">Fire</span>',
                    'emoji' => '🔥',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide8/fire.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-6/img/slide8/fire.webp'),
                ],
                [
                    'text'  => '<span class="text-red-500 font-black">Break-in</span>',
                    'emoji' => '🔓',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide8/break-in.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-6/img/slide8/break-in.webp'),
                ],
                [
                    'text'  => '<span class="text-red-500 font-black">Theft</span>',
                    'emoji' => '🧾',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide8/theft.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-6/img/slide8/theft.webp'),
                ],
                [
                    'text'  => '<span class="text-red-500 font-black">Unconscious</span>',
                    'emoji' => '😵',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide8/unconscious.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-6/img/slide7/unconscious.webp'),
                ],
                [
                    'text'  => '<span class="text-red-500 font-black">Choking</span>',
                    'emoji' => '🫁',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide8/choking.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-6/img/slide8/choking.webp'),
                ],
            ],
        ],
        [
            'key'        => 'actions',
            'title'      => '📞 Actions',
            'grid_class' => 'grid-cols-2 sm:grid-cols-5 ',
            'items'      => [
                [
                    'text'  => '<span class="text-red-500 font-black">Call</span>',
                    'emoji' => '📞',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide8/call.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-6/img/slide8/call.webp'),
                ],
                [
                    'text'  => '<span class="text-red-500 font-black">Report</span>',
                    'emoji' => '📝',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide8/report.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-6/img/slide8/report.webp'),
                ],
                [
                    'text'  => '<span class="text-red-500 font-black">Help</span>',
                    'emoji' => '🤝',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide8/help.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-6/img/slide8/help.webp'),
                ],
                [
                    'text'  => '<span class="text-red-500 font-black">Hurt</span>',
                    'emoji' => '💥',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide8/hurt.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-6/img/slide8/hurt.webp'),
                ],
                [
                    'text'  => '<span class="text-red-500 font-black">Injured</span>',
                    'emoji' => '🤕',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide8/injured.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-6/img/slide7/injured.webp'),
                ],
            ],
        ],
        [
            'key'        => 'services',
            'title'      => '🚑 Services',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4 ',
            'items'      => [
                [
                    'text'  => '<span class="text-red-500 font-black">Police</span>',
                    'emoji' => '👮‍♂️',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide8/police.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-6/img/slide8/police.webp'),
                ],
                [
                    'text'  => '<span class="text-red-500 font-black">Ambulance</span>',
                    'emoji' => '🚑',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide8/ambulance.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-6/img/slide7/ambulance.webp'),
                ],
                [
                    'text'  => '<span class="text-red-500 font-black">Paramedic</span>',
                    'emoji' => '🧑‍⚕️',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide8/paramedic.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-6/img/slide7/paramedic.webp'),
                ],
                [
                    'text'  => '<span class="text-red-500 font-black">Fire Brigade</span>',
                    'emoji' => '🚒',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide8/fire-brigade.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-6/img/slide8/fire-brigade.webp'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])