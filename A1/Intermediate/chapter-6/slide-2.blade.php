<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of this lesson, you can',

    'outcomes' => [
        [
            'label' => '',
            'text'  => 'Say what the emergency is. 🚨🗣️',
        ],
        [
            'label' => '',
            'text'  => 'Give your name and address. 🪪🏠',
        ],
        [
            'label' => '',
            'text'  => 'Answer simple questions. ✅❓',
        ],
        [
            'label' => '',
            'text'  => 'Ask for help. 🙋‍♂️🆘',
        ],
        [
            'label' => '',
            'text'  => 'Make a short emergency phone call. 📞🚑',
        ],
    ],
];
?>

@include('slider.objectives.objectives-numbered', ['content' => $content])