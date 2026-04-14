<?php
$content = [
    'type' => 'reading',

    'title'           => 'Reading and writing',
    'subtitle'        => 'Read the two scripts about these 2 people and answer the questions',
    'audio'           => materialAsset('slider/A2/Beginner/chapter-1/audios/slide18.mp3'),
    'reading_title'   => '',
    'reading_align'   => 'left',
    'reading_plain'   => true,
    'reading_compact' => true,

    'passage' => [
        "Derek: During the summer, I like to play soccer at the club and ride my bike. I don't like winter because it is too cold, but I love spring, flowers and butterflies are colorful and I feel really happy.",
        "Diana: I think differently, I love winter days. I use my winter clothes, go ice-skating, drink hot chocolates and get warm at the fireplace. Summer is good too, but my favorite season is winter.",
    ],

    'questions' => [
        [
            'prompt'  => 'What does Derek enjoy doing in the summer?',
            'correct' => 'Playing soccer',
            'options' => [
                'Reading books',
                'Playing soccer',
                'Cooking meals',
            ],
        ],
        [
            'prompt'  => 'Which season does Diana prefer?',
            'correct' => 'Winter',
            'options' => [
                'Winter',
                'Summer',
                'Spring',
            ],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])