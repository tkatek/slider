<?php
$content = [
    'title' => 'Conversation Corner',
    'subtitle' => 'Asking for reasons',

    'instruction' => 'Listen to the conversation, Write the missing words.',
    'instruction_note' => 'Practice the conversation with a partner. Be sure to use the correct intonation.',

    'audio' => materialAsset('slider/B1/Beginner/chapter-3/audios/slide12.mp3'),

    'transcript' => [
        'A: Where were you this afternoon? You were supposed to meet me for lunch.',
        'B: I’m so sorry. I was at a doctor’s appointment. I thought I would be out of there by noon, but the appointment took a long time.',
        'A: Oh, are you okay?',
        'B: I’m fine. It was just a check-up. Did you get the movie tickets for tonight?',
        'A: No, I didn’t. I’m sorry. I couldn’t get online at home.',
        'B: Is something wrong with your Internet connection?',
        'A: I think so. Sometimes I can’t get a connection.',
    ],

    'script' => [
        'A: Where were you this afternoon? You were supposed to meet me for lunch.',
        'B: I’m so sorry. I was at a doctor’s appointment. I thought I would be out of there by noon, but the appointment took a long time.',
        'A: Oh, are you okay?',
        'B: I’m fine. It was just a check-up. Did you get the movie tickets for tonight?',
        'A: No, I didn’t. I’m sorry. I couldn’t get online at home.',
        'B: Is something wrong with your Internet connection?',
        'A: I think so. Sometimes I can’t get a connection.',
    ],

    'lines' => [
        [
            'speaker' => 'A',
            'parts' => [
                ['blank' => true, 'answer' => 'Where were you'],
                ['text' => ' this afternoon? You were supposed to meet me for lunch.'],
            ],
        ],
        [
            'speaker' => 'B',
            'parts' => [
                ['text' => 'I’m so sorry. I was at a doctor’s appointment. I thought I would be out of there by noon, but the appointment took a long time.'],
            ],
        ],
        [
            'speaker' => 'A',
            'parts' => [
                ['text' => 'Oh, '],
                ['blank' => true, 'answer' => 'are you okay'],
                ['text' => '?'],
            ],
        ],
        [
            'speaker' => 'B',
            'parts' => [
                ['text' => 'I’m fine. It was just a check-up. Did you get the movie tickets for tonight?'],
            ],
        ],
        [
            'speaker' => 'A',
            'parts' => [
                ['text' => 'No, I didn’t. I’m sorry. I couldn’t get online at home.'],
            ],
        ],
        [
            'speaker' => 'B',
            'parts' => [
                ['blank' => true, 'answer' => 'Is something wrong'],
                ['text' => ' with your Internet connection?'],
            ],
        ],
        [
            'speaker' => 'A',
            'parts' => [
                ['text' => 'I think so. Sometimes I can’t get a connection.'],
            ],
        ],
    ],
];
?>

@include('slider.game.listening-missing-word', ['content' => $content])