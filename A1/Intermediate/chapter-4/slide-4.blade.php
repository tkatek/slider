<?php
$content = [
    'type'          => 'image',
    'page_title'    => 'First, Let’s do this warm-up activity',
    'title'         => 'First, Let’s do this warm-up activity',
    'subtitle'      => 'Practice 1',
    'question_prompt_label' => 'Pick the correct body part:',
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

    'tiny_cols'   => 2,
    'game_type'   => 'quiz',
    'prompt_alt'  => 'Body part',
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
        ['key' => 'foot', 'word' => 'foot'],
        ['key' => 'teeth', 'word' => 'teeth'],
        ['key' => 'shoulder', 'word' => 'shoulder'],
        ['key' => 'arm', 'word' => 'arm'],
        ['key' => 'throat', 'word' => 'throat'],
        ['key' => 'eyes', 'word' => 'eyes'],
        ['key' => 'leg', 'word' => 'leg'],
        ['key' => 'stomach', 'word' => 'stomach'],
        ['key' => 'head', 'word' => 'head'],
        ['key' => 'ear', 'word' => 'ear'],
        ['key' => 'nose', 'word' => 'nose'],
        ['key' => 'back', 'word' => 'back'],
        ['key' => 'ankle', 'word' => 'ankle'],
        ['key' => 'wrist', 'word' => 'wrist'],
        ['key' => 'finger', 'word' => 'finger'],
        ['key' => 'hand', 'word' => 'hand'],
        ['key' => 'toe', 'word' => 'toe'],
    ],

    'questions' => [
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-4/img/body-parts/foot.webp'),
            'answer'  => 'foot',
            'options' => ['foot', 'leg', 'toe', 'ankle', 'hand', 'arm'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-4/img/body-parts/teeth.webp'),
            'answer'  => 'teeth',
            'options' => ['teeth', 'nose', 'ear', 'eyes', 'head', 'throat'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-4/img/body-parts/shoulder.webp'),
            'answer'  => 'shoulder',
            'options' => ['shoulder', 'arm', 'wrist', 'back', 'hand', 'head'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-4/img/body-parts/arm.webp'),
            'answer'  => 'arm',
            'options' => ['arm', 'hand', 'wrist', 'shoulder', 'leg', 'back'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-4/img/body-parts/throat.webp'),
            'answer'  => 'throat',
            'options' => ['throat', 'nose', 'ear', 'teeth', 'head', 'stomach'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-4/img/body-parts/eyes.webp'),
            'answer'  => 'eyes',
            'options' => ['eyes', 'ear', 'nose', 'teeth', 'head', 'throat'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-4/img/body-parts/leg.webp'),
            'answer'  => 'leg',
            'options' => ['leg', 'foot', 'ankle', 'toe', 'arm', 'back'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-4/img/body-parts/stomach.webp'),
            'answer'  => 'stomach',
            'options' => ['stomach', 'back', 'throat', 'head', 'leg', 'arm'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-4/img/body-parts/head.webp'),
            'answer'  => 'head',
            'options' => ['head', 'eyes', 'nose', 'ear', 'throat', 'back'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-4/img/body-parts/ear.webp'),
            'answer'  => 'ear',
            'options' => ['ear', 'eyes', 'nose', 'teeth', 'head', 'throat'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-4/img/body-parts/nose.webp'),
            'answer'  => 'nose',
            'options' => ['nose', 'ear', 'eyes', 'teeth', 'head', 'throat'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-4/img/body-parts/back.webp'),
            'answer'  => 'back',
            'options' => ['back', 'shoulder', 'stomach', 'head', 'leg', 'arm'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-4/img/body-parts/ankle.webp'),
            'answer'  => 'ankle',
            'options' => ['ankle', 'foot', 'toe', 'leg', 'wrist', 'hand'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-4/img/body-parts/wrist.webp'),
            'answer'  => 'wrist',
            'options' => ['wrist', 'hand', 'arm', 'finger', 'ankle', 'shoulder'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-4/img/body-parts/finger.webp'),
            'answer'  => 'finger',
            'options' => ['finger', 'hand', 'wrist', 'toe', 'arm', 'foot'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-4/img/body-parts/hand.webp'),
            'answer'  => 'hand',
            'options' => ['hand', 'finger', 'wrist', 'arm', 'foot', 'toe'],
        ],
        [
            'image'   => materialAsset('slider/A1/Intermediate/chapter-4/img/body-parts/toe.webp'),
            'answer'  => 'toe',
            'options' => ['toe', 'foot', 'ankle', 'finger', 'hand', 'leg'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])