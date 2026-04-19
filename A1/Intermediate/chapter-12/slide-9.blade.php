<?php
$content = [
    'video'          => materialAsset('slider/A1/Intermediate/chapter-12/video/in-plane-encrypted/in-plane.m3u8'),
    'thumbnail'      => materialAsset('slider/A1/Intermediate/chapter-12/video/thumbnail.webp'),
    'isQuiz'         => 1, // 1 show question / 0 don't
    'showTranscript' => 0,

    'questions'      => [
        [
            'time' => 5600,
            'type' => 'multiple_choice',
            'question' => 'What should a passenger do to find their seat on a plane?',
            'options' => [
                'Ask the flight attendant to assign a seat.',
                'Choose any available seat upon boarding.',
                'Check the boarding pass for the seat location.',
            ],
            'correct_answer' => 2,
            'points' => 10
        ],

        [
            'time' => 23600,
            'type' => 'multiple_choice',
            'question' => "Where is Mr. Taylor's seat located on the plane?",
            'options' => [
                '14A on the right by the aisle.',
                '14B on the left by the window.',
                '14A on the left by the window.',
            ],
            'correct_answer' => 2,
            'points' => 10
        ],

        [
            'time' => 33100,
            'type' => 'multiple_choice',
            'question' => 'What should a passenger do with their phone before takeoff?',
            'options' => [
                'Set the phone to airplane mode.',
                'Ensure the phone is charging.',
                'Use Wi-Fi for phone calls.',
            ],
            'correct_answer' => 0,
            'points' => 10
        ],
    ],

    'subtitles' => [
        ['start' => 0, 'end' => 4, 'text' => "Flight Attendant: Good morning. Welcome aboard. May I see your boarding pass, please?"],
        ['start' => 4, 'end' => 5.5, 'text' => "Passenger: Good morning. Yes, here it is."],
        ['start' => 9.2, 'end' => 11.8, 'text' => "Flight Attendant: Thank you, Mr. Taylor. You're in seat 14A."],
        ['start' => 12, 'end' => 13.7, 'text' => "Flight Attendant: That's on the left side by the window."],
        ['start' => 13.7, 'end' => 18.7, 'text' => "Passenger: Got it. Thank you. Is there still space in the overhead bin for my bag?"],
        ['start' => 18.7, 'end' => 22, 'text' => "Flight Attendant: Yes, there should be. If not, just let me know."],
        ['start' => 22, 'end' => 23.5, 'text' => "Flight Attendant: And I'll help you find space."],
        ['start' => 24.5, 'end' => 27, 'text' => "Passenger: Perfect. Thanks. Is this a full flight today?"],
        ['start' => 27.7, 'end' => 30.7, 'text' => "Flight Attendant: Yes, it's almost full. We're just waiting on a few more passengers."],
        ['start' => 30.7, 'end' => 33, 'text' => "Flight Attendant: Please make sure your phone is in airplane mode."],
        ['start' => 34.5, 'end' => 35, 'text' => "Passenger: Thanks for your help."],
        ['start' => 36.5, 'end' => 38, 'text' => "Flight Attendant: You're welcome. Enjoy your flight."],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])