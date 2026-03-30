<?php
$content = [
    'title'         => 'Practice 5',
    'subtitle'      => "Listening 1",
    'type'          => 'audio',
    'option_type'   => 'image',
    'audio'         => materialAsset("slider/A1/Intermediate/chapter-12/audios/slide12.mp3"),
    'script'        => [
        '1',
        'A: Could you tell me where departure gate 5 is, please?',
        'B: Yes, just take the escalator up to the next level and turn right. All the gates are upstairs.',
        'A: Thanks.',
        '2',
        'A: Excuse me. Where is the baggage claim area?',
        'B: It is downstairs. Take the escalator over there, near the currency exchange. Go down to level 1. You can get your bags there.',
        '3',
        'A: Where are the restrooms, please?',
        "B: Just go straight. They're on the left. Just across from the check-in counters.",
        "A: Thanks. Oh, dear. I think I'd better hurry. I need to change this baby right away.",
    ],
    'game_card_width' => 'max-w-5xl',
    'answer_panel_inner_class' => 'h-full w-full p-5 sm:p-6 text-left',
    'image_option_tile_class' => 'max-w-[13.75rem] sm:max-w-[15.5rem]',
    'options_grid_class' => 'mt-5 grid grid-cols-1 gap-3 sm:grid-cols-[repeat(2,minmax(0,15.5rem))] sm:justify-start',

    'questions' => [
        [
            'prompt'  => 'Where do these people want to go?',
            'correct' => 'b',
            'options' => [
                [
                    'value' => 'a',
                    'label' => 'Option A',
                    'image' => materialAsset("slider/A1/Intermediate/chapter-12/img/slide12/1a.webp"),
                    'alt'   => 'Question 1 option A',
                ],
                [
                    'value' => 'b',
                    'label' => 'Option B',
                    'image' => materialAsset("slider/A1/Intermediate/chapter-12/img/slide12/1b.webp"),
                    'alt'   => 'Question 1 option B',
                ],
            ],
        ],
        [
            'prompt'  => 'Where do these people want to go?',
            'correct' => 'a',
            'options' => [
                [
                    'value' => 'a',
                    'label' => 'Option A',
                    'image' => materialAsset("slider/A1/Intermediate/chapter-12/img/slide12/3a.webp"),
                    'alt'   => 'Question 2 option A',
                ],
                [
                    'value' => 'b',
                    'label' => 'Option B',
                    'image' => materialAsset("slider/A1/Intermediate/chapter-12/img/slide12/3b.webp"),
                    'alt'   => 'Question 2 option B',
                ],
            ],
        ],
        [
            'prompt'  => 'Where do these people want to go?',
            'correct' => 'a',
            'options' => [
                [
                    'value' => 'a',
                    'label' => 'Option A',
                    'image' => materialAsset("slider/A1/Intermediate/chapter-12/img/slide12/2a.webp"),
                    'alt'   => 'Question 3 option A',
                ],
                [
                    'value' => 'b',
                    'label' => 'Option B',
                    'image' => materialAsset("slider/A1/Intermediate/chapter-12/img/slide12/2b.webp"),
                    'alt'   => 'Question 3 option B',
                ],
            ],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])
