<?php
$content = [
    'video'     => materialAsset('slider/A2/Advanced/chapter-6/video/immegration-encrypted/immegration.m3u8'),
    'thumbnail' => materialAsset('slider/A2/Advanced/chapter-6/img/slide8.webp'),
    'isQuiz'    => 1,

    'questions' => [
        [
            'time'           => 35200,
            'type'           => 'multiple_choice',
            'question'       => '1. What is an immigrant?',
            'options'        => [
                'A person who moves to a new country',
                'A person who stays at home',
                'A person who likes to sleep',
            ],
            'correct_answer' => 0,
            'points'         => 1,
        ],
        [
            'time'           => 39400,
            'type'           => 'multiple_choice',
            'question'       => '2. How do people feel when they move?',
            'options'        => [
                'Only happy',
                'Many different feelings, like excited and nervous',
                'They feel nothing',
            ],
            'correct_answer' => 1,
            'points'         => 1,
        ],

        [
            'time'           => 47600,
            'type'           => 'multiple_choice',
            'question'       => '3. Moving to a new country is like...',
            'options'        => [
                'Eating an apple',
                'Starting a new school',
                'Sleeping in a bed',
            ],
            'correct_answer' => 1,
            'points'         => 1,
        ],
        [
            'time'           => 70200,
            'type'           => 'multiple_choice',
            'question'       => '4. What do all people want?',
            'options'        => [
                'To be safe and belong',
                'To have a big car',
                'To be angry',
            ],
            'correct_answer' => 0,
            'points'         => 1,
        ],
        [
            'time'           => 84400,
            'type'           => 'multiple_choice',
            'question'       => '5. What helps a new person feel welcome?',
            'options'        => [
                'Being mean',
                'Being kind',
                'Saying nothing',
            ],
            'correct_answer' => 1,
            'points'         => 1,
        ],
        [
            'time'           => 87200,
            'type'           => 'multiple_choice',
            'question'       => '6. What does "use your noggin" mean?',
            'options'        => [
                'Use your feet',
                'Use your brain and think',
                'Use your hands',
            ],
            'correct_answer' => 1,
            'points'         => 1,
        ],
    ],

    'subtitles'  => [
        ['start' => 0,   'end' => 4,   'text' => 'Hey there! Have you ever moved to a new house or been the new kid at school?'],
        ['start' => 4,   'end' => 9,  'text' => 'Maybe you felt excited. Maybe you felt nervous. Maybe you felt both at the same time.'],
        ['start' => 9,  'end' => 13,  'text' => 'That mix of feelings is pretty common when something in life changes.'],

        ['start' => 13,  'end' => 17,  'text' => 'Sometimes it\'s a really big change, like moving to a different country.'],
        ['start' => 17,  'end' => 24,  'text' => 'When a person moves to a new country to live there, that\'s called immigrating. A person who does that is called an immigrant.'],

        ['start' => 24,  'end' => 26,  'text' => 'There isn\'t just one reason people immigrate.'],
        ['start' => 26,  'end' => 32.5,  'text' => 'People may immigrate to a new country to join loved ones, find new opportunities, or feel safer.'],
        ['start' => 32.5,  'end' => 35,  'text' => 'Sometimes it\'s a choice, and sometimes it isn\'t.'],

        ['start' => 35.5,  'end' => 39,  'text' => 'Moving to a new country can feel a lot like starting at a new school.'],
        ['start' => 39.5,  'end' => 43.5,  'text' => 'You might not know the routines yet. You might hear new sounds and new words.'],
        ['start' => 44,  'end' => 47,  'text' => 'Or you might miss what feels comfortable and familiar.'],
        ['start' => 47.7,  'end' => 53,  'text' => 'And at the same time, you might feel hopeful, or excited, or proud, for trying something new.'],

        ['start' => 53,  'end' => 58,  'text' => 'Immigrants are kids, parents, grandparents, doctors, teachers, and neighbors.'],
        ['start' => 58,  'end' => 61, 'text' => 'They\'re part of our schools and communities.'],
        ['start' => 61, 'end' => 65.5, 'text' => 'No matter where someone comes from, or where they move, we all want the same things:'],
        ['start' => 66, 'end' => 70, 'text' => 'to be safe, to be cared for, to belong.'],

        ['start' => 70.5, 'end' => 75.7, 'text' => 'Starting somewhere new can feel scary sometimes, and kindness can help people feel welcome.'],
        ['start' => 75.7, 'end' => 79, 'text' => 'Use your noggin to think about these two questions:'],
        ['start' => 79, 'end' => 84, 'text' => 'Do you know someone who moved from one place to another, maybe even from another country?'],
        ['start' => 84.5, 'end' => 87, 'text' => 'What can you do to help them feel like they belong?'],

        ['start' => 87.5, 'end' => 90, 'text' => 'When we welcome others, we make our communities better.'],
        ['start' => 91, 'end' => 95, 'text' => 'When someone is new, they bring stories, traditions, and ideas from where they came from.'],
        ['start' => 95.5, 'end' => 99, 'text' => 'We can learn from them, and they can learn from us, too.'],

        ['start' => 99.7, 'end' => 104, 'text' => 'That\'s it for today. Thanks for learning with us, We\'ll see you next time.'],

    ],
];
?>

@include("slider.video.interactive", ['content' => $content])