<?php
$content = [
    'type' => 'reading',
    'title' => 'Reading Comprehension',
    'subtitle' => 'Read the following passage and answer the questions',
    'reading_title' => 'Preparing for Travel Abroad',
    'passage' => [
        'Traveling abroad is exciting, but you should prepare before you go. First, you should check your passport. Second, you should learn about your destination. Check the weather to pack the right clothes.',
        'Third, you should buy your travel essentials, like medicines and toiletries. You should also tell your bank before you travel. This helps you use your card abroad.',
        'Finally, you should pack carefully. Bring important documents and clothes. You shouldn\'t overpack. Good preparation makes your trip safer and easier.',
    ],
    'questions' => [
        [
            'prompt' => 'What should you check before traveling abroad?',
            'correct' => 'Your passport',
            'options' => [
                'Your passport',
                'Your classroom',
                'Your bicycle',
                'Your television',
            ],
        ],
        [
            'prompt' => 'Why should you check the weather in your destination?',
            'correct' => 'To pack the right clothes',
            'options' => [
                'To buy a new passport',
                'To pack the right clothes',
                'To change your name',
                'To close your bank account',
            ],
        ],
        [
            'prompt' => 'Why should you tell your bank before traveling?',
            'correct' => 'To use your card abroad without problems',
            'options' => [
                'To close your account',
                'To use your card abroad without problems',
                'To get a new passport',
                'To change your name',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
