<?php
$content = [
    'video'          => materialAsset('slider/A1/Intermediate/chapter-11/video/security-check-encrypted/security-check.m3u8'),
    'thumbnail'      => materialAsset('slider/A1/Intermediate/chapter-11/video/thumbnail.webp'),
    'isQuiz'         => 1,
    'showTranscript' => 0,
    'questions'      => [

        [
            'time' => 11600,
            'type' => 'multiple_choice',
            'question' => '1- What should a traveler do with laptops and liquids at airport security?',
            'options' => [
                'Place laptops and liquids in a tray.',
                'Keep shoes on during screening.',
                'Board without showing a pass.',
            ],
            'correct_answer' => 0,
            'points' => 10
        ],

        [
            'time' => 26800,
            'type' => 'multiple_choice',
            'question' => '2- What should travelers do to comply with airport security procedures?',
            'options' => [
                'Keep your shoes on during security checks.',
                'Remove shoes and belt, and separate laptops/liquids.',
                'Do not separate laptops from your bag.',
                'Wait for a red light to proceed.',
            ],
            'correct_answer' => 1,
            'points' => 10
        ],

        [
            'time' => 36200,
            'type' => 'multiple_choice',
            'question' => '3- At an airport security checkpoint, what should a traveler do with their bag and shoes?',
            'options' => [
                'Place the bag in the tray and remove shoes and belt.',
                'Keep shoes on and hold the bag during the scan.',
                'Take out electronics but leave liquids inside.',
            ],
            'correct_answer' => 0,
            'points' => 10
        ],
    ],

    'subtitles' => [
        ['start' => 0,  'end' => 3.5,  'text' => "Traveler: Excuse me. Is this the line for security?"],
        ['start' => 3.5,  'end' => 5.5,  'text' => "Security Officer: Yes, it is. Please keep your boarding pass ready."],
        ['start' => 6,  'end' => 7, 'text' => "Traveler: Okay."],
        ['start' => 7.5, 'end' => 10, 'text' => "Security Officer: Laptops and liquids need to come out of your bag."],
        ['start' => 10, 'end' => 11.5, 'text' => "Traveler: All right. One moment."],
        ['start' => 12, 'end' => 14, 'text' => "Security Officer: Please place your bag in the tray."],
        ['start' => 21.5, 'end' => 23, 'text' => "Traveler: Do I need to take off my shoes?"],
        ['start' => 23, 'end' => 25.5, 'text' => "Security Officer: Yes. Shoes and belt, please."],
        ['start' => 25.5, 'end' => 26.5, 'text' => "Traveler: Got it."],
        ['start' => 29.5, 'end' => 31, 'text' => "Is this ready to go."],
        ['start' => 31.3, 'end' => 34, 'text' => "Security Officer: Step forward when the light turns green."],
        ['start' => 35, 'end' => 36, 'text' => "Traveler: Okay, Thank you"],
        ['start' => 38, 'end' => 39.5, 'text' => "Security Officer: Thank you, Clear to proceed"],
        ['start' => 43.8, 'end' => 45, 'text' => "Security Officer: Please raise your arms."],
        ['start' => 45, 'end' => 45.5, 'text' => "Traveler: Sure."],
        ['start' => 47, 'end' => 49, 'text' => "Security Officer: You're all set. You can collect your items."],
        ['start' => 49, 'end' => 50, 'text' => "Traveler: Thank you."],
        ['start' => 50, 'end' => 52, 'text' => "Security Officer: Have a good flight."],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])
