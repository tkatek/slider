<?php
$content = [
    'video'          => materialAsset(''),
    'thumbnail'      => materialAsset(''),
    'isQuiz'         => 1,
    'showTranscript' => 0,
    'questions'      => [

        [
            'time' => 12000,
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
            'time' => 22000,
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
            'time' => 31000,
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
        ['start' => 0,  'end' => 3,  'text' => "Traveler: Excuse me. Is this the line for security?"],
        ['start' => 3,  'end' => 7,  'text' => "Security Officer: Yes, it is. Please keep your boarding pass ready."],
        ['start' => 7,  'end' => 10, 'text' => "Traveler: Okay."],
        ['start' => 10, 'end' => 11, 'text' => "Security Officer: Laptops and liquids need to come out of your bag."],
        ['start' => 11, 'end' => 15, 'text' => "Traveler: All right. One moment."],
        ['start' => 15, 'end' => 17, 'text' => "Security Officer: Please place your bag in the tray."],
        ['start' => 17, 'end' => 20, 'text' => "Traveler: Do I need to take off my shoes?"],
        ['start' => 20, 'end' => 21, 'text' => "Security Officer: Yes. Shoes and belt, please."],
        ['start' => 21, 'end' => 24, 'text' => "Traveler: Got it."],
        ['start' => 24, 'end' => 25, 'text' => "Security Officer: Step forward when the light turns green."],
        ['start' => 25, 'end' => 26, 'text' => "Traveler: Okay."],
        ['start' => 26, 'end' => 27, 'text' => "Security Officer: Please raise your arms."],
        ['start' => 27, 'end' => 29, 'text' => "Traveler: Sure."],
        ['start' => 29, 'end' => 30, 'text' => "Security Officer: You're all set. You can collect your items."],
        ['start' => 30, 'end' => 34, 'text' => "Traveler: Thank you."],
        ['start' => 34, 'end' => 37, 'text' => "Security Officer: Have a good flight."],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])