<?php
$content = [
    'title'    => "First let's do a quick revision!",
    'subtitle' => '',
    'type' => 'questions_only',
    'image_panel_col_class'  => 'sm:col-span-0',
    'answer_panel_col_class' => 'sm:col-span-12',
    'questions' => [
        [
            'prompt'  => "She doesn't plan to buy anything else for the apartment.",
            'correct' => 'False',
            'options' => ['True', 'False'],
            'audio'   => materialAsset("slider/A1/Beginner/chapter-12/audios/slide2/1.mp3"),
            'script'  => [
                'A: Does the kitchen have everything you need, like a stove and a refrigerator?',
                "B: There's a stove, but not a refrigerator. I need to buy one.",
            ],
        ],
        [
            'prompt'  => 'He has a new bed.',
            'correct' => 'False',
            'options' => ['True', 'False'],
            'audio'   => materialAsset("slider/A1/Beginner/chapter-12/audios/slide2/2.mp3"),
            'script'  => [
                "A: You don't have a bed in your bedroom?",
                'B: Well, I have a TV. But for now, I only have a mattress on the floor.',
                'A: Really?',
            ],
        ],
        [
            'prompt'  => 'She wants to buy some more furniture.',
            'correct' => 'True',
            'options' => ['True', 'False'],
            'audio'   => materialAsset("slider/A1/Beginner/chapter-12/audios/slide2/3.mp3"),
            'script'  => [
                "A: We don't have much furniture yet. We don't even have a sofa in the living room.",
                "B: Hey. I've one I can sell you.",
                'A: Really? Great.',
            ],
        ],
        [
            'prompt'  => "She'll probably take a bath at her friend's place.",
            'correct' => 'True',
            'options' => ['True', 'False'],
            'audio'   => materialAsset("slider/A1/Beginner/chapter-12/audios/slide2/4.mp3"),
            'script'  => [
                "A: The bathroom is very small. There's just a shower and a toilet.",
                'B: You can come and take a bath at my place any time.',
                'A: Thanks, I probably will.',
            ],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])
