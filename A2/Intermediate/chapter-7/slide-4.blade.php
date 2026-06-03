<?php
$content = [
    'video'      => materialAsset('slider/A2/Intermediate/chapter-7/video/party-encrypted/party.m3u8'),
    'thumbnail'  => materialAsset('slider/A2/Intermediate/chapter-7/img/slide4.webp'),
    'isQuiz'     => 0,
    'questions' => [
        [
            'time' => 25500,
            'type' => 'multiple_choice',
            'question' => 'Why will Steve and Anna arrive late to the party?',
            'options' => [
                'They are studying',
                'They are working',
                'They are having dinner',
                'They are traveling',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 38500,
            'type' => 'multiple_choice',
            'question' => 'Why is John not going to the party?',
            'options' => [
                'He is sick',
                'He is visiting family',
                'He is studying for a test',
                'He is going to a concert',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 69500,
            'type' => 'multiple_choice',
            'question' => 'What is Marcus going to do in Australia?',
            'options' => [
                'Work in a bank',
                'Study at a university',
                'Travel around the country',
                'Visit his family',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],

    ],
    'subtitles'  => [
        ['start' => 0,   'end' => 5,   'text' => 'So, are you guys going to Gus’s party on Saturday?'],
        ['start' => 5,   'end' => 7,   'text' => 'Yes, Steve and I will be there.'],
        ['start' => 7,   'end' => 10,  'text' => 'But I think we’ll be late. Do you think that’ll be ok?'],
        ['start' => 11,  'end' => 16.5,  'text' => 'I think so. He told me that most people are going to show up around 7.'],
        ['start' => 16.8,  'end' => 18.5,  'text' => 'Ok, great.'],
        ['start' => 19,  'end' => 25,  'text' => 'We’re going out for dinner with Steve’s parents at 6, so we will probably arrive just after 9.'],
        ['start' => 26,  'end' => 29,  'text' => 'John, are you going to Gus’s party?'],
        ['start' => 31.5,  'end' => 35.5,  'text' => 'No, I’m going to be studying for my midterm test on Saturday.'],
        ['start' => 36,  'end' => 38,  'text' => 'The test is on Monday.'],
        ['start' => 40,  'end' => 41,  'text' => 'Who will be going?'],
        ['start' => 41.5,  'end' => 45,  'text' => 'Well, I would guess that around 10 people will be there.'],
        ['start' => 46,  'end' => 48,  'text' => 'Will Sally be there?'],
        ['start' => 48,  'end' => 51.5,  'text' => 'Yes, she’s coming. But she’s going to bring her new boyfriend.'],
        ['start' => 52,  'end' => 54,  'text' => 'Boyfriend? Oh well.'],
        ['start' => 54.7,  'end' => 59.5,  'text' => 'Anyway… Marcus, are you still going to Australia next week?'],
        ['start' => 59.7,  'end' => 69,  'text' => "Yes! I'm flying next Thursday, and I'm going to spend the first few days in Sydney and then I'm going to rent a caravan and tour around the country."],
        ['start' => 70.5,  'end' => 73.5,  'text' => 'Cool! How long are you going to be gone?'],
        ['start' => 74,  'end' => 80,  'text' => 'I just quit my job at the bank so I will have plenty of time to enjoy a long vacation.'],
        ['start' => 80,  'end' => 84,  'text' => "I think it's going to be an incredible trip so I will stay as long as I can."],
        ['start' => 84,  'end' => 89.5, 'text' => 'What about you, John? What are you going to do after you graduate?'],
        ['start' => 89.7, 'end' => 94, 'text' => "Maybe I'll take a vacation too. I don't know. I'll decide then."],

    ],
];
?>
@include("slider.video.interactive", ['content' => $content])