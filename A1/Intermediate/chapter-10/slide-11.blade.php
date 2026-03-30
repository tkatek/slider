{{-- resources/views/slider/slide-sickness-mcq.blade.php --}}
<?php
$content = [
    'uid'        => 'listen_' . substr(md5(uniqid('', true)), 0, 10),

    'page_title' => 'Listen again and answer these questions',
    'title'      => 'Listen again and answer these questions',
    'subtitle'   => '',

    'audio'      => materialAsset('slider/A1/Intermediate/chapter-10/audios/slide10.mp3'),

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

    'questions' => [
        [
            'number'      => 1,
            'prompt'      => 'When does the flight leave?',
            'answer'      => '1.20',
            'placeholder' => 'Write your answer...',
        ],
        [
            'number'      => 2,
            'prompt'      => 'What Gate does Daan need to go to?',
            'answer'      => 'Gate 17',
            'placeholder' => 'Write your answer...',
        ],
        [
            'number'      => 3,
            'prompt'      => 'What time should he go to the gate?',
            'answer'      => '12.30',
            'placeholder' => 'Write your answer...',
        ],

    ],
];
?>

@include('slider.listening.listening-type-answer', ['content' => $content])
