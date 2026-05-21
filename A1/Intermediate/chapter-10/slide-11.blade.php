<?php

$content = [
    'title'       => 'Listen again and answer these questions',
    'subtitle'    => '',
    'title_class' => 'text-3xl md:text-4xl lg:text-5xl',

    'instruction'      => '',
    'instruction_note' => 'Complete the answers from the conversation',

    'grid_class' => 'grid-cols-1 sm:grid-cols-2',

    'audio' => materialAsset('slider/A1/Intermediate/chapter-10/audios/slide10.mp3'),

    'transcript' => [
        "Check-in clerk: Can I have your ticket and passport, please?",
        "Daan: Yes, of course. Here you are.",
        "Check-in clerk: Did you pack your bags yourself?",
        "Daan: Yes.",
        "Check-in clerk: How many bags are you checking in?",
        "Daan: Just one. I’m taking this hand luggage.",
        "Check-in clerk: Are there any sharp items in your hand luggage?",
        "Daan: No, there aren’t.",
        "Check-in clerk: Would you like an aisle seat or a window seat?",
        "Daan: A window seat if possible, please.",
        "Check-in clerk: OK. Here you go. This is your boarding card. The flight leaves at 1.20. Go to Gate 17 around 12.30. Have a nice flight.",
        "Daan: Thank you.",
    ],

    'lines' => [
        [
            'speaker' => 'A',
            'parts' => [
                ['text' => 'When does the flight leave?'],
            ],
        ],
        [
            'speaker' => 'B',
            'parts' => [
                ['blank' => true, 'answer' => '1.20'],
            ],
        ],
        [
            'speaker' => 'A',
            'parts' => [
                ['text' => 'What Gate does Daan need to go to?'],
            ],
        ],
        [
            'speaker' => 'B',
            'parts' => [
                ['blank' => true, 'answer' => 'Gate 17'],
            ],
        ],
        [
            'speaker' => 'A',
            'parts' => [
                ['text' => 'What time should he go to the gate?'],
            ],
        ],
        [
            'speaker' => 'B',
            'parts' => [
                ['blank' => true, 'answer' => '12.30'],
            ],
        ],
    ],
];

?>

@include('slider.game.listening-missing-word', ['content' => $content])