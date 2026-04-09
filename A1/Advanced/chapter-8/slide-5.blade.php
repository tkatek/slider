<?php
$content = [
    'page_title' => '',
    'title' => 'Practice 2',
    'subtitle' => " Let's remember some places around town",
    'theme_color' => '#673fe7',
    'sentences' => [
        "{{1}}",
        "{{2}}",
        "{{3}}",
        "{{4}}",
        "{{5}}",
        "{{6}}",
        "{{7}}",
        "{{8}}",
        "{{9}}",
        "{{10}}",
        "{{11}}",
        "{{12}}",
        "{{13}}",
    ],
    'scramble' => [
        'Park',
        ['Police', 'Station'],
        'School',
        'Cafe',
        'Supermarket',
        'Market',
        ['Post', 'Office'],
        'Mosque',
        'Library',
        ['Health', 'Centre'],
        'Takeaway',
        'Shops',
        ['Community', 'Centre'],
    ],
];
?>
@include('slider.game.unscramble', ['content' => $content])
