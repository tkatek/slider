<?php
$content = [
    'video'          => materialAsset(''),
    'thumbnail'      => materialAsset(''),
    'isQuiz'         => 0, // 1 show question / 0 don't
    'showTranscript' => 1,
    'questions'      => [],

    'subtitles' => [
        ['start' => 0,  'end' => 4,  'text' => "Flight Attendant: Good morning. Welcome aboard. May I see your boarding pass, please?"],
        ['start' => 4,  'end' => 6,  'text' => "Passenger: Good morning. Yes, here it is."],
        ['start' => 6,  'end' => 10, 'text' => "Flight Attendant: Thank you, Mr. Taylor. You're in seat 14A."],
        ['start' => 10, 'end' => 13, 'text' => "Flight Attendant: That's on the left side by the window."],
        ['start' => 13, 'end' => 18, 'text' => "Passenger: Got it. Thank you. Is there still space in the overhead bin for my bag?"],
        ['start' => 18, 'end' => 23, 'text' => "Flight Attendant: Yes, there should be. If not, just let me know"],
        ['start' => 23, 'end' => 27, 'text' => "Flight Attendant: and I'll help you find space."],
        ['start' => 27, 'end' => 30, 'text' => "Passenger: Perfect. Thanks. Is this a full flight today?"],
        ['start' => 30, 'end' => 36, 'text' => "Flight Attendant: Yes, it's almost full. We're just waiting on a few more passengers."],
        ['start' => 36, 'end' => 40, 'text' => "Flight Attendant: Please make sure your phone is in airplane mode."],
        ['start' => 40, 'end' => 43, 'text' => "Passenger: Already done. Thanks for your help."],
        ['start' => 43, 'end' => 47, 'text' => "Flight Attendant: You're welcome. Enjoy your flight."],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])