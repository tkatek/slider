<?php

$content = [
    'title'    => 'Writing',
    'subtitle' => 'Fill-in with the missing words',

    'instruction'      => '',
    'instruction_note' => 'Listen and complete the answers',

    'card_class' => '[&_.lp-dialogue]:grid-cols-1 sm:[&_.lp-dialogue]:grid-cols-2 [&_.lp-input]:!w-[8.5rem] [&_.lp-input]:!min-w-[7rem]',

    'audio' => materialAsset('slider/A1/Intermediate/chapter-10/audios/slide13.mp3'),

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

    'lines' => [
        [
            'speaker' => 'A',
            'parts' => [
                ['text' => 'Good morning. Can I have your ticket, please?'],
            ],
        ],
        [
            'speaker' => 'B',
            'parts' => [
                ['text' => 'Here '],
                ['blank' => true, 'answer' => 'you are'],
                ['text' => '.'],
            ],
        ],
        [
            'speaker' => 'A',
            'parts' => [
                ['text' => 'May I see your passport, please?'],
            ],
        ],
        [
            'speaker' => 'B',
            'parts' => [
                ['blank' => true, 'answer' => 'Here'],
                ['text' => ' you are.'],
            ],
        ],
        [
            'speaker' => 'A',
            'parts' => [
                ['text' => 'Would you like a window or an aisle seat?'],
            ],
        ],
        [
            'speaker' => 'B',
            'parts' => [
                ['text' => 'An '],
                ['blank' => true, 'answer' => 'aisle seat'],
                ['text' => ', please.'],
            ],
        ],
        [
            'speaker' => 'A',
            'parts' => [
                ['text' => 'Would you like to upgrade to first class?'],
            ],
        ],
        [
            'speaker' => 'B',
            'parts' => [
                ['text' => 'No, '],
                ['blank' => true, 'answer' => 'thank you'],
                ['text' => '.'],
            ],
        ],
        [
            'speaker' => 'A',
            'parts' => [
                ['text' => 'Do you have any baggage?'],
            ],
        ],
        [
            'speaker' => 'B',
            'parts' => [
                ['text' => 'Yes, this '],
                ['blank' => true, 'answer' => 'suitcase'],
                ['text' => ' and this carry-on bag.'],
            ],
        ],
        [
            'speaker' => 'A',
            'parts' => [
                ['text' => "Here's your boarding pass. Have a nice flight."],
            ],
        ],
        [
            'speaker' => 'B',
            'parts' => [
                ['blank' => true, 'answer' => 'Thank you'],
                ['text' => '.'],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])