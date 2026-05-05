<?php
$content = [
    'type'       => 'image',
    'page_title' => 'Warm-up:  Practice 1',
    'title'      => 'Warm-up:  Practice 1',
    'subtitle'   => 'Let’s remember some of the jobs we’ve learnt before!',

    'enable_image_zoom'      => false,
    'game_card_width'        => 'max-w-6xl',
    'image_panel_col_class'  => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_scale'            => 0.72,

    'questions' => [
        [
            'image'   => materialAsset('slider/A2/Advanced/chapter-1/img/slide3/singer.webp'),
            'prompt'  => 'What does he do?',
            'correct' => ["He's a singer"],
            'options' => [
                "He's a singer",
                "He's a firefighter",
                "He's a police officer",
                "He's a doctor",
            ],
        ],
        [
            'image'   => materialAsset('slider/A2/Advanced/chapter-1/img/slide3/teacher.webp'),
            'prompt'  => 'Who works at school?',
            'correct' => ['A teacher'],
            'options' => [
                'A teacher',
                'A dentist',
                'A vet',
                'A tailor',
            ],
        ],
        [
            'image'   => materialAsset('slider/A2/Advanced/chapter-1/img/slide3/store2.webp'),
            'prompt'  => 'Where does he work?',
            'correct' => ['In a store'],
            'options' => [
                'In a store',
                'In an office',
                'In a hospital',
                'In a hotel',
            ],
        ],
        [
            'image'   => materialAsset('slider/A2/Advanced/chapter-1/img/slide3/cook.webp'),
            'prompt'  => 'Who can prepare delicious meals?',
            'correct' => ['A cook'],
            'options' => [
                'A vet',
                'A farmer',
                'A hairdresser',
                'A cook',
            ],
        ],
        [
            'image'   => materialAsset('slider/A2/Advanced/chapter-1/img/slide3/baker.webp'),
            'prompt'  => 'What does she do?',
            'correct' => ["She's a baker"],
            'options' => [
                "She's a baker",
                "She's a hairdresser",
                "She's a waitress",
                "She's a cashier",
            ],
        ],
        [
            'image'   => materialAsset('slider/A2/Advanced/chapter-1/img/slide3/tailor.webp'),
            'prompt'  => 'What does he do?',
            'correct' => ["He's a tailor"],
            'options' => [
                "He's a tailor",
                "He's a bellhop",
                "He's a janitor",
                "He's a judge",
            ],
        ],
        [
            'image'   => materialAsset('slider/A2/Advanced/chapter-1/img/slide3/plumber.webp'),
            'prompt'  => 'What does he do?',
            'correct' => ["He's a plumber"],
            'options' => [
                "He's a plumber",
                "He's a manager",
                "He's a lawyer",
                "He's a waiter",
            ],
        ],
        [
            'image'   => materialAsset('slider/A2/Advanced/chapter-1/img/slide3/veterinarian.webp'),
            'prompt'  => 'Who can examine animals?',
            'correct' => ['A vet'],
            'options' => [
                'A mechanic',
                'A vet',
                'An actor',
                'An accountant',
            ],
        ],
        [
            'image'   => materialAsset('slider/A2/Advanced/chapter-1/img/slide3/mechanic.webp'),
            'prompt'  => 'Who can repair cars?',
            'correct' => ['A mechanic'],
            'options' => [
                'A mechanic',
                'An architect',
                'An engineer',
                'A lawyer',
            ],
        ],
        [
            'image'   => materialAsset('slider/A2/Advanced/chapter-1/img/slide3/doctor.webp'),
            'prompt'  => 'Who can examine patients?',
            'correct' => ['A doctor'],
            'options' => [
                'A waiter',
                'A doctor',
                'A lawyer',
                'A plumber',
            ],
        ],
        [
            'image'   => materialAsset('slider/A2/Advanced/chapter-1/img/slide3/salesperson.webp'),
            'prompt'  => 'Who works in a store?',
            'correct' => ['Salesperson'],
            'options' => [
                'Firefighter',
                'Salesperson',
                'Doctor',
                'Nurse',
            ],
        ],
        [
            'image'   => materialAsset('slider/A2/Advanced/chapter-1/img/slide3/store.webp'),
            'prompt'  => 'Where do they work?',
            'correct' => ['In a store'],
            'options' => [
                'In a store',
                'In an office',
                'In a hospital',
                'In a hotel',
            ],
        ],
        [
            'image'   => materialAsset('slider/A2/Advanced/chapter-1/img/slide3/assemblers.webp'),
            'prompt'  => 'What do they do?',
            'correct' => ["They're assemblers"],
            'options' => [
                "They're assemblers",
                "They're lawyers",
                "They're front desk clerks",
                "They're tailors",
            ],
        ],
        [
            'image'   => materialAsset('slider/A2/Advanced/chapter-1/img/slide3/bellhop.webp'),
            'prompt'  => 'Who work in a hotel?',
            'correct' => ['Bellhop'],
            'options' => [
                'Postal worker',
                'Tailor',
                'Foreman',
                'Bellhop',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])