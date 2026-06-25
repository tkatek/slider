<?php

$content = [
    'type' => 'reading',

    'title'    => 'Reading Comprehension',
    'subtitle' => 'Read the passage & answer the questions:',

    'reading_title' => 'My Wonderful Family',

    'passage' => "I live in a house near the mountains. I have two brothers and one sister, and I was born last. My father teaches mathematics, and my mother is a nurse at a big hospital. My brothers are very smart and work hard in school. My sister is a nervous girl, but she is very kind. My grandmother also lives with us. She came from Italy when I was two years old. She has grown old, but she is still very strong. She cooks the best food!

My family is very important to me. We do lots of things together. My brothers and I like to go on long walks in the mountains. My sister likes to cook with my grandmother. On the weekends we all play board games together. We laugh and always have a good time. I love my family very much.",

    'question_prompt_label' => 'Choose the correct answer',

    'questions' => [
        [
            'prompt'  => 'My mother is a...',
            'correct' => 'Nurse',
            'options' => [
                'Doctor',
                'Nurse',
                'Writer',
                'Waitress',
            ],
        ],
        [
            'prompt'  => 'My house is near the...',
            'correct' => 'Mountains',
            'options' => [
                'City',
                'Monastery',
                'Mountains',
                'Italy',
            ],
        ],
        [
            'prompt'  => 'How old was I when my grandmother came?',
            'correct' => 'Two years old',
            'options' => [
                'Three years old',
                'Just born',
                'Ten years old',
                'Two years old',
            ],
        ],
        [
            'prompt'  => 'On the weekends, we...',
            'correct' => 'Play board games together',
            'options' => [
                'Play board games together',
                'Go to a movie',
                'Clean the house',
                'Cook pasta',
            ],
        ],
        [
            'prompt'  => 'My sister is kind, but also...',
            'correct' => 'Nervous',
            'options' => [
                'Mean',
                'Quiet',
                'Nervous',
                'Strong',
            ],
        ],
    ],
];

?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])