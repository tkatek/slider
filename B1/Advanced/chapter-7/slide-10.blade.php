<?php

$content = [
    'type'     => 'image',
    'title'    => 'Practice 4',
    'subtitle' => 'Choose the correct answer',

    'enable_image_zoom'      => false,
    'game_card_width'        => 'max-w-5xl',
    'image_panel_col_class'  => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_scale'            => 0.6,

    'questions' => [
        [
            'image' => materialAsset(
                'slider/B1/Advanced/chapter-7/img/slide6/barber.webp'
            ),
            'prompt' => 'Ahmed wants someone to cut his beard before his wedding. He goes to a shop where a man cuts hair and beards. Who helps him?',
            'correct' => 'A barber',
            'options' => [
                'A driver',
                'A chef',
                'A barber',
                'A tailor',
            ],
        ],
        [
            'image' => materialAsset(
                'slider/B1/Advanced/chapter-7/img/slide6/tailor.webp'
            ),
            'prompt' => 'Sarah bought a beautiful dress, but it is too long. She takes it to someone who can make it fit perfectly. Who does she visit?',
            'correct' => 'A tailor',
            'options' => [
                'A butler',
                'A chef',
                'A tailor',
                'A driver',
            ],
        ],
        [
            'image' => materialAsset(
                'slider/B1/Advanced/chapter-7/img/slide6/chef.webp'
            ),
            'prompt' => 'Omar does not like cooking because he is very busy. Every evening, a professional prepares delicious meals for him. What is this person’s job?',
            'correct' => 'Chef',
            'options' => [
                'Barber',
                'Driver',
                'Chef',
                'Butler',
            ],
        ],
        [
            'image' => materialAsset(
                'slider/B1/Advanced/chapter-7/img/slide6/repaint.webp'
            ),
            'prompt' => 'After buying a very old house, Mr. Ali decided to paint it again with a new color. What did he do?',
            'correct' => 'Repainted it',
            'options' => [
                'Trimmed it',
                'Drove it',
                'Repainted it',
                'Tailored it',
            ],
        ],
        [
            'image' => materialAsset(
                'slider/B1/Advanced/chapter-7/img/slide6/butler.webp'
            ),
            'prompt' => 'During a heavy rainstorm, the famous singer’s assistant walked beside her and carried her umbrella everywhere. The assistant was acting like a...',
            'correct' => 'Butler',
            'options' => [
                'Driver',
                'Barber',
                'Butler',
                'Tailor',
            ],
        ],
        [
            'image' => materialAsset(
                'slider/B1/Advanced/chapter-7/img/slide6/mansion.webp'
            ),
            'prompt' => 'Mona became a successful movie star. She bought a huge, luxurious house with ten bedrooms and a swimming pool. She now lives in a...',
            'correct' => 'Mansion',
            'options' => [
                'Apartment',
                'Office',
                'Mansion',
                'Limousine',
            ],
        ],
    ],
];

?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])