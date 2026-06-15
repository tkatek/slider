<?php
$content = [
    'page_title' => 'Practice 8',
    'title'      => 'Practice 8',
    'subtitle'   => 'Watch the video',
    'shorts'     => [
        [
            'src' => materialAsset('slider/B1/Beginner/chapter-10/video/encrypted/short-1-past-perfect-dialogue.m3u8'),
            'thumbnail' => materialAsset('slider/B1/Beginner/chapter-10/video/short-1-past-perfect-dialogue.webp'),
            'showCC' => true,
            'subtitles' => [
                ['start' => 0,  'end' => 4,  'text' => "Anna: Where were you last night? I didn't see you at the party."],
                ['start' => 4,  'end' => 9,  'text' => 'Tom: I had left the party before you came. My mom got sick, so I had to leave.'],
                ['start' => 9,  'end' => 12, 'text' => "Anna: Oh, I hope she's feeling better now."],
                ['start' => 12, 'end' => 15, 'text' => "Tom: Thanks. She's doing much better today."],

                ['start' => 15, 'end' => 19, 'text' => 'Anna: Had you made the new project? Our boss asked about it.'],
                ['start' => 19, 'end' => 24, 'text' => 'Tom: Yes, I had already made the project. I told my boss about it last night.'],
                ['start' => 24, 'end' => 27, 'text' => "Anna: Great! You're very creative."],
                ['start' => 27, 'end' => 29, 'text' => 'Tom: Thank you.'],

                ['start' => 29, 'end' => 32, 'text' => 'Anna: Had you seen my email?'],
                ['start' => 32, 'end' => 35, 'text' => 'Tom: No. When did you send it?'],
                ['start' => 35, 'end' => 39, 'text' => 'Anna: I had sent it before I left the house.'],
                ['start' => 39, 'end' => 42, 'text' => "Tom: Okay, I'll check it soon."],

                ['start' => 42, 'end' => 46, 'text' => 'Anna: By the way, when did your sister leave the party?'],
                ['start' => 46, 'end' => 50, 'text' => 'Tom: She had left the party before you came.'],
                ['start' => 50, 'end' => 53, 'text' => 'Anna: I see. She speaks English very well.'],
                ['start' => 53, 'end' => 58, 'text' => "Tom: Yes, she had passed the English test last month. She's a very good student."],

                ['start' => 58, 'end' => 61, 'text' => "Anna: That's wonderful."],
                ['start' => 61, 'end' => 64, 'text' => 'Tom: Well, I have to go now.'],
                ['start' => 64, 'end' => 66, 'text' => 'Anna: See you later!'],
                ['start' => 66, 'end' => 68, 'text' => 'Tom: See you!'],
            ],
        ],
    ],
];
?>

@include("slider.video.short-video", ['content' => $content])