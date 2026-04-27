<?php
$content = [
    'type' => 'reading',
    'page_title'      => 'Reading Comprehension',
    'title'           => 'Reading Comprehension',
    'subtitle'        => 'Read and answer the questions',
    'reading_title'   => 'My favourite dish',
    'reading_align'   => 'left',
    'reading_plain'   => true,
    'reading_compact' => true,
    'reading_allow_html' => true,

    'passage' => "<span class='text-red-500 font-black'>One of my favorite dishes is</span> American pancakes. I like them because they're <span class='text-red-500 font-black'>easy to make</span> and not too sweet. Americans often <span class='text-red-500 font-black'>eat</span> pancakes <span class='text-red-500 font-black'>for breakfast</span>, but I like eating them at any time, hot or cold. So, you need some flour, some sugar and a bit of salt, some baking powder, a cup of milk, an egg and a little oil. Mix together the milk, egg and oil in a big bowl. Then the flour, sugar and salt are added. Stir everything together. After that, a little oil is put in a frying pan and heated, but not too hot. Put some of the pancake mix into the pan. After about one minute, turn the pancake over and then wait about two minutes. Take it out and make some more. Pancakes are really good with butter and honey or with lemon and sugar, but some people like them plain, with nothing on them.",

    'questions' => [
        [
            'prompt'  => 'Why does the speaker like pancakes?',
            'correct' => 'They are easy to make and not too sweet',
            'options' => [
                'They are very sweet',
                'They are difficult to make',
                'They are easy to make and not too sweet',
                'They are expensive',
            ],
        ],
        [
            'prompt'  => 'When do Americans usually eat pancakes?',
            'correct' => 'For breakfast',
            'options' => [
                'For lunch',
                'For dinner',
                'For breakfast',
                'At night',
            ],
        ],
        [
            'prompt'  => 'What is mixed first in the bowl?',
            'correct' => 'Milk, egg and oil',
            'options' => [
                'Flour and sugar',
                'Milk, egg and oil',
                'Salt and baking powder',
                'Butter and honey',
            ],
        ],
        [
            'prompt'  => 'What should you do after one minute?',
            'correct' => 'Turn the pancake over',
            'options' => [
                'Add sugar',
                'Take the pancake out',
                'Turn the pancake over',
                'Add more oil',
            ],
        ],
        [
            'prompt'  => 'What do people eat pancakes with?',
            'correct' => 'Butter and honey or lemon and sugar',
            'options' => [
                'Rice and beans',
                'Butter and honey or lemon and sugar',
                'Cheese and meat',
                'Vegetables',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])

