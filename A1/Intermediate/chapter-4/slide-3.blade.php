<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, learners can:',

    'outcomes' => [
        [
            'label' => 'Body Parts Vocabulary',
            'text'  => 'Name basic body parts. 🧍‍♂️🦵🦷',
        ],
        [
            'label' => 'Common Illnesses',
            'text'  => 'Name common illnesses (cold, headache, stomachache, etc.). 🤒🤧',
        ],
        [
            'label' => 'Symptoms & Duration',
            'text'  => 'Describe symptoms and say how long they have had them. 🗣️⏳',
        ],
        [
            'label' => 'How Serious It Feels',
            'text'  => 'Talk simply about how serious the problem feels. ⚖️😟',
        ],
    ],
];
?>

@include('slider.objectives.objectives-numbered', ['content' => $content])