<?php

$content = [
    'title' => 'Listening',
    'subtitle' => ' Listen to these two  conversations  and answer the questions',
    'audio' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide11.mp3'), 
    'tabs' => [
        ['id' => 'empty', 'label' => 'Listen'],
        ['id' => 'script', 'label' => 'Script'],
        ['id' => 'grammar', 'label' => 'Grammar'],
        ['id' => 'quiz', 'label' => 'Quiz'],
        ['id' => 'puzzle', 'label' => 'Puzzle'],
    ],

    'script' => [
        [
            'topic' => 'Conversation 1',
            'dialogue' => [
                ['speaker' => 'Man', 'text' => 'Do you play sports?'],
                ['speaker' => 'Woman', 'text' => 'I used to play sports in high school.'],
                ['speaker' => 'Man', 'text' => 'Yeah, I used to play, too.'],
                ['speaker' => 'Woman', 'text' => 'Why did you stop?'],
                ['speaker' => 'Man', 'text' => 'No time, I guess.'],
                ['speaker' => 'Woman', 'text' => 'Yeah, I used to have so much free time.'],
                ['speaker' => 'Man', 'text' => 'Me too! I miss those days.'],
                ['speaker' => 'Woman', 'text' => 'What sports did you play?'],
                ['speaker' => 'Man', 'text' => 'Baseball and basketball. I used to be pretty good, not anymore, though.'],
                ['speaker' => 'Woman', 'text' => 'Yeah, we all get older.'],
            ],
        ],
        [
            'topic' => 'Conversation 2',
            'dialogue' => [
                ['speaker' => 'Man', 'text' => 'Do you speak any foreign languages?'],
                ['speaker' => 'Woman', 'text' => 'I speak French a little. I used to use it all the time, but not anymore.'],
                ['speaker' => 'Man', 'text' => 'Really? Why is that?'],
                ['speaker' => 'Woman', 'text' => 'Well, I used to work for a French company, and then I changed jobs.'],
                ['speaker' => 'Man', 'text' => 'Oh, really? I didn’t know that.'],
                ['speaker' => 'Woman', 'text' => 'Yeah, it was a lot of fun. I used to go to France once a year for work.'],
                ['speaker' => 'Man', 'text' => 'Lucky you! I love France.'],
                ['speaker' => 'Woman', 'text' => 'Yeah, France is a lot of fun.'],
            ],
        ],
    ],

    'grammar' => [
        [
            'title' => 'Used to + base verb',
            'explanation' => 'We use used to + base verb to talk about past habits or past situations that are not true now.',
            'examples' => [
                'I used to play sports in high school.',
                'I used to work for a French company.',
                'I used to go to France once a year for work.',
            ],
        ],
        [
            'title' => 'Point 1: Present activities',
            'explanation' => 'We often use used to when asked about present activities.',
            'examples' => [
                [
                    'question' => 'Do you play golf?',
                    'answers' => [
                        "I used to play but not anymore. I don't have time.",
                    ],
                ],
                [
                    'question' => 'Do you play any instruments?',
                    'answers' => [
                        'Not really. I used to play the guitar but not anymore.',
                    ],
                ],
            ],
        ],
        [
            'title' => 'Point 2: Not anymore',
            'explanation' => 'We often use the phrase not anymore to show that the action does not happen now.',
            'examples' => [
                [
                    'question' => 'Do you cook much?',
                    'answers' => [
                        'Not anymore. I used to though.',
                    ],
                ],
                [
                    'question' => 'Do you see your friend from school?',
                    'answers' => [
                        'Not really. We used to meet once a week but now we are too busy with life.',
                    ],
                ],
            ],
        ],
        [
            'title' => 'Point 3: Short answers with used to',
            'explanation' => 'In a Yes/No question, we can omit the main verb and reply with used to + but + a reason.',
            'examples' => [
                [
                    'question' => 'Do you study French?',
                    'answers' => [
                        'I used to but I gave up.',
                    ],
                ],
                [
                    'question' => 'Do you and your family travel much?',
                    'answers' => [
                        "We used to but now we don't have time.",
                    ],
                ],
            ],
        ],
    ],

    'quiz' => [
        [
            'question' => 'Why did they stop playing sports?',
            'options' => ['No time', 'No money'],
            'correct_answer' => 0,
        ],
        [
            'question' => 'Where did she use French?',
            'options' => ['At work', 'In France'],
            'correct_answer' => 0,
        ],
        [
            'question' => 'She used to ____.',
            'options' => ['have parties', 'be fun'],
            'correct_answer' => 1,
        ],
        [
            'question' => 'She used to _____.',
            'options' => ['speak Spanish at work', 'have a friend from Spain'],
            'correct_answer' => 0,
        ],
    ],

    'puzzle' => [
        'instruction' => 'Faites glisser les boîtes dans les espaces vides.',
        'activities' => [
            [
                'title' => 'Conversation 1',
                'word_bank' => ['free', 'stop', 'guess', 'older', 'miss', 'basketball', 'too', 'high', 'play'],
                'gaps' => [
                    ['sentence' => 'Man: Do you {{1}} sports?', 'correct' => 'play'],
                    ['sentence' => 'Woman: I used to play sports in {{2}} school.', 'correct' => 'high'],
                    ['sentence' => 'Man: Yeah, I used to play {{3}}.', 'correct' => 'too'],
                    ['sentence' => 'Woman: Why did you {{4}}?', 'correct' => 'stop'],
                    ['sentence' => 'Man: No time, I {{5}}.', 'correct' => 'guess'],
                    ['sentence' => 'Woman: Yeah, I used to have so much {{6}} time.', 'correct' => 'free'],
                    ['sentence' => 'Man: Me too! I {{7}} those days.', 'correct' => 'miss'],
                    ['sentence' => 'Man: Baseball and {{8}}. I used to be pretty good. Not anymore though.', 'correct' => 'basketball'],
                    ['sentence' => 'Woman: Yeah, we all get {{9}}.', 'correct' => 'older'],
                ],
            ],
            [
                'title' => 'Conversation 2',
                'word_bank' => ['once', 'foreign', 'used', 'fun', 'company', 'know', 'use', 'Lucky'],
                'gaps' => [
                    ['sentence' => 'Man: Do you speak any {{1}} languages?', 'correct' => 'foreign'],
                    ['sentence' => 'Woman: I speak French a little. I used to {{2}} it all the time, but not anymore.', 'correct' => 'use'],
                    ['sentence' => 'Woman: Well, I {{3}} to work for a French company, and then I changed jobs.', 'correct' => 'used'],
                    ['sentence' => 'Woman: Well, I used to work for a French {{4}}, and then I changed jobs.', 'correct' => 'company'],
                    ['sentence' => "Man: Oh, really? I didn't {{5}} that.", 'correct' => 'know'],
                    ['sentence' => 'Woman: Yeah, it was a lot of {{6}}. I used to go to France once a year for work.', 'correct' => 'fun'],
                    ['sentence' => 'Woman: Yeah, it was a lot of fun. I used to go to France {{7}} a year for work.', 'correct' => 'once'],
                    ['sentence' => 'Man: {{8}} you! I love France.', 'correct' => 'Lucky'],
                ],
            ],
        ],
    ],
];

?>

@include("slider.game.audio-multi-activities", ['content' => $content])
