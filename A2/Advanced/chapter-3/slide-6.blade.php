<?php
$content = [
    'video'     => materialAsset('slider/A2/Advanced/chapter-3/video/helpers-encrypted/helpers.m3u8'),
    'thumbnail' => materialAsset('slider/A2/Advanced/chapter-3/img/slide6.webp'),
    'isQuiz'    => 1,

    'questions' => [
        [
            'time'           => 14700,
            'type'           => 'multiple_choice',
            'question'       => '1. What does a doctor use to check patients?',
            'options'        => [
                'A hammer',
                'A stethoscope',
                'A bicycle',
                'A wrench',
            ],
            'correct_answer' => 1,
            'points'         => 1,
        ],
        [
            'time'           => 21700,
            'type'           => 'multiple_choice',
            'question'       => '2. What does a nurse use to care for sick people?',
            'options'        => [
                'Bricks',
                'A fire hose',
                'Medical gloves',
                'A whistle',
            ],
            'correct_answer' => 2,
            'points'         => 1,
        ],
        [
            'time'           => 29200,
            'type'           => 'multiple_choice',
            'question'       => '3. What does a teacher use to teach students?',
            'options'        => [
                'A frying pan',
                'A whiteboard',
                'A tractor',
                'A plunger',
            ],
            'correct_answer' => 1,
            'points'         => 1,
        ],
        [
            'time'           => 44500,
            'type'           => 'multiple_choice',
            'question'       => '4. What does a firefighter use to put out fires?',
            'options'        => [
                'A fire hose',
                'A mailbag',
                'A screwdriver',
                'A knife',
            ],
            'correct_answer' => 0,
            'points'         => 1,
        ],
        [
            'time'           => 69200,
            'type'           => 'multiple_choice',
            'question'       => '5. What does a chef use to prepare food?',
            'options'        => [
                'A walkie-talkie',
                'A helmet',
                'A frying pan',
                'A tester',
            ],
            'correct_answer' => 2,
            'points'         => 1,
        ],
        [
            'time'           => 101500,
            'type'           => 'multiple_choice',
            'question'       => '6. What does a plumber use to repair water systems?',
            'options'        => [
                'A whistle',
                'A wrench',
                'A bicycle',
                'A chalk',
            ],
            'correct_answer' => 1,
            'points'         => 1,
        ],
    ],

    'subtitles'  => [
        ['start' => 0,    'end' => 3,    'text' => "Every helper has special tools to do their job."],
        ['start' => 3,    'end' => 7,    'text' => "Let's explore our community helpers and the tools they use."],

        ['start' => 8, 'end' => 14.5,   'text' => 'Doctor: a doctor uses a stethoscope, thermometer, and syringe to check patients.'],

        ['start' => 15.5, 'end' => 21.5,   'text' => 'Nurse: A nurse uses medical gloves and medicines to care for sick people.'],

        ['start' => 23.5, 'end' => 29,   'text' => 'Teacher: A teacher uses books, and a whiteboard to teach students.'],

        ['start' => 29.7,   'end' => 31,   'text' => 'Police officer'],
        ['start' => 31,   'end' => 36,   'text' => 'A police officer uses handcuffs, and a whistle to keep law and order.'],

        ['start' => 37,   'end' => 39,   'text' => 'Firefighter'],
        ['start' => 39,   'end' => 44,   'text' => 'A firefighter uses a fire hose and a helmet to put out fires'],

        ['start' => 44.8,   'end' => 49,   'text' => 'Farmer: A farmer uses a tractor, plow, to grow crops.'],

        ['start' => 50.5,   'end' => 56,   'text' => 'Construction worker: A construction worker uses a hammer and a helmet to build houses'],

        ['start' => 57,   'end' => 61.5,   'text' => 'Postman: A postman uses a mailbag to deliver letters.'],

        ['start' => 62,   'end' => 69,   'text' => 'Chef: A chef uses a knife, frying pan, and apron to cook delicious meals.'],

    ],
];
?>

@include("slider.video.interactive", ['content' => $content])