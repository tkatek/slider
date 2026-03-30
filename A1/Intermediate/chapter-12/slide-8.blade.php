<?php
$content = [
    'page_title' => 'Grammar Focus',
    'title'      => 'Grammar Focus',
    'subtitle'   => 'Asking for Permission : (Can / Could / May)',

    'grid_class' => 'grid-cols-1 md:grid-cols-2',

    'examples' => [
        [
            'label'     => 'Example 1',
            'emoji'     => '💺',
            'text'      => 'Could you please help me find my seat?',
            'highlight' => ['Could', 'help'],
            'theme'     => 'indigo',
        ],
        [
            'label'     => 'Example 2',
            'emoji'     => '🪪',
            'text'      => 'May I see your boarding pass, please?',
            'highlight' => ['May', 'see'],
            'theme'     => 'violet',
        ],
        [
            'label'     => 'Example 3',
            'emoji'     => '🛫',
            'text'      => 'May I recline my seat?',
            'highlight' => ['May', 'recline'],
            'theme'     => 'blue',
        ],
        [
            'label'     => 'Example 4',
            'emoji'     => '🛏️',
            'text'      => 'Can I have a blanket?',
            'highlight' => ['Can', 'have'],
            'theme'     => 'sky',
        ],
    ],
];
?>

@include("slider.other.speaking-discussion", ['content' => $content])
