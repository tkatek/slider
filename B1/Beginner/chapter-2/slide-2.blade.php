<?php
$content = [
    'type' => 'type3',

    'title'    => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, students will be able to:',

    'objectives' => [
        [
            'emoji' => '',
            'title' => 'Use vocabulary',
            'subtitle' => 'Related to kindness, favors, and helping others in context.',
        ],
        [
            'emoji' => '',
            'title' => 'Understand and use common collocations and expressions',
            'subtitle' => 'Related to kindness and social interaction, such as “return a favor”, “lend a hand”, and “make a difference”.',
        ],
        [
            'emoji' => '',
            'title' => 'Demonstrate understanding of short reading and listening texts',
            'subtitle' => 'About kindness through comprehension tasks.',
        ],
        [
            'emoji' => '',
            'title' => 'Discuss personal experiences and opinions',
            'subtitle' => 'About kindness, gratitude, and helping others.',
        ],
        [
            'emoji' => '',
            'title' => 'Write simple sentences',
            'subtitle' => 'Describing acts of kindness they have done or experienced.',
        ],
    ],
];
?>

@include('slider.other.learning-objectives', ['content' => $content])