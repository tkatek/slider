<?php
$content = [
    'video'     => materialAsset('slider/A2/Advanced/chapter-5/'),
    'thumbnail' => materialAsset('slider/A2/Advanced/chapter-6/img/slide8.webp'),
    'isQuiz'    => 1,

    'questions' => [
        [
            'time'           => 34,
            'type'           => 'multiple_choice',
            'question'       => 'What is an immigrant?',
            'options'        => [
                'A person who moves to a new country',
                'A person who stays at home',
                'A person who likes to sleep',
            ],
            'correct_answer' => 'A person who moves to a new country',
            'points'         => 1,
        ],
        [
            'time'           => 55,
            'type'           => 'multiple_choice',
            'question'       => 'How do people feel when they move?',
            'options'        => [
                'Only happy',
                'Many different feelings, like excited and nervous',
                'They feel nothing',
            ],
            'correct_answer' => 'Many different feelings, like excited and nervous',
            'points'         => 1,
        ],
        [
            'time'           => 74,
            'type'           => 'multiple_choice',
            'question'       => 'Why do some people move to a new country?',
            'options'        => [
                'To be with family',
                'To buy a toy',
                'To watch TV',
            ],
            'correct_answer' => 'To be with family',
            'points'         => 1,
        ],
        [
            'time'           => 99,
            'type'           => 'multiple_choice',
            'question'       => 'Moving to a new country is like...',
            'options'        => [
                'Eating an apple',
                'Starting a new school',
                'Sleeping in a bed',
            ],
            'correct_answer' => 'Starting a new school',
            'points'         => 1,
        ],
        [
            'time'           => 124,
            'type'           => 'multiple_choice',
            'question'       => 'What do all people want?',
            'options'        => [
                'To be safe and belong',
                'To have a big car',
                'To be angry',
            ],
            'correct_answer' => 'To be safe and belong',
            'points'         => 1,
        ],
        [
            'time'           => 148,
            'type'           => 'multiple_choice',
            'question'       => 'What helps a new person feel welcome?',
            'options'        => [
                'Being mean',
                'Being kind',
                'Saying nothing',
            ],
            'correct_answer' => 'Being kind',
            'points'         => 1,
        ],
        [
            'time'           => 162,
            'type'           => 'multiple_choice',
            'question'       => 'What does "use your noggin" mean?',
            'options'        => [
                'Use your feet',
                'Use your brain and think',
                'Use your hands',
            ],
            'correct_answer' => 'Use your brain and think',
            'points'         => 1,
        ],
    ],

    'subtitles'  => [
        ['start' => 0,   'end' => 6,   'text' => 'Hey there! Have you ever moved to a new house or been the new kid at school?'],
        ['start' => 6,   'end' => 13,  'text' => 'Maybe you felt excited. Maybe you felt nervous. Maybe you felt both at the same time.'],
        ['start' => 13,  'end' => 19,  'text' => 'That mix of feelings is pretty common when something in life changes.'],

        ['start' => 19,  'end' => 26,  'text' => 'Sometimes it\'s a really big change, like moving to a different country.'],
        ['start' => 26,  'end' => 34,  'text' => 'When a person moves to a new country to live there, that\'s called immigrating. A person who does that is called an immigrant.'],

        ['start' => 34,  'end' => 41,  'text' => 'There isn\'t just one reason people immigrate.'],
        ['start' => 41,  'end' => 50,  'text' => 'People may immigrate to a new country to join loved ones, find new opportunities, or feel safer.'],
        ['start' => 50,  'end' => 55,  'text' => 'Sometimes it\'s a choice, and sometimes it isn\'t.'],

        ['start' => 55,  'end' => 63,  'text' => 'Moving to a new country can feel a lot like starting at a new school.'],
        ['start' => 63,  'end' => 71,  'text' => 'You might not know the routines yet. You might hear new sounds and new words.'],
        ['start' => 71,  'end' => 79,  'text' => 'Or you might miss what feels comfortable and familiar.'],
        ['start' => 79,  'end' => 88,  'text' => 'And at the same time, you might feel hopeful, or excited, or proud, for trying something new.'],

        ['start' => 88,  'end' => 98,  'text' => 'Immigrants are kids, parents, grandparents, doctors, teachers, and neighbors.'],
        ['start' => 98,  'end' => 104, 'text' => 'They\'re part of our schools and communities.'],
        ['start' => 104, 'end' => 114, 'text' => 'No matter where someone comes from, or where they move, we all want the same things:'],
        ['start' => 114, 'end' => 124, 'text' => 'to be safe, to be cared for, to belong.'],

        ['start' => 124, 'end' => 132, 'text' => 'Starting somewhere new can feel scary sometimes, and kindness can help people feel welcome.'],
        ['start' => 132, 'end' => 140, 'text' => 'Use your noggin to think about these two questions:'],
        ['start' => 140, 'end' => 149, 'text' => 'Do you know someone who moved from one place to another, maybe even from another country?'],
        ['start' => 149, 'end' => 157, 'text' => 'What can you do to help them feel like they belong?'],

        ['start' => 157, 'end' => 165, 'text' => 'When we welcome others, we make our communities better.'],
        ['start' => 165, 'end' => 174, 'text' => 'When someone is new, they bring stories, traditions, and ideas from where they came from.'],
        ['start' => 174, 'end' => 182, 'text' => 'We can learn from them, and they can learn from us, too.'],

        ['start' => 182, 'end' => 188, 'text' => 'That\'s it for today. Thanks for learning with us.'],
        ['start' => 188, 'end' => 192, 'text' => 'We\'ll see you next time.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])