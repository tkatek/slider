<?php

$content = [
    'type' => 'reading',

    'page_title' => 'Reading Comprehension',
    'title'      => 'Reading Comprehension',
    'subtitle'   => 'Read the text & answer the questions',

    'reading_title' => 'How does climate change affect us?',

    'passage' =>
        'We often talk about the effect of human activity on the environment, but how do changes to the environment affect us? Scientists believe that climate change has a huge effect on human evolution and we can see evidence of this over the last 800,000 years. ' .
        'During this period, the Earth’s climate varied a lot, and humans adapted. The human brain grew quickly and our bodies changed to stay alive. Forests decreased in size while flat open areas grew. As a result, we stopped climbing trees all the time, so our knees and feet evolved to make it possible for us to stand up and walk. ' .
        'How will climate change affect us in the future? As our planet gets warmer and animals and plants adapt, our diets will change, so our bodies will learn to accept different types of food. If countries near the equator get too hot, populations will gradually move to cooler areas. ' .
        'Climate change is a danger to our planet, but we can be sure of one thing: human beings can adapt to climate change, as they adapted before!',

    'question_prompt_label' => 'Choose the correct answer:',

    'questions' => [
        [
            'prompt'  => 'The article is about...',
            'correct' => 'A. the effects of human activity on the environment.',
            'options' => [
                'A. the effects of human activity on the environment.',
                'B. the effects of the environment on humans.',
                'C. how humans can protect the environment.',
            ],
        ],
        [
            'prompt'  => 'The human brain is now bigger / smaller than 800,000 years ago.',
            'correct' => 'bigger',
            'options' => [
                'bigger',
                'smaller',
            ],
        ],
        [
            'prompt'  => 'Forests decreased / increased in size during this period.',
            'correct' => 'decreased',
            'options' => [
                'decreased',
                'increased',
            ],
        ],
        [
            'prompt'  => 'In the past, our knees and feet made it easier / harder to climb trees.',
            'correct' => 'easier',
            'options' => [
                'easier',
                'harder',
            ],
        ],
        [
            'prompt'  => 'Climate change will affect how often / what we eat.',
            'correct' => 'what',
            'options' => [
                'how often',
                'what',
            ],
        ],
        [
            'prompt'  => 'In the future, some countries will possibly get too hot / cold.',
            'correct' => 'too hot',
            'options' => [
                'too hot',
                'cold',
            ],
        ],
    ],
];

?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])