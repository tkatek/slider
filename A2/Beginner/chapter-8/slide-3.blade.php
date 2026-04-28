<?php
$content = [
    'page_title' => 'Learning Objectives',
    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of the lesson, students will be able to:',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2',

    'outcomes' => [
        [
            'number' => '01',
            'badge'  => 'from-blue-500 to-indigo-600',
            'title'  => 'Describe appearance using have/has',
            'description' => '-> She has long hair. </br> -> He has blue eyes.',
        ],
        [
            'number' => '02',
            'badge'  => 'from-violet-500 to-purple-600',
            'title'  => 'Use correct adjective order for physical description',
            'description' => '-> (size + style + colour) </br> -> long curly blonde hair',
        ],
        [
            'number' => '03',
            'badge'  => 'from-emerald-500 to-teal-500',
            'title'  => 'Describe personality using is/are',
            'description' => '-> She is friendly. </br> -> He is funny.',
        ],
        [
            'number' => '04',
            'badge'  => 'from-amber-500 to-orange-500',
            'title'  => 'Combine appearance and personality in simple sentences',
            'description' => '-> She is kind and she has long brown hair.',
        ],
    ],
];
?>

@include('slider.objectives.objectives-images', ['content' => $content])
