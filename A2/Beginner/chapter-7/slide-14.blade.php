<?php
$content = [
    'title' => 'Practice 6: Listening 2',
    'subtitle' => 'People are describing other people. What do the people look like? Listen and check (✓) the correct pictures.',
    'type' => 'audio',
    'option_type'   => 'image',
    'shuffle_options' => false,
    'audio' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide14/practice.mpeg'),

    'script' => [
        '1',
        'A: What does your girlfriend look like, Tony?',
        'B: Ella? Oh, she’s tall. And she has long, dark brown hair.',

        '2',
        'A: Tell me about your boyfriend, Anne.',
        'B: Well, his name’s Daniel. He’s 17. Let me see… Well, he has curly blonde hair.',
        'B: He’s not very tall – about average. But he’s really good-looking.',

        '3',
        'A: So, Matt, what’s the new girl in class look like?',
        'B: She’s pretty tall, about 170 centimetres.',
        'B: She wears glasses, and has short curly hair. I think she’s about 20.',
        'A: What’s her name?',
        'B: I can’t remember. Anne, I think.',

        '4',
        'A: So tell me about your cousin, Paul.',
        'B: Well, she’s very pretty.',
        'A: Really! Is she blonde?',
        'B: No, she has dark brown hair. Everybody likes her. She’s an actress.',
        'A: Really? I’d like to meet her.',

        '5',
        'A: What does your new boyfriend look like, Jenna?',
        'B: Well, he\'s really good looking.',
        'A: Oh! Is he tall?',
        'B: No, he isn\'t. He\'s pretty short.',
        'A: Really? Are you taller than him?',
    ],

    'game_card_width' => 'max-w-7xl',
    'answer_panel_inner_class' => 'h-full w-full p-5 sm:p-6 text-left',
    'image_option_tile_class' => 'max-w-[10.5rem] sm:max-w-[12rem] lg:max-w-[13rem]',
    'options_grid_class' => 'mt-5 grid grid-cols-2 gap-3 sm:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4',

    'questions' => [
        [
            'prompt'  => 'Listen and check the correct pictures.',
            'correct' => ['1-a', '2-a', '3-a', '4-a'],
            'options' => [
                [
                    'value' => '1-a',
                    'label' => '1 - A',
                    'image' => materialAsset("slider/A2/Beginner/chapter-7/img/slide14/one.webp"),
                    'alt'   => 'Question 1 option A',
                ],
                [
                    'value' => '1-b',
                    'label' => '1 - B',
                    'image' => materialAsset("slider/A2/Beginner/chapter-7/img/slide14/two.webp"),
                    'alt'   => 'Question 1 option B',
                ],
                [
                    'value' => '2-a',
                    'label' => '2 - A',
                    'image' => materialAsset("slider/A2/Beginner/chapter-7/img/slide14/curly.webp"),
                    'alt'   => 'Question 2 option A',
                ],
                [
                    'value' => '2-b',
                    'label' => '2 - B',
                    'image' => materialAsset("slider/A2/Beginner/chapter-7/img/slide14/four.webp"),
                    'alt'   => 'Question 2 option B',
                ],
                [
                    'value' => '3-a',
                    'label' => '3 - A',
                    'image' => materialAsset("slider/A2/Beginner/chapter-7/img/slide14/five.webp"),
                    'alt'   => 'Question 3 option A',
                ],
                [
                    'value' => '3-b',
                    'label' => '3 - B',
                    'image' => materialAsset("slider/A2/Beginner/chapter-7/img/slide14/six.webp"),
                    'alt'   => 'Question 3 option B',
                ],
                [
                    'value' => '4-a',
                    'label' => '4 - A',
                    'image' => materialAsset("slider/A2/Beginner/chapter-7/img/slide14/seven.webp"),
                    'alt'   => 'Question 4 option A',
                ],
                [
                    'value' => '4-b',
                    'label' => '4 - B',
                    'image' => materialAsset("slider/A2/Beginner/chapter-7/img/slide14/eight.webp"),
                    'alt'   => 'Question 4 option B',
                ],
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])