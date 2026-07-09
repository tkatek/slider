<?php

$content = [
    'type'       => 'image',
    'title'      => 'Warm up: Practice 1',
    'subtitle'   => 'Choose the correct answer',

    'enable_image_zoom' => false,
    'game_card_width' => 'max-w-5xl',
    'image_panel_col_class' => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_scale' => 0.6,

    'questions' => [
        [
            'image'   => materialAsset('slider/B1/Advanced/chapter-1/img/slide4/ant.webp'),
            'prompt'  => 'It has got 4 legs, so it . . . . . . be a spider.',
            'correct' => "can't",
            'options' => ['may not', "can't", 'might not'],
        ],
        [
            'image'   => materialAsset('slider/B1/Advanced/chapter-1/img/slide4/night.webp'),
            'prompt'  => "It's nearly midnight. He . . . . . . be at work now, can he?",
            'correct' => "can't",
            'options' => ['may not', 'might', "can't"],
        ],
        [
            'image'   => materialAsset('slider/B1/Advanced/chapter-1/img/slide4/british.webp'),
            'prompt'  => 'They . . . . . . be British. Can you notice the strong "t" in their pronunciation?',
            'correct' => 'must',
            'options' => ['may', 'must', 'might'],
        ],
        [
            'image'   => materialAsset('slider/B1/Advanced/chapter-1/img/slide4/lost-man.webp'),
            'prompt'  => 'Why is that man looking around like that? He . . . . . . be lost.',
            'correct' => 'may',
            'options' => ['may', 'may not', "can\'t"],
        ],
        [
            'image'   => materialAsset('slider/B1/Advanced/chapter-1/img/slide4/studying.webp'),
            'prompt'  => 'James always does really well on exams. He . . . . . . study a lot.',
            'correct' => 'must',
            'options' => ['might', "can't", 'must'],
        ],
        [
            'image'   => materialAsset('slider/B1/Advanced/chapter-1/img/slide4/meeting.webp'),
            'prompt'  => 'She left home earlier than always. She . . . . . . be having a meeting.',
            'correct' => 'might',
            'options' => ["can't", 'might not', 'might'],
        ],
        [
            'image'   => materialAsset('slider/B1/Advanced/chapter-1/img/slide4/exhausted-meeting.webp'),
            'prompt'  => 'The meeting is taking too long. Sasha looks exhausted and Mark is visually worried. This . . . . . . be any good.',
            'correct' => "can't",
            'options' => ["can't", "mustn't", 'must'],
        ],
        [
            'image'   => materialAsset('slider/B1/Advanced/chapter-1/img/slide4/french.webp'),
            'prompt'  => 'They are French, so they . . . . . . speak English.',
            'correct' => 'might not',
            'options' => ['might not', 'may', 'must'],
        ],
        [
            'image'   => materialAsset('slider/B1/Advanced/chapter-1/img/slide4/passport.webp'),
            'prompt'  => 'Her passport is full of visa stamps, she . . . . . . travel a lot.',
            'correct' => 'must',
            'options' => ['must', "can't", 'might'],
        ],
        [
            'image'   => materialAsset('slider/B1/Advanced/chapter-1/img/slide4/phone-call.webp'),
            'prompt'  => 'He is not picking up, he . . . . . . be busy.',
            'correct' => 'might',
            'options' => ['might', 'must', "can't"],
        ],
    ],
];

?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])