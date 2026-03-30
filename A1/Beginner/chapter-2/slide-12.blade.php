<?php
$content = [
    'page_title' => 'Now, It’s your turn to build your resume!',
    'title' => 'Drag and drop',
    'subtitle' => 'Now, It’s your turn to build your resume!',

    'cards_grid' => 'grid-cols-1 sm:grid-cols-3 lg:grid-cols-1',
    'desktop_game_width' => 100,
    'desktop_pool_width' => 100,
    'categories' => [
        'Contact Information' => [
            'emoji' => '📇',
            'items' => [
                'Name',
                'Email address',
                'Home address',
                'Phone Number',
                'Surname',
            ],
        ],
        'Work Experience' => [
            'emoji' => '💼',
            'items' => [
                'work while at school',
                'Unpaid job',
                'Paid job',
            ],
        ],
        'Skills/Abilities' => [
            'emoji' => '⭐',
            'items' => [
                'Willing to be flexible',
                'can work well with others',
                'hardworking',
            ],
        ],
    ],
];
?>
@include('slider.game.drag-and-drop', ['content' => $content])
