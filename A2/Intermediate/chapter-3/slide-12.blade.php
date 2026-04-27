<?php
$content = [
    'type' => 'reading',
    'page_title'      => 'Reading Comprehension',
    'title'           => 'Reading Comprehension',
    'subtitle'        => 'Read and answer the questions',
    'reading_title'   => 'The Evil Eye',
    'reading_align'   => 'left',
    'reading_plain'   => true,
    'reading_compact' => true,

    'passage' => "In many countries, people believe in the evil eye. In Egypt, many people think that good things happen because of good luck. But bad things can happen because of the evil eye. For example, if someone buys a new car and it breaks, people may think someone was jealous. If a person gets sick suddenly, people may also say it is the evil eye. Many Egyptians believe the evil eye causes bad luck and problems.",

    'questions' => [
        [
            'prompt'  => 'What do many Egyptians believe about good things?',
            'correct' => 'They happen because of good luck',
            'options' => [
                'They are always planned',
                'They happen because of good luck',
                'They come from hard work',
                'They are not important',
            ],
        ],
        [
            'prompt'  => 'What is the “evil eye”?',
            'correct' => 'A belief about bad luck',
            'options' => [
                'A type of animal',
                'A kind of food',
                'A belief about bad luck',
                'A place',
            ],
        ],
        [
            'prompt'  => 'What may happen if someone buys a new car?',
            'correct' => 'It may break because of the evil eye',
            'options' => [
                'It becomes very fast',
                'It is sold quickly',
                'It may break because of the evil eye',
                'It disappears',
            ],
        ],
        [
            'prompt'  => 'Why do people think bad things happen?',
            'correct' => 'Because someone is jealous',
            'options' => [
                'Because of the weather',
                'Because of school',
                'Because someone is jealous',
                'Because of travel',
            ],
        ],
        [
            'prompt'  => 'What do people say if someone gets sick suddenly?',
            'correct' => 'It is the evil eye',
            'options' => [
                'It is normal',
                'It is the evil eye',
                'It is good luck',
                'It is a dream',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
