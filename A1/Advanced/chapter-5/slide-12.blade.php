<?php
$content = [
    'page_title' => 'At the Bus Ticket Office',
    'title'      => 'At the Bus Ticket Office',
    'subtitle'   => 'Let’s watch this video',
    'shorts'     => [
        [
            'src' => materialAsset('slider/A1/Advanced/chapter-5/videos/'),
            'thumbnail' => materialAsset('slider/A1/Advanced/chapter-2/img/short.webp'),
            'showCC' => false,
            'subtitles' => [
                ['start' => 0,  'end' => 3,  'text' => "Customer: Hello. I'd like to buy a bus ticket, please."],
                ['start' => 3,  'end' => 5,  'text' => 'Clerk: Sure. Where are you going?'],
                ['start' => 5,  'end' => 7,  'text' => "Customer: I'm going to Green City."],
                ['start' => 7,  'end' => 10, 'text' => 'Clerk: Okay. One way or return ticket?'],
                ['start' => 10, 'end' => 12, 'text' => 'Customer: Just one way, please.'],
                ['start' => 12, 'end' => 14, 'text' => 'Clerk: When do you want to travel?'],
                ['start' => 14, 'end' => 16, 'text' => 'Customer: I want to go today.'],
                ['start' => 16, 'end' => 19, 'text' => 'Clerk: The next bus leaves at 3:00 p.m.'],
                ['start' => 19, 'end' => 21, 'text' => 'Customer: How long is the trip?'],
                ['start' => 21, 'end' => 23, 'text' => 'Clerk: It takes about 2 hours.'],
                ['start' => 23, 'end' => 26, 'text' => 'Customer: All right. How much is the ticket?'],
                ['start' => 26, 'end' => 28, 'text' => "Clerk: It's \$15."],
                ['start' => 28, 'end' => 30, 'text' => 'Customer: Can I pay by card?'],
                ['start' => 30, 'end' => 32, 'text' => 'Clerk: Yes, card is fine.'],
                ['start' => 32, 'end' => 34, 'text' => 'Customer: Here you go.'],
                ['start' => 34, 'end' => 36, 'text' => "Clerk: Thank you. Here's your ticket."],
                ['start' => 36, 'end' => 38, 'text' => 'Customer: Thanks. Where is the bus stop?'],
                ['start' => 38, 'end' => 41, 'text' => 'Clerk: Just outside the main entrance.'],
                ['start' => 41, 'end' => 44, 'text' => 'Customer: Okay. Thank you for your help.'],
                ['start' => 44, 'end' => 47, 'text' => "Clerk: You're welcome. Have a good journey."],
            ],
        ],
    ],
];
?>

@include("slider.video.short-video", ['content' => $content])