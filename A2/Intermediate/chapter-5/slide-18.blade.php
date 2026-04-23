<?php
$content = [
    'title'    => 'Listening: Practice 6',
    'subtitle' => 'Listen to Shantel from the United States, talking about what she was doing yesterday, and answer the questions',
    'type' => 'questions_only',
    'image_panel_col_class'  => 'sm:col-span-0',
    'answer_panel_col_class' => 'sm:col-span-12',
    'questions' => [
        [
            'prompt'  => 'What was Shantel doing at 8:00 AM according to her morning routine?',
            'correct' => 'She was teaching a class at work.',
            'options' => [
                'Shantel usually wakes up around 6:00 AM.',
                'At 8:00 AM, Shantel was making a PowerPoint.',
                "Shantel's jokes made everyone laugh.",
                'She was teaching a class at work.',
            ],
            'audio'   => materialAsset('slider/A2/Intermediate/chapter-3/audios/slideX.mp3'),
            'script'  => [
                "Hello. My name is Shantel and I'm from California. Today's question is, what were you doing this morning?",
                'Well, this morning at 6:00, I was still sleeping. I usually wake up around 7:00 AM.',
                'When I wake up, I get dressed, and I brush my teeth, and it only takes me about 20 minutes to get ready for work.',
                "At 8:00, I was teaching a class at work, and my students were very sleepy, so I tried to wake them up and I told some funny jokes, but they didn't laugh.",
                'At 10:00, I was sitting at my desk making a PowerPoint for a lesson. So, I wasn’t teaching at that time.',
                'What about you? What were you doing this morning?',
            ],
        ],
        [
            'prompt'  => 'What was Shantel doing at 10:00 AM?',
            'correct' => 'Shantel was making a PowerPoint at 10:00 AM.',
            'options' => [
                'Shantel was making a PowerPoint at 10:00 AM.',
                'Shantel was teaching at 10:00 AM.',
                'Shantel was sleeping at 8:00 AM.',
            ],
            'audio'   => materialAsset('slider/A2/Intermediate/chapter-3/audios/slideX.mp3'),
            'script'  => [
                "Hello. My name is Shantel and I'm from California. Today's question is, what were you doing this morning?",
                'Well, this morning at 6:00, I was still sleeping. I usually wake up around 7:00 AM.',
                'When I wake up, I get dressed, and I brush my teeth, and it only takes me about 20 minutes to get ready for work.',
                "At 8:00, I was teaching a class at work, and my students were very sleepy, so I tried to wake them up and I told some funny jokes, but they didn't laugh.",
                'At 10:00, I was sitting at my desk making a PowerPoint for a lesson. So, I wasn’t teaching at that time.',
                'What about you? What were you doing this morning?',
            ],
        ],
        [
            'prompt'  => 'At what time did Shantel start teaching her class in the morning?',
            'correct' => '8:00 AM',
            'options' => [
                '8:00 AM',
                '6:00 AM',
                '10:00 AM',
            ],
            'audio'   => materialAsset('slider/A2/Intermediate/chapter-3/audios/slideX.mp3'),
            'script'  => [
                "Hello. My name is Shantel and I'm from California. Today's question is, what were you doing this morning?",
                'Well, this morning at 6:00, I was still sleeping. I usually wake up around 7:00 AM.',
                'When I wake up, I get dressed, and I brush my teeth, and it only takes me about 20 minutes to get ready for work.',
                "At 8:00, I was teaching a class at work, and my students were very sleepy, so I tried to wake them up and I told some funny jokes, but they didn't laugh.",
                'At 10:00, I was sitting at my desk making a PowerPoint for a lesson. So, I wasn’t teaching at that time.',
                'What about you? What were you doing this morning?',
            ],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])
