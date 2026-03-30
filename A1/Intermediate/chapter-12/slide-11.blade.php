<?php

$content = [
    'type'          => 'image',
    'page_title'    => 'Practice 4',
    'title'         => 'Practice 4',
    'subtitle'      => 'Practice 4',
    'question_prompt_label' => 'Pick the correct phrase:',
    'enable_image_zoom' => false,
    'image_plain'       => true,
    'image_scale'       => 0.56,
    'image_extra_scale' => 1.18,
    'image_radius'      => 'rounded-[28px]',
    'image_panel_col_class'   => 'sm:col-span-6',
    'answer_panel_col_class'  => 'sm:col-span-6',
    'image_panel_inner_class' => 'h-full p-5 sm:p-6',
    'game_card_width' => 'max-w-5xl',

    'tiles_grid_class'   => 'grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-2',
    'tile_min_w_desktop' => 400,
    'tiles_gap_class'    => 'gap-2 sm:gap-3 lg:gap-3',
    'tiny_cols'          => 2,

    'game_type'   => 'quiz',
    'prompt_alt'  => 'On the plane vocabulary',
    'win_title'   => 'Great job!',
    'win_message' => 'You finished all questions.',

    'sfx' => [
        'enabled' => true,
        'sources' => [
            'correct' => materialAsset('slider/sounds/correct.wav'),
            'wrong'   => materialAsset('slider/sounds/wrong.wav'),
            'success' => materialAsset('slider/sounds/success.wav'),
        ],
        'volume' => [
            'correct' => 1,
            'wrong'   => 1,
            'success' => 1,
        ],
    ],

    'optionsBank' => [
        ['key' => 'departure-lounge', 'word' => 'Departure lounge'],
        ['key' => 'get-on-board', 'word' => 'To get on board'],
        ['key' => 'aisle-seat', 'word' => 'Aisle (seat)'],
        ['key' => 'hand-luggage', 'word' => 'Hand luggage'],
        ['key' => 'overhead-compartment', 'word' => 'Overhead compartment'],
        ['key' => 'tray-table', 'word' => 'Tray table'],
        ['key' => 'oxygen-mask', 'word' => 'Oxygen mask'],
        ['key' => 'trolley', 'word' => 'Trolley'],
        ['key' => 'life-jacket', 'word' => 'Life jacket'],
        ['key' => 'turbulence', 'word' => 'Turbulence'],
        ['key' => 'fasten-your-seatbelt', 'word' => 'Fasten your seatbelt'],
        ['key' => 'window-seat', 'word' => 'Window seat'],
        ['key' => 'escalator', 'word' => 'Escalator'],
        ['key' => 'take-off', 'word' => 'Take off'],
        ['key' => 'land', 'word' => 'Land'],
        ['key' => 'baggage-claim-reclaim', 'word' => 'Baggage claim / reclaim'],
    ],

    'questions' => [
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/departure-lounge.webp'),
            'answer'  => 'departure-lounge',
            'options' => ['departure-lounge', 'get-on-board', 'tray-table'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/get-on-board.webp'),
            'answer'  => 'get-on-board',
            'options' => ['get-on-board', 'aisle-seat', 'oxygen-mask'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/aisle-seat.webp'),
            'answer'  => 'aisle-seat',
            'options' => ['aisle-seat', 'hand-luggage', 'trolley'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/hand-luggage.webp'),
            'answer'  => 'hand-luggage',
            'options' => ['hand-luggage', 'overhead-compartment', 'life-jacket'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/overhead-bin.webp'),
            'answer'  => 'overhead-compartment',
            'options' => ['overhead-compartment', 'tray-table', 'turbulence'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/tray-table.webp'),
            'answer'  => 'tray-table',
            'options' => ['tray-table', 'oxygen-mask', 'fasten-your-seatbelt'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/oxygen-mask.webp'),
            'answer'  => 'oxygen-mask',
            'options' => ['oxygen-mask', 'trolley', 'window-seat'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/trolley.webp'),
            'answer'  => 'trolley',
            'options' => ['trolley', 'life-jacket', 'escalator'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/life-jacket.webp'),
            'answer'  => 'life-jacket',
            'options' => ['life-jacket', 'turbulence', 'take-off'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/turbulence.webp'),
            'answer'  => 'turbulence',
            'options' => ['turbulence', 'fasten-your-seatbelt', 'land'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/fasten-your-seatbelt.webp'),
            'answer'  => 'fasten-your-seatbelt',
            'options' => ['fasten-your-seatbelt', 'window-seat', 'baggage-claim-reclaim'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/passenger.webp'),
            'answer'  => 'window-seat',
            'options' => ['window-seat', 'escalator', 'departure-lounge'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/escalator.webp'),
            'answer'  => 'escalator',
            'options' => ['escalator', 'take-off', 'get-on-board'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/take-off.webp'),
            'answer'  => 'take-off',
            'options' => ['take-off', 'land', 'aisle-seat'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/land.webp'),
            'answer'  => 'land',
            'options' => ['land', 'baggage-claim-reclaim', 'hand-luggage'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/baggage-claim-reclaim.webp'),
            'answer'  => 'baggage-claim-reclaim',
            'options' => ['baggage-claim-reclaim', 'departure-lounge', 'overhead-compartment'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
