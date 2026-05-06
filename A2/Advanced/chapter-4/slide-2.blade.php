<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of this lesson, you will be able to:',
    'top_badge'  => 'Lesson Goals',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',

    'outcomes' => [
        [
            'emoji'  => '✅',
            'badge'  => 'from-blue-500 to-indigo-600',
            'title'  => 'Present Perfect',
            'description' => 'Understand and use the Present Perfect tense to talk about past experiences.',
        ],
        [
            'emoji'  => '❓',
            'badge'  => 'from-cyan-500 to-blue-600',
            'title'  => 'Have You Ever...?',
            'description' => 'Ask and answer questions using "Have you ever...?"',
        ],
        [
            'emoji'  => '💬',
            'badge'  => 'from-amber-400 to-orange-500',
            'title'  => 'Simple Past Experiences',
            'description' => 'Describe simple past experiences using basic vocabulary.',
        ],
        [
            'emoji'  => '🧭',
            'badge'  => 'from-emerald-500 to-teal-600',
            'title'  => 'Life Experiences',
            'description' => 'Talk about life experiences using "Have you ever...?" questions and short follow-ups.',
        ],
        [
            'emoji'  => '🌱',
            'badge'  => 'from-violet-500 to-purple-600',
            'title'  => 'New Vocabulary',
            'description' => 'Learn and use vocabulary related to experiences, routines, and trying new things.',
        ],
        [
            'emoji'  => '📖',
            'badge'  => 'from-rose-500 to-pink-600',
            'title'  => 'Travel Text',
            'description' => 'Work with a short text example about travel experiences.',
        ],
    ],
];
?>

@include('slider.objectives.objectives', ['content' => $content])
