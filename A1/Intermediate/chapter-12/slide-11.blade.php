<?php
$content = [
    'type'       => 'image',
    'page_title' => 'Practice 4',
    'title'      => 'Practice 4',
    'subtitle'   => 'Choose the correct answer',

    'enable_image_zoom'     => false,
    'game_card_width'       => 'max-w-5xl',
    'image_panel_col_class' => 'sm:col-span-6',
    'answer_panel_col_class'=> 'sm:col-span-6',
    'image_scale'           => 0.56,

    'questions' => [
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/departure-lounge.webp'),
            'prompt'  => 'Which word matches the image?',
            'correct' => 'departure-lounge',
            'options' => [
                'departure-lounge',
                'get-on-board',
                'tray-table',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/get-on-board.webp'),
            'prompt'  => 'Which word matches the image?',
            'correct' => 'get-on-board',
            'options' => [
                'get-on-board',
                'aisle-seat',
                'oxygen-mask',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/aisle-seat.webp'),
            'prompt'  => 'Which word matches the image?',
            'correct' => 'aisle-seat',
            'options' => [
                'aisle-seat',
                'hand-luggage',
                'trolley',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/hand-luggage.webp'),
            'prompt'  => 'Which word matches the image?',
            'correct' => 'hand-luggage',
            'options' => [
                'hand-luggage',
                'overhead-compartment',
                'life-jacket',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/overhead-bin.webp'),
            'prompt'  => 'Which word matches the image?',
            'correct' => 'overhead-compartment',
            'options' => [
                'overhead-compartment',
                'tray-table',
                'turbulence',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/tray-table.webp'),
            'prompt'  => 'Which word matches the image?',
            'correct' => 'tray-table',
            'options' => [
                'tray-table',
                'oxygen-mask',
                'fasten-your-seatbelt',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/oxygen-mask.webp'),
            'prompt'  => 'Which word matches the image?',
            'correct' => 'oxygen-mask',
            'options' => [
                'oxygen-mask',
                'trolley',
                'window-seat',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/trolley.webp'),
            'prompt'  => 'Which word matches the image?',
            'correct' => 'trolley',
            'options' => [
                'trolley',
                'life-jacket',
                'escalator',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/life-jacket.webp'),
            'prompt'  => 'Which word matches the image?',
            'correct' => 'life-jacket',
            'options' => [
                'life-jacket',
                'turbulence',
                'take-off',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/turbulence.webp'),
            'prompt'  => 'Which word matches the image?',
            'correct' => 'turbulence',
            'options' => [
                'turbulence',
                'fasten-your-seatbelt',
                'land',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/fasten-your-seatbelt.webp'),
            'prompt'  => 'Which word matches the image?',
            'correct' => 'fasten-your-seatbelt',
            'options' => [
                'fasten-your-seatbelt',
                'window-seat',
                'baggage-claim-reclaim',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/passenger.webp'),
            'prompt'  => 'Which word matches the image?',
            'correct' => 'window-seat',
            'options' => [
                'window-seat',
                'escalator',
                'departure-lounge',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/escalator.webp'),
            'prompt'  => 'Which word matches the image?',
            'correct' => 'escalator',
            'options' => [
                'escalator',
                'take-off',
                'get-on-board',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/take-off.webp'),
            'prompt'  => 'Which word matches the image?',
            'correct' => 'take-off',
            'options' => [
                'take-off',
                'land',
                'aisle-seat',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/land.webp'),
            'prompt'  => 'Which word matches the image?',
            'correct' => 'land',
            'options' => [
                'land',
                'baggage-claim-reclaim',
                'hand-luggage',
            ],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/baggage-claim-reclaim.webp'),
            'prompt'  => 'Which word matches the image?',
            'correct' => 'baggage-claim-reclaim',
            'options' => [
                'baggage-claim-reclaim',
                'departure-lounge',
                'overhead-compartment',
            ],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])