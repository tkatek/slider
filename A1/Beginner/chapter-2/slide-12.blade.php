<?php
$content = [
    'title' => 'Drag and drop',
    'subtitle' => 'Now, It’s your turn to build your resume!',

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
