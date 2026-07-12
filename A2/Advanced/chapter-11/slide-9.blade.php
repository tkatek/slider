<?php
$content = [
    'page_title' => 'Restaurant Problems',
    'title'      => 'Restaurant Problems',
    'subtitle'   => 'Handling Complaints About Food Orders<br>After watching the video, practise reading it and role-play it',
    'shorts'     => [
        [
            'src' => materialAsset('slider/A2/Advanced/chapter-11/videos/mistake-encrypted/mistake.m3u8'),
            'thumbnail' => materialAsset('slider/A2/Advanced/chapter-11/img/slide9.webp'),
            'showCC' => false,
            'subtitles' => [
                ['start' => 0,   'end' => 4.5,  'text' => "Customer: Excuse me. I think there's a mistake with my order."],
                ['start' => 5,   'end' => 8,  'text' => "Waiter: I'm sorry about that. What seems to be the problem?"],

                ['start' => 8.7,  'end' => 11.7, 'text' => "Customer: I ordered the chicken sandwich, but this looks like beef."],
                ['start' => 12,  'end' => 18, 'text' => "Waiter: Let me check your order. You're right. That is beef. I apologize."],

                ['start' => 18.7,  'end' => 21.7, 'text' => "Customer: It's okay. Can I please get the chicken sandwich instead?"],
                ['start' => 22,  'end' => 26, 'text' => "Waiter: Of course. I'll take this back and bring the correct one right away."],

                ['start' => 26.5,  'end' => 29, 'text' => "Customer: Also, could I get some extra napkins, please?"],
                ['start' => 29.5,  'end' => 32, 'text' => "Waiter: Sure. I'll bring napkins with your sandwich."],

                ['start' => 33,  'end' => 34.7, 'text' => "Customer: Is the chicken sandwich spicy?"],
                ['start' => 35,  'end' =>38, 'text' => "Waiter: No, it's not spicy. It's made with a mild sauce."],

                ['start' => 38.7,  'end' => 41, 'text' => "Customer: That sounds good. I'm looking forward to it."],
            ],
        ],
    ],
];
?>

@include("slider.video.short-video", ['content' => $content])