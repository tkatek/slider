<?php
$content = [
    'video'          => materialAsset('slider/A1/Intermediate/chapter-10/video/airport-encrypted/airport.m3u8'),
    'thumbnail'      => materialAsset('slider/A1/Intermediate/chapter-10/video/thumbnail.webp'),
    'isQuiz'         => 0,
    'showTranscript' => 0,

    'questions'      => [

    ],

    'subtitles' => [
        ['start' => 0,  'end' => 3,  'text' => "Good morning. I'd like to check in for my flight."],
        ['start' => 3,  'end' => 6.5,  'text' => "Good morning. Can I see your passport and ticket, please?"],
        ['start' => 6.8,  'end' => 8,  'text' => "Sure, Here you go."],
        ['start' => 9,  'end' => 10, 'text' => "Thank you."],
        ['start' => 13.8,  'end' => 16, 'text' => "Are you checking in any luggage?"],
        ['start' => 16, 'end' => 18, 'text' => "Yes, I have one suitcase."],
        ['start' => 18.5, 'end' => 19.5, 'text' => "Please put it on the scale."],
        ['start' => 20, 'end' => 21.5, 'text' => "Okay, Here it is."],
        ['start' => 26.5, 'end' => 29, 'text' => "Great. Your bag is within the weight limit."],
        ['start' => 29, 'end' => 31, 'text' => "That's good. Can I have a window seat, please?"],
        ['start' => 31.5, 'end' => 32.5, 'text' => "Let me check."],
        ['start' => 34, 'end' => 36, 'text' => "Yes, I found one for you."],
        ['start' => 36, 'end' => 37, 'text' => "Great. Thank you."],
        ['start' => 37.5, 'end' => 41, 'text' => "You're welcome, Here's your boarding pass. Your gate number is 12."],
        ['start' => 45.5, 'end' => 47, 'text' => "What time does boarding start?"],
        ['start' => 47, 'end' => 50, 'text' => "Boarding begins at 10:30. Don't be late."],
        ['start' => 50, 'end' => 52, 'text' => "Got it. Thanks for your help."],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])