<?php
$content = [
    'page_title' => 'Learning Objectives',

    'title'      => 'Learning Objectives',
    'subtitle'   => 'By the end of this lesson, students will be able to:',
    'top_badge'  => '🎯 Lesson Goals',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',

    'outcomes' => [
        [
            'emoji'  => '💻',
            'badge'  => 'from-blue-500 to-indigo-600',
            'title'  => 'Workplace Gadgets',
            'description' => 'Identify and name 5–6 workplace gadgets.',
        ],
        [
            'emoji'  => '🧑‍💼',
            'badge'  => 'from-cyan-500 to-blue-600',
            'title'  => 'Present Simple',
            'description' => 'Describe what people use using Present Simple.',
        ],
        [
            'emoji'  => '🎯',
            'badge'  => 'from-amber-400 to-orange-500',
            'title'  => 'Purpose',
            'description' => 'Explain purpose using to + verb.',
        ],
        [
            'emoji'  => '🛠️',
            'badge'  => 'from-emerald-500 to-teal-600',
            'title'  => 'Job Tools',
            'description' => 'Produce 3–4 sentences describing a job and its tools.',
        ],
        [
            'emoji'  => '✍️',
            'badge'  => 'from-violet-500 to-purple-600',
            'title'  => 'Gadget Writing',
            'description' => 'Write 3–4 sentences about gadgets used at work.',
        ],
    ],
];
?>

@include('slider.objectives.objectives', ['content' => $content])