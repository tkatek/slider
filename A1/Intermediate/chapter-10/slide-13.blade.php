<?php
$content = [

    'page_title' => 'Writing',
    'title'      => 'Writing',
    'subtitle'      => 'Fill-in with the missing words',
     'audio'      => materialAsset('slider/A1/Intermediate/chapter-10/audios/slide13.mp3'),

    'transcript' => [
        'Check-in agent: Good morning. Can I have your ticket, please?',
        'Passenger: Here you are.',
        'Check-in agent: May I see your passport, please?',
        'Passenger: Here you are.',
        'Check-in agent: Would you like a window or an aisle seat?',
        'Passenger: An aisle seat, please.',
        'Check-in agent: Would you like to upgrade to first class?',
        'Passenger: No, thank you.',
        'Check-in agent: Do you have any baggage?',
        'Passenger: Yes, this suitcase and this carry-on bag.',
        "Check-in agent: Here's your boarding pass. Have a nice flight.",
        'Passenger: Thank you.',
    ],

    'questions' => [
        [
            'number' => 1,
            'prompt' => 'Good morning. Can I have your ticket, please?',
            'type' => 'missing_words',
            'sentence' => 'Here {{1}}.',
            'blanks' => [
                [
                    'answer' => 'you are',
                    'placeholder' => '',
                    'label' => 'Answer phrase',
                ],
            ],
        ],
        [
            'number' => 2,
            'prompt' => 'May I see your passport, please?',
            'type' => 'missing_words',
            'sentence' => '{{1}} you are.',
            'blanks' => [
                [
                    'answer' => 'Here',
                    'placeholder' => '',
                    'label' => 'Answer word',
                ],
            ],
        ],
        [
            'number' => 3,
            'prompt' => 'Would you like a window or an aisle seat?',
            'type' => 'missing_words',
            'sentence' => 'An {{1}}, please.',
            'blanks' => [
                [
                    'answer' => 'aisle seat',
                    'placeholder' => '',
                    'label' => 'Seat type',
                ],
            ],
        ],
        [
            'number' => 4,
            'prompt' => 'Would you like to upgrade to first class?',
            'type' => 'missing_words',
            'sentence' => 'No, {{1}}.',
            'blanks' => [
                [
                    'answer' => 'thank you',
                    'placeholder' => '',
                    'label' => 'Polite refusal',
                ],
            ],
        ],
        [
            'number' => 5,
            'prompt' => 'Do you have any baggage?',
            'type' => 'missing_words',
            'sentence' => 'Yes, this {{1}} and this carry-on bag.',
            'blanks' => [
                [
                    'answer' => 'suitcase',
                    'placeholder' => '',
                    'label' => 'Baggage item',
                ],
            ],
        ],
        [
            'number' => 6,
            'prompt' => "Here's your boarding pass. Have a nice flight.",
            'type' => 'missing_words',
            'sentence' => '{{1}}.',
            'blanks' => [
                [
                    'answer' => 'Thank you',
                    'placeholder' => '',
                    'label' => 'Closing response',
                ],
            ],
        ],
    ],
];
?>

@include('slider.listening.listening-type-answer', ['content' => $content])
