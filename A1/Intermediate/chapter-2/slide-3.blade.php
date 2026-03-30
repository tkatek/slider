<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of this lesson, students can:',

    'outcomes' => [
        [
            'label' => 'Festival Vocabulary',
            'text'  => 'Say at least 6 festival words (party, parade, gift, etc.). 🎉🎁🎭',
        ],
        [
            'label' => 'Dates & Ordinals',
            'text'  => 'Form dates using ordinal numbers (1st, 2nd, 3rd) and months. 🗓️🔢',
        ],
        [
            'label' => 'Event Timing Q&A',
            'text'  => 'Ask and answer about event timing: “When is [Event]?” / “It is on [Date].” 🗣️📅',
        ],
        [
            'label' => 'Holiday & Traditions',
            'text'  => 'Describe a favorite holiday or a personal tradition. 🌟👨‍👩‍👧‍👦',
        ],
        [
            'label' => 'Writing',
            'text'  => 'Write a short (30-word) paragraph about “your best holiday”. ✍️📝',
        ],
    ],
];
?>

@include('slider.objectives.objectives-numbered', ['content' => $content])