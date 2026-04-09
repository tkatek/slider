<?php
$content = [
    'title'    => 'Practice 4',
    'subtitle' => 'Answer the following questions about the interview',
    'type'     => 'audio',

    'audio' => materialAsset('slider/A1/Advanced/chapter-8/audios/france.mp3'),

    'image_panel_col_class'  => 'sm:col-span-0',
    'answer_panel_col_class' => 'sm:col-span-12',

    'questions' => [
        [
            'prompt'  => 'What does he say is the worst thing about France?',
            'correct' => 'The people are mean',
            'options' => [
                'The weather is terrible',
                'It is expensive',
                'The people are mean',
            ],
            'script' => "Hi, I'm Antoine from France. My question is what is the best and worst of my country, France. So, I will start with the worst I think. For me the worst is the people mentality. For example, I'm from the countryside in France. I'm from a little city. Every time I go to a big city like Paris, people are really mean to me. They are really rude in the subway and even in the streets. They are not smiling and not saying hi to anybody. I'm quite used to saying hi to people when I'm walking down the street. That was the worst part, so now I'm going to talk about the best part for me. For me in France, the best part is the diversity. For example, in the heart of the country, we have a lot of museums, a lot of monuments, and the food also. We have so many different kinds of food. I think France is a really diversified country, and that's why I love that place. Thank you",
        ],
        [
            'prompt'  => 'In the city are people _______?',
            'correct' => 'rude',
            'options' => [
                'friendly',
                'rude',
                'busy',
            ],
        ],
        [
            'prompt'  => 'What is the best thing about France?',
            'correct' => 'Diversity',
            'options' => [
                'Diversity',
                'Food',
                'Transportation',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
