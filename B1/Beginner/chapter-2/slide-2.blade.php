<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of the lesson, students will be able to:',
    'top_badge'  => '🎯 Lesson Goals',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-2',

    'outcomes' => [
        [
            'number'      => '01',
            'badge'       => 'from-green-700 to-green-500',
            'title'       => '💚 Use vocabulary',
            'description' => 'related to kindness, favors, and helping others in context.',
        ],
        [
            'number'      => '02',
            'badge'       => 'from-emerald-600 to-green-500',
            'title'       => '🤝 Understand and use common collocations and expressions',
            'description' => 'related to kindness and social interaction (e.g., “return a favor”, “lend a hand”, “make a difference”).',
        ],
        [
            'number'      => '03',
            'badge'       => 'from-lime-600 to-green-500',
            'title'       => '👂 Demonstrate understanding of short reading and listening texts',
            'description' => 'about kindness through comprehension tasks.',
        ],
        [
            'number'      => '04',
            'badge'       => 'from-teal-600 to-emerald-500',
            'title'       => '💬 Discuss personal experiences and opinions',
            'description' => 'about kindness, gratitude, and helping others.',
        ],
        [
            'number'      => '05',
            'badge'       => 'from-green-800 to-emerald-600',
            'title'       => '✍️ Write simple sentences',
            'description' => 'describing acts of kindness they have done or experienced.',
        ],
    ],
];
?>

@include('slider.objectives.objectives-images', ['content' => $content])