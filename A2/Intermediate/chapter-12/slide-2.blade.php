<?php
$content = [
    'page_title' => 'Learning Objectives',
    'title' => 'Learning Objectives',
    'subtitle' => 'By the end of the lesson, students will be able to:',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2',

    'outcomes' => [
        [
            'number' => '01',
            'badge' => 'from-rose-500 to-pink-600',
            'title' => 'Understand body language gestures',
            'description' => 'Identify and understand common body language gestures used in face-to-face communication: </br> (nod, shake head, wave, etc.).',
        ],
        [
            'number' => '02',
            'badge' => 'from-amber-500 to-orange-500',
            'title' => 'Express communication preferences',
            'description' => 'Express simple opinions about communication preferences using phrases like: </br> “I prefer… because…” / “In my opinion…”',
        ],
    ],
];
?>

@include('slider.objectives.objectives-images', ['content' => $content])