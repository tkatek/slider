<?php
$content = [
    'page_title' => 'Learning Objectives',
    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of the lesson, students will be able to:',

    'outcomes' => [
        [
            'label' => 'Present Continuous Practice',
            'text'  => 'Practise Present Continuous to describe current actions.',
        ],
        [
            'label' => 'Discuss Current Actions',
            'text'  => 'Discuss what people are doing at the moment.',
        ],
        [
            'label' => 'Photo Description Q&A',
            'text'  => 'Describe photos by asking and answering questions.',
        ],
    ],
];
?>
@include('slider.objectives.objectives-numbered', ['content' => $content])