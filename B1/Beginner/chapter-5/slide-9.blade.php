<?php
$content = [
    'video'          => materialAsset(''),
    'thumbnail'      => materialAsset('slider/B1/Beginner/chapter-5/img/slide9.webp'),
    'isQuiz'         => 1,

    'questions' => [
        [
            // After: "sandcastle building"
            'time' => 11200,
            'type' => 'multiple_choice',
            'question' => 'What do people enjoy building at the seaside?',
            'options' => [
                'Houses',
                'Sandcastles',
                'Boats',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            // After: "People could walk out over the sea"
            'time' => 36400,
            'type' => 'multiple_choice',
            'question' => 'What can visitors do on the pier?',
            'options' => [
                'Drive cars',
                'Watch television',
                'Enjoy the sea view',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            // After: "Punch and Judy, a puppet show"
            'time' => 50800,
            'type' => 'multiple_choice',
            'question' => 'What kind of show is Punch and Judy?',
            'options' => [
                'A music concert',
                'A puppet show',
                'A dance show',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            // After: "Driving games are fast and exciting"
            'time' => 93000,
            'type' => 'multiple_choice',
            'question' => 'Why do young people enjoy arcade games?',
            'options' => [
                'Because they are educational',
                'Because they are cheap',
                'Because they are fun and exciting',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            // After: "modern attractions... video games and virtual entertainment"
            'time' => 78600,
            'type' => 'multiple_choice',
            'question' => 'What kind of entertainment do many visitors enjoy today?',
            'options' => [
                'Modern entertainment and video games',
                'Only traditional shows',
                'Reading books on the beach',
            ],
            'correct_answer' => 0,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        ['start' => 0,    'end' => 6,    'text' => 'Nick: Seaside towns like Blackpool and Southend have sandcastle building, donkey rides, fish and chips and ice cream.'],
        ['start' => 6.5,  'end' => 11,   'text' => 'They are also famous for their piers. One pier is over two kilometres long.'],
        ['start' => 12,   'end' => 17,   'text' => 'It is the longest pleasure pier in the world. A small train goes to the end of the pier.'],

        ['start' => 18,   'end' => 23.5, 'text' => 'A hundred years ago, going on the pier was very exciting.'],
        ['start' => 24,   'end' => 29.5, 'text' => 'People could walk out over the sea. It felt a bit like being on a ship.'],
        ['start' => 30,   'end' => 34,   'text' => 'Today it does not feel so scary.'],

        ['start' => 37,   'end' => 42,   'text' => 'There are still traditional shows. One is Punch and Judy, a puppet show.'],
        ['start' => 42.5, 'end' => 48.5, 'text' => 'Mr Punch is a naughty character. Martin Scott Price has been doing puppet shows in Blackpool for 35 years.'],

        ['start' => 51,   'end' => 56,   'text' => 'Martin: In my show there is a crocodile. Mr Punch is naughty.'],
        ['start' => 56.5, 'end' => 62,   'text' => 'Judy has sausages for tea. The crocodile steals the sausages.'],
        ['start' => 62.5, 'end' => 69,   'text' => "He sometimes pretends to eat the children's fingers. The children laugh and run away."],

        ['start' => 70.5, 'end' => 76,   'text' => 'Not everyone wants a show or the beach. There are also modern attractions.'],
        ['start' => 76.5, 'end' => 82,   'text' => 'Game arcades have video games and virtual entertainment.'],

        ['start' => 83.5, 'end' => 88,   'text' => 'Young people: Dance mats are fun and give exercise.'],
        ['start' => 88.5, 'end' => 92,   'text' => 'Arcades are good to play with friends.'],
        ['start' => 92.5, 'end' => 96,   'text' => 'Driving games are fast and exciting.'],

        ['start' => 97.5, 'end' => 104,  'text' => 'Dr Matthew Taylor, a sports scientist at the University of Essex, studies video games and skills.'],

        ['start' => 105,  'end' => 112,  'text' => 'Dr Taylor: Playing computer games does not make you better at real sports like football or tennis.'],
        ['start' => 112.5,'end' => 117,  'text' => 'Games do help your hand-eye coordination.'],
        ['start' => 117.5,'end' => 123,  'text' => 'Race drivers use simulators to learn tracks. Surgeons can practise on simulators too.'],
        ['start' => 123.5,'end' => 130,  'text' => 'Active video games can help fitness, but they are not a full replacement for real exercise.'],
        ['start' => 130.5,'end' => 133,  'text' => 'Also, do not play for too long.'],

        ['start' => 134,  'end' => 139,  'text' => 'Today the seaside still has many kinds of fun: piers, puppet shows and arcades.'],
        ['start' => 139.5,'end' => 143,  'text' => 'And don’t forget to try a stick of rock!'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])