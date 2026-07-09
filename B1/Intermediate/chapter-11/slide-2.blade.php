<?php
$content = [
    'title'       => 'Practice 1 : Warm up',
    'subtitle'    => 'Match each word to its synonym and antonym',
    'row_heading' => 'Word',

    'rows' => [
        ['key' => 'brave',      'title' => 'Brave',      'emoji' => '🛡️'],
        ['key' => 'afraid',     'title' => 'Afraid',     'emoji' => '😨'],
        ['key' => 'help',       'title' => 'Help',       'emoji' => '🤝'],
        ['key' => 'guilty',     'title' => 'Guilty',     'emoji' => '😔'],
        ['key' => 'strength',   'title' => 'Strength',   'emoji' => '💪'],
        ['key' => 'known',      'title' => 'Known',      'emoji' => '🌟'],
        ['key' => 'inspire',    'title' => 'Inspire',    'emoji' => '💡'],
        ['key' => 'noticed',    'title' => 'Noticed',    'emoji' => '👁️'],
        ['key' => 'recognized', 'title' => 'Recognized', 'emoji' => '🧑‍💼'],
        ['key' => 'right',      'title' => 'Right',      'emoji' => '✅'],
        ['key' => 'small',      'title' => 'Small',      'emoji' => '⭐'],
    ],

    'columns' => [
        [
            'key'   => 'synonym',
            'title' => 'Synonym (Same)',
            'short' => 'Synonym',
        ],
        [
            'key'   => 'antonym',
            'title' => 'Antonym (Opposite)',
            'short' => 'Antonym',
        ],
    ],

    'items' => [
        ['text' => 'Courageous',   'row' => 'brave',      'column' => 'synonym'],
        ['text' => 'Cowardly',     'row' => 'brave',      'column' => 'antonym'],

        ['text' => 'Scared',       'row' => 'afraid',     'column' => 'synonym'],
        ['text' => 'Fearless',     'row' => 'afraid',     'column' => 'antonym'],

        ['text' => 'Assist',       'row' => 'help',       'column' => 'synonym'],
        ['text' => 'Ignore',       'row' => 'help',       'column' => 'antonym'],

        ['text' => 'Ashamed',      'row' => 'guilty',     'column' => 'synonym'],
        ['text' => 'Proud',        'row' => 'guilty',     'column' => 'antonym'],

        ['text' => 'Power',        'row' => 'strength',   'column' => 'synonym'],
        ['text' => 'Weakness',     'row' => 'strength',   'column' => 'antonym'],

        ['text' => 'Famous',       'row' => 'known',      'column' => 'synonym'],
        ['text' => 'Unknown',      'row' => 'known',      'column' => 'antonym'],

        ['text' => 'Motivated',    'row' => 'inspire',    'column' => 'synonym'],
        ['text' => 'Discourage',   'row' => 'inspire',    'column' => 'antonym'],

        ['text' => 'Seen',         'row' => 'noticed',    'column' => 'synonym'],
        ['text' => 'Ignored',      'row' => 'noticed',    'column' => 'antonym'],

        ['text' => 'Acknowledged', 'row' => 'recognized', 'column' => 'synonym'],
        ['text' => 'Unrecognized', 'row' => 'recognized', 'column' => 'antonym'],

        ['text' => 'Correct',      'row' => 'right',      'column' => 'synonym'],
        ['text' => 'Wrong',        'row' => 'right',      'column' => 'antonym'],

        ['text' => 'Tiny',         'row' => 'small',      'column' => 'synonym'],
        ['text' => 'Big',          'row' => 'small',      'column' => 'antonym'],
    ],
];
?>

@include("slider.game.drag-and-drop-table", ['content' => $content])