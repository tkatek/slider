<?php
$content = [
    'title' => 'Listening',
    'type' => 'audio',
    'subtitle' => 'TWO  People are checking into a hotel. What do
they have to do?',
    'audio' => materialAsset('slider/A1/Advanced/chapter-1/audios/slide10.mp3'),
    'status_row_width' => 'max-w-4xl',
    'game_card_width' => 'max-w-4xl',

    'script' => [
        '1.',
        'A: Hello. My name’s Bill Sampson. I have a reservation.',
        'B: Just a moment please, Mr. Sampson. Ah, yes. Would you mind filling out this form please?',
        'A: Thanks.',
        'B: Could I also see your passport?',
        'A: Here it is.',
        'B: Thank you. Will you be paying by credit card?',
        'A: Yes. I have it right here.',
        'B: Thank you.',

        '2.',
        'A: Yes, I’d like to check in, please.',
        'B: Certainly, do you have a reservation with us?',
        'A: Yes, the name’s Peter Fox.',
        'B: That’s funny. I can’t find your name in the computer. Do you have your confirmation number?',
        'A: Yes, it’s 6913.',
        'B: Oh, I see. Sorry. Your name was spelled wrong. And could I see your passport, please?',
        'A: Here you are.',
        'B: Okay. How will you be paying for your room?',
        'A: I’ll pay cash.',
        'B: In that case I’ll have to ask you for a deposit.',
        'A: That’s fine.',
    ],

    'questions' => [
        [
            'prompt' => 'Dialogue 1: What does Bill Sampson do? (Choose all correct answers)',
            'correct' => [
                'fill out a form',
                'show a passport',
                'give the receptionist his credit card',
            ],
            'options' => [
                'fill out a form',
                'show a driver’s license',
                'show a passport',
                'pay a deposit',
                'give the receptionist his credit card',
            ],
        ],
        [
            'prompt' => 'Dialogue 2: What does Peter Fox do? (Choose all correct answers)',
            'correct' => [
                'give the confirmation number',
                'show a passport',
                'leave a deposit',
            ],
            'options' => [
                'give the confirmation number',
                'show a driver’s license',
                'show a passport',
                'pay cash for the room',
                'leave a deposit',
            ],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])