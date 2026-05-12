<?php
$content = [
    'title'    => 'Listening',
    'subtitle' => 'Listen again and choose True or False',
    'type'     => 'audio',

    'audio' => materialAsset('slider/A2/Advanced/chapter-8/audios/slide10.mp3'),

    'image_panel_col_class'  => 'sm:col-span-0',
    'answer_panel_col_class' => 'sm:col-span-12',

    'script' => [
        'Paul: Today’s topic is: “Don’t stop when you’re tired. Stop when you’re done.”',
        'Emily: That’s a very important idea. What does “tired” mean?',
        'Paul: Tired means you need rest or sleep.',
        'Emily: And “done” means finished.',
        'Paul: Exactly. This idea is important for learning English, exercise, and daily life.',
        'Emily: Sometimes I study English and feel tired after a short time.',
        'Paul: Me too. But instead of stopping, you can make a small goal, like reading for 10 minutes.',
        'Emily: That sounds easier. Small goals help us continue.',
        'Paul: Yes. When you finish the goal, you feel proud and happy.',
        'Emily: I also feel tired when I exercise.',
        'Paul: What do you do then?',
        'Emily: I try to continue slowly until I finish my goal.',
        'Paul: Great! Then you feel strong because you finished.',
        'Emily: Yes, I do. I also feel tired after dinner when the kitchen is dirty.',
        'Paul: And do you clean it?',
        'Emily: Sometimes I want to wait until tomorrow, but cleaning it now makes me feel better later.',
        'Paul: Exactly. Work first, then rest.',
        'Emily: So, what are the tips for not giving up?',
        'Paul: First, remember your goal. Second, take small steps. Third, give yourself a reward after finishing.',
        'Emily: I like that advice. It helps people keep going.',
        'Paul: Yes. Don’t stop when you’re tired. Stop when you’re done.',
    ],

    'questions' => [
        [
            'prompt'  => '“Done” means sleepy.',
            'correct' => 'False',
            'options' => [
                'True',
                'False',
            ],
        ],
        [
            'prompt'  => 'Emily’s walking goal was 30 minutes.',
            'correct' => 'True',
            'options' => [
                'True',
                'False',
            ],
        ],
        [
            'prompt'  => 'Paul says big goals are always best.',
            'correct' => 'False',
            'options' => [
                'True',
                'False',
            ],
        ],
        [
            'prompt'  => 'Cleaning the kitchen later can make you feel sad.',
            'correct' => 'True',
            'options' => [
                'True',
                'False',
            ],
        ],
        [
            'prompt'  => 'Rewards can help people finish tasks.',
            'correct' => 'True',
            'options' => [
                'True',
                'False',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])