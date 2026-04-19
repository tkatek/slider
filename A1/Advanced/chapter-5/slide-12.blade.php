<?php
$content = [
    'page_title' => 'At the Bus Ticket Office',
    'title'      => 'At the Bus Ticket Office',
    'subtitle'   => 'Let’s watch this video',
    'shorts'     => [
        [
            'src' => materialAsset('slider/A1/Advanced/chapter-5/video/ticket-encrypted/ticket.m3u8'),
            'thumbnail' => materialAsset('slider/A1/Advanced/chapter-2/img/short.webp'),
            'showCC' => false,
            'subtitles' => [
                ['start' => 0,  'end' => 3,  'text' => "Customer: Hello. I'd like to buy a bus ticket, please."],
                ['start' => 3.7,  'end' => 5,  'text' => 'Clerk: Sure. Where are you going?'],
                ['start' => 5,  'end' => 7,  'text' => "Customer: I'm going to Green City."],
                ['start' => 7,  'end' => 9, 'text' => 'Clerk: Okay. One way or return ticket?'],
                ['start' => 9, 'end' => 10, 'text' => 'Customer: Just one way, please.'],
                ['start' => 10, 'end' => 12, 'text' => 'Clerk: When do you want to travel?'],
                ['start' => 12, 'end' => 13.5, 'text' => 'Customer: I want to go today.'],
                ['start' => 13.5, 'end' => 16, 'text' => 'Clerk: The next bus leaves at 3:00 p.m.'],
                ['start' => 16, 'end' => 17.5, 'text' => 'Customer: How long is the trip?'],
                ['start' => 17.5, 'end' => 19, 'text' => 'Clerk: It takes about 2 hours.'],
                ['start' => 19, 'end' => 21, 'text' => 'Customer: All right. How much is the ticket?'],
                ['start' => 21, 'end' => 22, 'text' => "Clerk: It's \$15."],
                ['start' => 22.5, 'end' => 23.7, 'text' => 'Customer: Can I pay by card?'],
                ['start' => 23.7, 'end' => 25, 'text' => 'Clerk: Yes, card is fine.'],
                ['start' => 26.7, 'end' => 27.5, 'text' => 'Customer: Here you go.'],
                ['start' => 29, 'end' => 31, 'text' => "Clerk: Thank you. Here's your ticket."],
                ['start' => 32, 'end' => 34, 'text' => 'Customer: Thanks. Where is the bus stop?'],
                ['start' => 34, 'end' => 36, 'text' => 'Clerk: Just outside the main entrance.'],
                ['start' => 36, 'end' => 37.5, 'text' => 'Customer: Okay. Thank you for your help.'],
                ['start' => 37.5, 'end' => 40, 'text' => "Clerk: You're welcome. Have a good journey."],
            ],
        ],
    ],
];
?>

@include("slider.video.short-video", ['content' => $content])