<?php

$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => 'Common Symptoms',

    'groups' => [
        [
            'key'        => 'questions',
            'title'      => '',
            'grid_class' => 'grid-cols-1 sm:grid-cols-3 ',
            'items'      => [
                [
                    'text'  => 'How are you feeling',
                    'emoji' => '💬',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/symptoms/how-feeling.mp3'),
                ],
                [
                    'text'  => 'What’s the matter?',
                    'emoji' => '💬',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/symptoms/what-matter.mp3'),
                ],
                [
                    'text'  => 'What’s the problem?',
                    'emoji' => '💬',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/symptoms/what-problem.mp3'),
                ],
            ],
        ],
        [
            'key'        => 'symptoms',
            'title'      => '',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4 xl:grid-cols-6',
            'items'      => [
                [
                    'text'  => 'I have <span class="text-red-500 font-black">a fever / a temperature</span>.',
                    'emoji' => '🤒',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/symptoms/i-have-a-fever.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/slide7/fever.webp'),
                ],
                [
                    'text'  => 'I have <span class="text-red-500 font-black">a cold</span>.',
                    'emoji' => '🤧',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/symptoms/i-have-a-cold.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/slide7/cold.webp'),
                ],
                [
                    'text'  => 'I have <span class="text-red-500 font-black">a cough</span>.',
                    'emoji' => '😷',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/symptoms/i-have-a-cough.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/slide7/cough.webp'),
                ],
                [
                    'text'  => 'I have <span class="text-red-500 font-black">a headache</span>.',
                    'emoji' => '🤕',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/symptoms/i-have-a-headache.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/slide7/headache.webp'),
                ],
                [
                    'text'  => 'I have the flu.',
                    'emoji' => '🛌',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/symptoms/i-have-the-flu.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/slide7/flu.webp'),
                ],
                [
                    'text'  => 'I have <span class="text-red-500 font-black">a backache</span>.',
                    'emoji' => '🧍',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/symptoms/i-have-a-backache.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/slide7/backache.webp'),
                ],
                [
                    'text'  => 'I have <span class="text-red-500 font-black">a stomach ache</span> / an <span class="text-red-500 font-black">upset stomach</span>.',
                    'emoji' => '🤢',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/symptoms/i-have-a-stomach.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/slide7/stomach.webp'),
                ],
                [
                    'text'  => 'I have <span class="text-red-500 font-black">a sore throat</span>.',
                    'emoji' => '🗣️',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/symptoms/i-have-a-sore-throat.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/slide7/sore-throat.webp'),
                ],
                [
                    'text'  => 'I have an <span class="text-red-500 font-black">earache</span>.',
                    'emoji' => '👂',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/symptoms/i-have-an-earache.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/slide7/earache.webp'),
                ],
                [
                    'text'  => 'I have a <span class="text-red-500 font-black">broken arm</span>.',
                    'emoji' => '🦴',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/symptoms/i-have-a-broken-arm.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/slide7/broken-arm.webp'),
                ],
                [
                    'text'  => 'I have a <span class="text-red-500 font-black">cut</span>.',
                    'emoji' => '🩹',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/symptoms/i-have-a-cut.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/slide7/cut.webp'),
                ],
                [
                    'text'  => 'I have an <span class="text-red-500 font-black">allergy</span>.',
                    'emoji' => '🌿',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/symptoms/i-have-an-allergy.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/slide7/allergy.webp'),
                ],
            ],
        ],
        [
            'key'        => 'injury-actions',
            'title'      => '',
            'grid_class' => 'grid-cols-2 sm:grid-cols-5 lg:grid-cols-5',
            'items'      => [
                [
                    'text'  => 'I <span class="text-red-500 font-black">broke</span> my arm',
                    'emoji' => '🦴',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/slide5/i-broke-my-arm.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/slide7/broke-arm.webp'),
                ],
                [
                    'text'  => 'I <span class="text-red-500 font-black">sprained</span> my ankle',
                    'emoji' => '🦶',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/slide5/i-sprained-my-ankle.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/slide7/sprained-ankle.webp'),
                ],
                [
                    'text'  => 'I <span class="text-red-500 font-black">cut</span> my finger',
                    'emoji' => '☝️',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/slide5/i-cut-my-finger.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/slide7/cut-finger.webp'),
                ],
                [
                    'text'  => 'I <span class="text-red-500 font-black">hurt</span> my back',
                    'emoji' => '🧍',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/slide5/i-hurt-my-back.mp3'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/slide7/hurt-back.webp'),
                ],
                [
                    'text'  => 'I <span class="text-red-500 font-black">feel</span> terrible',
                    'emoji' => '😖',
                    'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/slide5/i-feel-terrible.mpeg'),
                    'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/slide7/feel-terrible.webp'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])