<?php
$content = [

    'type' => 'image',
    'page_title' => "First, Let's do this warm-up activity",
    'title' => "First, Let's do this warm-up activity",
    'subtitle' => 'Practice 1',
    'question_prompt_label' => 'Pick the correct body part:',
    'enable_image_zoom' => false,
    'image_plain' => true,
    'image_scale' => 0.56,
    'image_extra_scale' => 1.18,
    'image_radius' => 'rounded-[28px]',
    'image_panel_col_class' => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_panel_inner_class' => 'h-full p-5 sm:p-6',
    'game_card_width' => 'max-w-5xl',
    'options_grid_class' => 'mt-5 grid grid-cols-2 gap-3 sm:grid-cols-2',
    'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/body-parts/foot.webp'),

    'questions' => [
        [
            'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/body-parts/foot.webp'),
            'prompt' => 'Which body part is this?',
            'correct' => 'foot',
            'options' => ['foot', 'leg', 'toe', 'ankle', 'hand', 'arm'],
        ],
        [
            'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/body-parts/teeth.webp'),
            'prompt' => 'Which body part is this?',
            'correct' => 'teeth',
            'options' => ['teeth', 'nose', 'ear', 'eyes', 'head', 'throat'],
        ],
        [
            'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/body-parts/shoulder.webp'),
            'prompt' => 'Which body part is this?',
            'correct' => 'shoulder',
            'options' => ['shoulder', 'arm', 'wrist', 'back', 'hand', 'head'],
        ],
        [
            'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/body-parts/arm.webp'),
            'prompt' => 'Which body part is this?',
            'correct' => 'arm',
            'options' => ['arm', 'hand', 'wrist', 'shoulder', 'leg', 'back'],
        ],
        [
            'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/body-parts/throat.webp'),
            'prompt' => 'Which body part is this?',
            'correct' => 'throat',
            'options' => ['throat', 'nose', 'ear', 'teeth', 'head', 'stomach'],
        ],
        [
            'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/body-parts/eyes.webp'),
            'prompt' => 'Which body part is this?',
            'correct' => 'eyes',
            'options' => ['eyes', 'ear', 'nose', 'teeth', 'head', 'throat'],
        ],
        [
            'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/body-parts/leg.webp'),
            'prompt' => 'Which body part is this?',
            'correct' => 'leg',
            'options' => ['leg', 'foot', 'ankle', 'toe', 'arm', 'back'],
        ],
        [
            'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/body-parts/stomach.webp'),
            'prompt' => 'Which body part is this?',
            'correct' => 'stomach',
            'options' => ['stomach', 'back', 'throat', 'head', 'leg', 'arm'],
        ],
        [
            'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/body-parts/head.webp'),
            'prompt' => 'Which body part is this?',
            'correct' => 'head',
            'options' => ['head', 'eyes', 'nose', 'ear', 'throat', 'back'],
        ],
        [
            'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/body-parts/ear.webp'),
            'prompt' => 'Which body part is this?',
            'correct' => 'ear',
            'options' => ['ear', 'eyes', 'nose', 'teeth', 'head', 'throat'],
        ],
        [
            'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/body-parts/nose.webp'),
            'prompt' => 'Which body part is this?',
            'correct' => 'nose',
            'options' => ['nose', 'ear', 'eyes', 'teeth', 'head', 'throat'],
        ],
        [
            'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/body-parts/back.webp'),
            'prompt' => 'Which body part is this?',
            'correct' => 'back',
            'options' => ['back', 'shoulder', 'stomach', 'head', 'leg', 'arm'],
        ],
        [
            'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/body-parts/ankle.webp'),
            'prompt' => 'Which body part is this?',
            'correct' => 'ankle',
            'options' => ['ankle', 'foot', 'toe', 'leg', 'wrist', 'hand'],
        ],
        [
            'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/body-parts/wrist.webp'),
            'prompt' => 'Which body part is this?',
            'correct' => 'wrist',
            'options' => ['wrist', 'hand', 'arm', 'finger', 'ankle', 'shoulder'],
        ],
        [
            'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/body-parts/finger.webp'),
            'prompt' => 'Which body part is this?',
            'correct' => 'finger',
            'options' => ['finger', 'hand', 'wrist', 'toe', 'arm', 'foot'],
        ],
        [
            'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/body-parts/hand.webp'),
            'prompt' => 'Which body part is this?',
            'correct' => 'hand',
            'options' => ['hand', 'finger', 'wrist', 'arm', 'foot', 'toe'],
        ],
        [
            'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/body-parts/toe.webp'),
            'prompt' => 'Which body part is this?',
            'correct' => 'toe',
            'options' => ['toe', 'foot', 'ankle', 'finger', 'hand', 'leg'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
