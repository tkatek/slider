<?php
$content = [
    'page_title' => 'Discussion',

    'title'      => 'Discussion',
    'subtitle'   => 'Difficulties of Learning English',
    'top_badge'  => '💬 Speaking Time',
    'cards_grid' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-2',

    'outcomes' => [
        [
            'number' => '01',
            'badge'  => 'from-blue-500 to-blue-600',
            'title'  => 'Remembering vocabulary',
            'description' => '',
        ],
        [
            'number' => '02',
            'badge'  => 'from-violet-500 to-violet-600',
            'title'  => 'Understanding different accents',
            'description' => '',
        ],
        [
            'number' => '03',
            'badge'  => 'from-emerald-500 to-teal-500',
            'title'  => 'Understanding vocabulary meanings',
            'description' => '',
        ],
        [
            'number' => '04',
            'badge'  => 'from-amber-500 to-orange-500',
            'title'  => 'Writing sentences correctly',
            'description' => '',
        ],
        [
            'number' => '05',
            'badge'  => 'from-rose-500 to-pink-500',
            'title'  => 'Understanding native speakers',
            'description' => '',
        ],
        [
            'number' => '06',
            'badge'  => 'from-indigo-500 to-sky-500',
            'title'  => 'Learning long or difficult words',
            'description' => '',
        ],
        [
            'number' => '07',
            'badge'  => 'from-cyan-500 to-blue-500',
            'title'  => 'Using the correct word in conversation',
            'description' => '',
        ],
        [
            'number' => '08',
            'badge'  => 'from-fuchsia-500 to-purple-500',
            'title'  => 'Learning synonyms and similar words',
            'description' => '',
        ],
        [
            'number' => '09',
            'badge'  => 'from-lime-500 to-emerald-500',
            'title'  => 'Communicating naturally with people',
            'description' => '',
        ],
        [
            'number' => '10',
            'badge'  => 'from-orange-500 to-red-500',
            'title'  => 'Differences between English and the speaker’s first language',
            'description' => '',
        ],
    ],
];
?>

@include('slider.objectives.objectives-images', ['content' => $content])