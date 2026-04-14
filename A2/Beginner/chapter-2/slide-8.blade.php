<?php
$content = [
    'title'    => 'Listening:  Practice 3',
    'subtitle' => 'Listen to the conversation and answer the questions',
    'type'     => 'audio',

    'audio' => materialAsset('slider/A2/Beginner/chapter-2/audios/slide8.mp3'),

    'image_panel_col_class'  => 'sm:col-span-0',
    'answer_panel_col_class' => 'sm:col-span-12',

    'script' => [
        'Todd: Hey, Marika!',
        'Marika: Hey!',
        'Todd: How you doing?',
        'Marika: I\'m OK. How are you?',
        'Todd: Good. Marika do you like summer?',
        'Marika: No, I don\'t like summer it\'s my least favorite summer.',
        'Todd: Wow, why?',
        'Marika: Because I don\'t like hot weather. I don\'t like being hot and sweaty and uncomfortable.',
        'Todd: OK. Well, it\'s pretty hot in Japan so you must not like summer here.',
        'Marika: No, I don\'t.',
        'Todd: Is it hot in summer where you\'re from?',
        'Marika: Yeah, it\'s pretty hot but usually we go away on the weekends to cottages and we go swimming in lakes and stuff.',
        'Todd: Oh, that\'s nice. Where are you from by the way?',
        'Marika: Canada.',
        'Todd: So, what\'s your favorite season?',
        'Marika: Winter or fall.',
        'Todd: OK. Well, what do you do in the winter?',
        'Marika: In the winter, activities you mean?',
        'Todd: Yeah.',
        'Marika: I go snowboarding and I go to onsens and I walk around and I enjoy the cold weather.',
    ],

    'questions' => [
        [
            'prompt'  => 'Why does she not like summer?',
            'correct' => 'Both',
            'options' => [
                'Too hot',
                'Too sweaty',
                'Both',
            ],
        ],
        [
            'prompt'  => 'How does she feel about Japanese summer?',
            'correct' => 'She does not like it',
            'options' => [
                'She does not like it',
                'It is better than in Canada',
                'She does not say',
            ],
        ],
        [
            'prompt'  => 'What does she do a lot in summer?',
            'correct' => 'Go to lakes',
            'options' => [
                'Stay indoors',
                'Go to lakes',
                'Eat ice',
            ],
        ],
        [
            'prompt'  => 'What is her favorite season?',
            'correct' => 'Both',
            'options' => [
                'Winter',
                'Fall',
                'Both',
            ],
        ],
        [
            'prompt'  => 'What does she do in Winter?',
            'correct' => 'Go to onsens',
            'options' => [
                'Go to onsens',
                'Go snow boarding',
                'Both',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
