<?php

$content = [
    'type' => 'reading',

    'title'      => 'Reading Comprehension',
    'subtitle'   => 'Inspired Ideas That Changed History<br>Read the passage & answer the questions:',

    'reading_title' => 'Thomas Edison and the Electric Light Bulb',

    'passage' => "Thomas Edison was an American inventor who is known for many important inventions. He was born in 1847 and became one of the most famous inventors in history.

Edison worked in a laboratory which was always busy with experiments. He believed that hard work and many attempts were necessary for success. He tested thousands of ideas before finding the right solution.

One of his most important inventions was the electric light bulb that could produce light for a long time. Before this invention, people used candles and oil lamps, which were not very safe or practical.

Edison did not work alone. He had a team of workers who helped him test and improve his ideas. Together, they created inventions that changed daily life.

His work shows that success often comes from effort and persistence, and from ideas that are tested again and again.",

    'question_prompt_label' => 'Choose the correct answer',

    'questions' => [
        [
            'prompt'  => 'Thomas Edison was a:',
            'correct' => 'inventor',
            'options' => [
                'teacher',
                'inventor',
                'doctor',
            ],
        ],
        [
            'prompt'  => 'Edison is famous for inventing:',
            'correct' => 'the electric light bulb',
            'options' => [
                'the telephone',
                'the electric light bulb',
                'the computer',
            ],
        ],
        [
            'prompt'  => 'Before electric lights, people used:',
            'correct' => 'candles and lamps',
            'options' => [
                'screens',
                'candles and lamps',
                'batteries',
            ],
        ],
        [
            'prompt'  => 'Edison worked alone.',
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => 'He tested many ideas before success.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => 'The light bulb was not very useful.',
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => 'His team helped him develop inventions.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
    ],
];

?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])