<?php
$content = [
    'video'     => materialAsset('slider/A2/Intermediate/chapter-3/videos/superstitions.mp4'),
    'thumbnail' => materialAsset('slider/A2/Intermediate/chapter-3/img/slide5.webp'),
    'isQuiz'    => 1,

    'questions' => [
        [
            'time' => 24000,
            'type' => 'multiple_choice',
            'question' => 'Why do some buildings in America not have a 13th floor?',
            'options' => [
                'It is too expensive',
                'The number 13 is considered unlucky',
                'There is no space',
                'It is a mistake',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 70000,
            'type' => 'multiple_choice',
            'question' => 'Which number is considered very lucky in China?',
            'options' => ['4', '7', '8', '9'],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 82000,
            'type' => 'multiple_choice',
            'question' => 'When did China start the Olympic Games in 2008 for good luck?',
            'options' => [
                '7:00 PM on July 7',
                '8:08 PM on August 8',
                '9:00 PM on September 9',
                '6:06 PM on June 6',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 36000,
            'type' => 'multiple_choice',
            'question' => 'A superstition is something people believe that is not really ________.',
            'options' => ['true', 'lucky', 'strange', 'bad'],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 64000,
            'type' => 'multiple_choice',
            'question' => 'In America, ________ is a lucky number.',
            'options' => ['4', '7', '9', '13'],
            'correct_answer' => 1,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        ['start' => 0,  'end' => 6,  'text' => 'Hey, want to see something interesting? Check this out.'],
        ['start' => 6,  'end' => 12, 'text' => 'Look closely at the panel showing the floors in this building.'],
        ['start' => 12, 'end' => 16, 'text' => 'Do you see something strange? That’s right.'],
        ['start' => 16, 'end' => 21, 'text' => 'There isn’t a 13th floor. Is that a mistake? Haha, no. It isn’t a mistake.'],
        ['start' => 21, 'end' => 30, 'text' => 'Here in America, the number 13 is unlucky. A lot of office buildings and hotels will skip the 13th floor. It’s just a superstition.'],
        ['start' => 30, 'end' => 39, 'text' => 'A superstition is something that people believe that is not really true. Like that the number 13 is an unlucky number.'],
        ['start' => 39, 'end' => 47, 'text' => 'Some people also believe the 13th day of the month is unlucky, especially if it is Friday the 13th.'],
        ['start' => 47, 'end' => 58, 'text' => 'Different cultures have different ideas about what is a lucky and unlucky number. In America, 13 is an unlucky number.'],
        ['start' => 58, 'end' => 66, 'text' => 'But in China and Japan, really unlucky numbers are 4 and 9. So what about a lucky number in American culture? Lucky 7.'],
        ['start' => 66, 'end' => 75, 'text' => '7 is a very lucky number in America. In China, a very lucky number is 8. In fact, the more 8s you have, the better.'],
        ['start' => 75, 'end' => 84, 'text' => 'In 2008, China was host of the Olympic Games. For good luck, they decided to start the games at 8:08 at night on August 8th, 8:08 PM.'],
        ['start' => 84, 'end' => 88, 'text' => '8-8-08. Now that is a lot of 8s. Oh look.'],
        ['start' => 88, 'end' => 95, 'text' => 'A penny. Find a penny, pick it up, and all day long you’ll have good luck. Must be my lucky day.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])