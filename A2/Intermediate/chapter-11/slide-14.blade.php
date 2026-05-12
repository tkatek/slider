<?php
$content = [
    'title' => 'Reading Comprehension',
    'subtitle' => '',

    'instruction' => 'Read Mary’s diary and fill in the gaps with the correct feelings',
    'instruction_note' => 'Write the missing words',
    'card_class' => '[&_.lp-input]:!w-[8.2rem] [&_.lp-input]:!min-w-[7rem] sm:[&_.lp-input]:!w-[9rem]',

    'transcript' => [
        'Friday 13th October',
        'I’m so excited! Today is my birthday and I’m 12 years old. My parents are going to give me a new bike. I hope it’s red. It’s sunny today. My friends and I are going to go to the park after school.',

        'Monday 16th October',
        'It was a terrible weekend. I’m so disappointed. My parents didn’t give me a bike for my birthday. They gave me a mobile phone. But I don’t want a mobile phone. I already have one. I wanted a bike. I will never speak to them again.',

        'Thursday 19th October',
        'I’m really angry with my best friend, Amy. Last night she told everyone in class I love Tom. Now Tom knows and he looked at me today. I hate Amy. I’m not her best friend anymore.',
    ],

    'lines' => [
        [
            'speaker' => 'Friday 13th October',
            'parts' => [
                ['text' => 'I’m so '],
                ['blank' => true, 'answer' => 'excited'],
                ['text' => '! Today is my birthday and I’m 12 years old. My parents are going to give me a new bike. I hope it’s red. It’s sunny today. My friends and I are going to go to the park after school.'],
            ],
        ],
        [
            'speaker' => 'Monday 16th October',
            'parts' => [
                ['text' => 'It was a terrible weekend. I’m so '],
                ['blank' => true, 'answer' => 'disappointed'],
                ['text' => '. My parents didn’t give me a bike for my birthday. They gave me a mobile phone. But I don’t want a mobile phone. I already have one. I wanted a bike. I will never speak to them again.'],
            ],
        ],
        [
            'speaker' => 'Thursday 19th October',
            'parts' => [
                ['text' => 'I’m really '],
                ['blank' => true, 'answer' => 'angry'],
                ['text' => ' with my best friend, Amy. Last night she told everyone in class I love Tom. Now Tom knows and he looked at me today. I hate Amy. I’m not her best friend anymore.'],
            ],
        ],
    ],
];
?>

@include('slider.game.listening-missing-word', ['content' => $content])
