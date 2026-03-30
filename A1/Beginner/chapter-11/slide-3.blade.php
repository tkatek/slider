<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of this lesson, you will be able to:',

    'outcomes' => [
        [
            'label' => 'Types of Houses',
            'text'  => 'Identify 4–6 types of houses using pictures. 🏠🏘️🏢',
        ],
        [
            'label' => 'House Rooms',
            'text'  => 'Name basic rooms in a house. 🛋️🛏️🍳',
        ],
        [
            'label' => 'Housing Problems',
            'text'  => 'Say one simple housing problem using “The ___ is broken.” 🛠️🔧🚰',
        ],
        [
            'label' => 'Role-Play',
            'text'  => 'Take part in a short role-play with a landlord (1 problem + 1 response). 🗣️📞📜',
        ],
    ],
];
?>

@include('slider.objectives.objectives-numbered', ['content' => $content])