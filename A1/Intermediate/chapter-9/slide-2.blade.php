<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, you will be able to',

    'outcomes' => [
        [
            'label' => '',
            'text'  => 'Use vocabulary related to packing and travel items. 🧳👕',
        ],
        [
            'label' => '',
            'text'  => 'Create and organize a holiday to-do list. 📝✈️',
        ],
        [
            'label' => '',
            'text'  => 'Use need to / have to / going to / should when talking about preparation. 🗣️📚',
        ],
        [
            'label' => '',
            'text'  => 'Discuss what to pack for different types of holidays. 🏝️🏔️',
        ],
        [
            'label' => '',
            'text'  => 'Give advice about packing. 💡🎒',
        ],
    ],
];
?>

@include('slider.objectives.objectives-numbered', ['content' => $content])