<?php
$content = [
    'video'     => materialAsset('slider/A2/Advanced/chapter-1/'),
    'thumbnail' => materialAsset('slider/A2/Advanced/chapter-3/img/'),
    'isQuiz'    => 1,

    'questions' => [
        [
            'time'           => 13.5,
            'type'           => 'multiple_choice',
            'question'       => '1. What does a doctor use to check patients?',
            'options'        => [
                'A hammer',
                'A stethoscope',
                'A bicycle',
                'A wrench',
            ],
            'correct_answer' => 'A stethoscope',
            'points'         => 1,
        ],
        [
            'time'           => 20.5,
            'type'           => 'multiple_choice',
            'question'       => '2. What does a nurse use to care for sick people?',
            'options'        => [
                'Bricks',
                'A fire hose',
                'Medical gloves',
                'A whistle',
            ],
            'correct_answer' => 'Medical gloves',
            'points'         => 1,
        ],
        [
            'time'           => 27.5,
            'type'           => 'multiple_choice',
            'question'       => '3. What does a teacher use to teach students?',
            'options'        => [
                'A frying pan',
                'A whiteboard',
                'A tractor',
                'A plunger',
            ],
            'correct_answer' => 'A whiteboard',
            'points'         => 1,
        ],
        [
            'time'           => 44.5,
            'type'           => 'multiple_choice',
            'question'       => '4. What does a firefighter use to put out fires?',
            'options'        => [
                'A fire hose',
                'A mailbag',
                'A screwdriver',
                'A knife',
            ],
            'correct_answer' => 'A fire hose',
            'points'         => 1,
        ],
        [
            'time'           => 80.5,
            'type'           => 'multiple_choice',
            'question'       => '5. What does a chef use to prepare food?',
            'options'        => [
                'A walkie-talkie',
                'A helmet',
                'A frying pan',
                'A tester',
            ],
            'correct_answer' => 'A frying pan',
            'points'         => 1,
        ],
        [
            'time'           => 101.5,
            'type'           => 'multiple_choice',
            'question'       => '6. What does a plumber use to repair water systems?',
            'options'        => [
                'A whistle',
                'A wrench',
                'A bicycle',
                'A chalk',
            ],
            'correct_answer' => 'A wrench',
            'points'         => 1,
        ],
    ],

    'subtitles'  => [
        ['start' => 0,    'end' => 5,    'text' => "Every helper has special tools to do their job."],
        ['start' => 5,    'end' => 8,    'text' => "Let's explore our community helpers and the tools they use."],

        ['start' => 9,    'end' => 10.5, 'text' => 'First, a doctor.'],
        ['start' => 10.5, 'end' => 13,   'text' => 'A doctor uses a stethoscope, thermometer, and syringe to check and treat patients.'],

        ['start' => 15,   'end' => 16.5, 'text' => 'Next, a nurse.'],
        ['start' => 16.5, 'end' => 20,   'text' => 'A nurse uses medical gloves, bandages, and medicines to care for sick people.'],

        ['start' => 22,   'end' => 23.5, 'text' => 'Now, a teacher.'],
        ['start' => 23.5, 'end' => 27,   'text' => 'A teacher uses books, chalk, and a whiteboard to educate students.'],

        ['start' => 29,   'end' => 31,   'text' => 'A police officer helps keep people safe.'],
        ['start' => 31,   'end' => 35,   'text' => 'A police officer uses handcuffs, a walkie-talkie, and a whistle to maintain law and order.'],

        ['start' => 37,   'end' => 39,   'text' => 'A firefighter has very important tools.'],
        ['start' => 39,   'end' => 44,   'text' => 'A firefighter uses a fire hose, helmet, and fire extinguisher to put out fires and save lives.'],

        ['start' => 46,   'end' => 48,   'text' => 'A farmer works with plants and crops.'],
        ['start' => 48,   'end' => 53,   'text' => 'A farmer uses a tractor, plow, and watering can to grow crops and take care of plants.'],

        ['start' => 55,   'end' => 57,   'text' => 'A construction worker builds many things.'],
        ['start' => 57,   'end' => 62,   'text' => 'A construction worker uses a hammer, bricks, and a safety helmet to build houses and roads.'],

        ['start' => 64,   'end' => 66,   'text' => 'A postman delivers messages and packages.'],
        ['start' => 66,   'end' => 70,   'text' => 'A postman uses a mailbag, bicycle, and uniform to deliver letters and packages.'],

        ['start' => 72,   'end' => 74,   'text' => 'A chef works in a kitchen.'],
        ['start' => 74,   'end' => 80,   'text' => 'A chef uses a knife, frying pan, and apron to prepare delicious meals.'],

        ['start' => 82,   'end' => 84.5, 'text' => 'A garbage collector keeps the city clean.'],
        ['start' => 84.5, 'end' => 89,   'text' => 'A garbage collector uses a garbage truck, gloves, and a dustbin to keep the city clean.'],

        ['start' => 91,   'end' => 93,   'text' => 'An electrician fixes electrical problems.'],
        ['start' => 93,   'end' => 97,   'text' => 'An electrician uses a screwdriver, wires, and a tester to fix electrical problems.'],

        ['start' => 99,   'end' => 101,  'text' => 'Finally, a plumber.'],
        ['start' => 101,  'end' => 105,  'text' => 'A plumber uses a wrench, pipes, and a plunger to repair water systems.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])