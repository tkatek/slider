<?php

$content = [

    'type'       => 'image',
    'page_title' => 'Practice 3',
    'title'      => 'Practice 3',
    'subtitle'   => 'Now read & choose the right answer.',

    'enable_image_zoom' => false,
    'game_card_width' => 'max-w-5xl',
    'image_panel_col_class' => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_scale' => 0.6,

    'questions' => [
        [
            'image'   => materialAsset('slider/B1/Intermediate/chapter-6/img/slide7/billboard.webp'),
            'prompt'  => 'The new billboard was designed to .......... from people on the busy street.',
            'correct' => 'attract attention',
            'options' => ['promote a product', 'attract attention', 'target children', 'raise ethical concerns'],
        ],
        [
            'image'   => materialAsset('slider/B1/Intermediate/chapter-6/img/slide7/advertisement.webp'),
            'prompt'  => 'Social media ads can greatly .......... a larger audience than traditional ads.',
            'correct' => 'reach',
            'options' => ['reach', 'be', 'use', 'make'],
        ],
        [
            'image'   => materialAsset('slider/B1/Intermediate/chapter-6/img/slide7/audience.webp'),
            'prompt'  => 'Good advertising can .......... the way people think and what they buy.',
            'correct' => 'influence buying decisions',
            'options' => ['influence buying decisions', 'make informed decisions', 'be easily influenced', 'use emotional appeal'],
        ],
        [
            'image'   => materialAsset('slider/B1/Intermediate/chapter-6/img/slide7/consumer.webp'),
            'prompt'  => 'Companies spend a lot of money to .......... their latest products.',
            'correct' => 'promote a product',
            'options' => ['raise ethical concerns', 'promote a product', 'target children', 'make products memorable'],
        ],
        [
            'image'   => materialAsset('slider/B1/Intermediate/chapter-6/img/slide7/emotional-appeal.webp'),
            'prompt'  => 'Advertisements often try to .......... by showing happy families or exciting lifestyles.',
            'correct' => 'use emotional appeal',
            'options' => ['persuade customers', 'use emotional appeal', 'reach a larger audience', 'make a larger audience'],
        ],
        [
            'image'   => materialAsset('slider/B1/Intermediate/chapter-6/img/slide7/celebrity-endorsement.webp'),
            'prompt'  => "A famous actor's .......... can make people trust and buy a product.",
            'correct' => 'celebrity endorsement',
            'options' => ['celebrity endorsement', 'honest and transparent advertising', 'powerful tool', 'ethical concerns'],
        ],
        [
            'image'   => materialAsset('slider/B1/Intermediate/chapter-6/img/slide7/repetition.webp'),
            'prompt'  => 'Creative ads help .......... so that people remember them for a long time.',
            'correct' => 'make products memorable',
            'options' => ['promote a product', 'make products memorable', 'be easily influenced'],
        ],
        [
            'image'   => materialAsset('slider/B1/Intermediate/chapter-6/img/slide7/misleading.webp'),
            'prompt'  => 'Some ads .......... because they may be misleading or unfair.',
            'correct' => 'raise ethical concerns',
            'options' => ['raise ethical concerns', 'attract attention', 'reach a larger audience', 'influence buying decisions'],
        ],
    ],
];

?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])