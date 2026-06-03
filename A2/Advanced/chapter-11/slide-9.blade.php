<?php
$content = [
    'page_title' => 'Restaurant Problems',
    'title'      => 'Restaurant Problems',
    'subtitle'   => 'Handling Complaints About Food Orders<br>After watching the video, practise reading it and role-play it',
    'shorts'     => [
        [
            'src' => materialAsset('slider/A2/Advanced/chapter-11/'),
            'thumbnail' => materialAsset('slider/A2/Advanced/chapter-11/'),
            'showCC' => false,
            'subtitles' => [
                ['start' => 0,   'end' => 4,  'text' => "Customer: Excuse me. I think there's a mistake with my order."],
                ['start' => 5,   'end' => 9,  'text' => "Waiter: I'm sorry about that. What seems to be the problem?"],

                ['start' => 10,  'end' => 15, 'text' => "Customer: I ordered the chicken sandwich, but this looks like beef."],
                ['start' => 16,  'end' => 21, 'text' => "Waiter: Let me check your order. You're right. That is beef. I apologize."],

                ['start' => 22,  'end' => 27, 'text' => "Customer: It's okay. Can I please get the chicken sandwich instead?"],
                ['start' => 28,  'end' => 33, 'text' => "Waiter: Of course. I'll take this back and bring the correct one right away."],

                ['start' => 34,  'end' => 38, 'text' => "Customer: Also, could I get some extra napkins, please?"],
                ['start' => 39,  'end' => 43, 'text' => "Waiter: Sure. I'll bring napkins with your sandwich."],

                ['start' => 44,  'end' => 47, 'text' => "Customer: Is the chicken sandwich spicy?"],
                ['start' => 48,  'end' => 53, 'text' => "Waiter: No, it's not spicy. It's made with a mild sauce."],

                ['start' => 54,  'end' => 58, 'text' => "Customer: That sounds good. I'm looking forward to it."],
            ],
        ],
    ],
];
?>

@include("slider.video.short-video", ['content' => $content])