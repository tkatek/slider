<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of the lesson, students will be able to:',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2',

    'outcomes' => [
        [
            'emoji'       => '💬',
            'title'       => 'Talk about keeping in touch',
            'description' => 'using the present simple and<br>adverbs of frequency',
        ],
        [
            'emoji'       => '❓',
            'title'       => 'Ask and answer questions',
            'description' => 'about communication habits',
        ],
        [
            'emoji'       => '📶',
            'title'       => 'Identify communication problems',
            'description' => 'such as weak signal, can\'t hear,<br>and cut off',
        ],
        [
            'emoji'       => '🛠️',
            'title'       => 'Use can / can\'t',
            'description' => 'to describe communication problems<br>and ask for help',
        ],
        [
            'emoji'       => '🔊',
            'title'       => 'Use too / very + adjectives',
            'description' => 'to describe problems, such as<br>too slow and very noisy',
        ],
        [
            'emoji'       => '🤝',
            'title'       => 'Solve communication problems',
            'description' => 'using simple expressions, such as<br>Can you repeat that?',
        ],
    ],
];
?>

@include('slider.objectives.objectives', ['content' => $content])
