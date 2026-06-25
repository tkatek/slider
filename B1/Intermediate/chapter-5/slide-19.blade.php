<?php

$content = [
    'type' => 'reading',

    'title'      => 'Reading Comprehension',
    'subtitle'   => '',

    'reading_title' => 'Choosing the Right Influencer',

    'passage' => "Many brands work with influencers to promote their products. Some brands only look at the number of followers. However, followers are not the only important factor.

Brands should also check the engagement rate. This shows how often followers like, comment on, and share posts. An influencer with fewer followers but higher engagement can sometimes be more effective.

Brands should also choose influencers whose content matches their products and values. Choosing the right influencer can help a brand reach the right audience and achieve better results.",

    'question_prompt_label' => 'Choose the correct answer',

    'questions' => [
        [
            'prompt'  => 'What mistake do some brands make?',
            'correct' => 'They only look at the number of followers.',
            'options' => [
                'They only look at the number of followers.',
                'They use too many influencers.',
                'They avoid social media.',
            ],
        ],
        [
            'prompt'  => 'What does engagement rate show?',
            'correct' => 'How followers interact with posts.',
            'options' => [
                "The influencer's age.",
                'How followers interact with posts.',
                'How much money the influencer earns.',
            ],
        ],
        [
            'prompt'  => "Why should brands check an influencer's content?",
            'correct' => 'To make sure it matches their products and values.',
            'options' => [
                'To make sure it matches their products and values.',
                'To count the number of photos.',
                "To check the influencer's friends.",
            ],
        ],
        [
            'prompt'  => 'Why do you think many brands choose to work with influencers?',
            'type'    => 'personal',
            'options' => [
                'To reach the right audience.',
                'To promote their products.',
                'To build trust with customers.',
            ],
        ],
        [
            'prompt'  => 'What qualities do you think a good influencer should have?',
            'type'    => 'personal',
            'options' => [
                'Honesty and trust.',
                'Good content.',
                'Strong connection with followers.',
            ],
        ],
    ],
];

?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])