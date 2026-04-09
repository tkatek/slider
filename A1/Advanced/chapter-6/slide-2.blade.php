<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, students will be able to:',

    'outcomes' => [
        [
            'label' => '',
            'text'  => 'Learn and use 8–10 railway station vocabulary items (e.g., platform, timetable, luggage rack, buffet car).',
        ],
        [
            'label' => '',
            'text'  => 'Understand the main idea of a short travel video about a train journey.',
        ],
        [
            'label' => '',
            'text'  => 'Extract specific information from a train station announcement (e.g., time and platform).',
        ],
        [
            'label' => '',
            'text'  => 'Ask and answer simple questions about train travel using expressions such as: Excuse me… Which platform…? What time does the train leave?',
        ],
        [
            'label' => '',
            'text'  => 'Participate in a short role-play at a railway station using target functional language.',
        ],
    ],
];
?>

@include('slider.objectives.objectives-numbered', ['content' => $content])