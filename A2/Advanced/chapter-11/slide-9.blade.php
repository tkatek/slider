<?php
$content = [
    'page_title' => 'Listening',
    'title'      => 'Listening: Restaurant Problems',
    'subtitle'   => 'Handling Complaints About Food Orders<br>After watching the video, practise reading it and role-play it',

    // --- Image Control ---
    'show_footer_image' => 0,
    'footer_image'      => '',

    'people' => [
        'left'  => [
            'name'  => 'Customer',
            'image' => materialAsset('slider/A2/Advanced/chapter-11/img/customer.webp'),
        ],
        'right' => [
            'name'  => 'Waiter',
            'image' => materialAsset('slider/A2/Advanced/chapter-11/img/waiter.webp'),
        ],
    ],

    'dialogues' => [
        [
            'text'   => "Excuse me. I think there's a mistake with my order.",
            'side'   => 'left',
            'gender' => 'female',
        ],
        [
            'text'   => "I'm sorry about that. What seems to be the problem?",
            'side'   => 'right',
            'gender' => 'male',
        ],
        [
            'text'   => 'I ordered the chicken sandwich, but this looks like beef.',
            'side'   => 'left',
            'gender' => 'female',
        ],
        [
            'text'   => "Let me check your order. You're right. That is beef. I apologize.",
            'side'   => 'right',
            'gender' => 'male',
        ],
        [
            'text'   => "It's okay. Can I please get the chicken sandwich instead?",
            'side'   => 'left',
            'gender' => 'female',
        ],
        [
            'text'   => "Of course. I'll take this back and bring the correct one right away.",
            'side'   => 'right',
            'gender' => 'male',
        ],
        [
            'text'   => 'Also, could I get some extra napkins, please?',
            'side'   => 'left',
            'gender' => 'female',
        ],
        [
            'text'   => "Sure. I'll bring napkins with your sandwich.",
            'side'   => 'right',
            'gender' => 'male',
        ],
        [
            'text'   => 'Is the chicken sandwich spicy?',
            'side'   => 'left',
            'gender' => 'female',
        ],
        [
            'text'   => "No, it's not spicy. It's made with a mild sauce.",
            'side'   => 'right',
            'gender' => 'male',
        ],
        [
            'text'   => "That sounds good. I'm looking forward to it.",
            'side'   => 'left',
            'gender' => 'female',
        ],
    ],
];
?>

@include("slider.vocab.image-conversation", ['content' => $content])