<?php
$content = [
    'video'     => materialAsset('slider/A2/Intermediate/chapter-3/video/superstition-encrypted/superstition.m3u8'),
    'thumbnail' => materialAsset('slider/A2/Intermediate/chapter-3/img/slide5.webp'),
    'isQuiz'    => 1,

    'questions' => [
        [
            'time' => 33700,
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
            'time' => 43200,
            'type' => 'multiple_choice',
            'question' => 'A superstition is something people believe that is not really ________.',
            'options' => ['true', 'lucky', 'strange', 'bad'],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 82200,
            'type' => 'multiple_choice',
            'question' => 'In America, ________ is a lucky number.',
            'options' => ['4', '7', '9', '13'],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 82600,
            'type' => 'multiple_choice',
            'question' => 'Which number is considered very lucky in China?',
            'options' => ['4', '7', '8', '9'],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 109300,
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
    ],

    'subtitles' => [
        ['start' => 0,  'end' => 4.5,  'text' => 'Hey, want to see something interesting? Check this out.'],
        ['start' => 5,  'end' => 9, 'text' => 'Look closely at the panel showing the floors in this building.'],
        ['start' => 9, 'end' => 13, 'text' => 'Do you see something strange? That’s right.'],
        ['start' => 13.5, 'end' => 21, 'text' => 'There isn’t a 13th floor. Is that a mistake? Haha, no. It isn’t a mistake.'],
        ['start' => 21, 'end' => 33.5, 'text' => 'Here in America, the number 13 is unlucky. A lot of office buildings and hotels will skip the 13th floor. It’s just a superstition.'],
        ['start' => 34, 'end' => 43, 'text' => 'A superstition is something that people believe that is not really true. Like that the number 13 is an unlucky number.'],
        ['start' => 43.5, 'end' => 50, 'text' => 'Some people also believe the 13th day of the month is unlucky, especially if it is Friday the 13th.'],
        ['start' => 51.5, 'end' => 60.5, 'text' => 'Different cultures have different ideas about what is a lucky and unlucky number. In America, 13 is an unlucky number.'],
        ['start' => 60.7, 'end' => 70.5, 'text' => 'But in China and Japan, really unlucky numbers are 4 and 9. So what about a lucky number in American culture?'],
        ['start' => 70.7, 'end' => 82, 'text' => 'Lucky 7, 7 is a very lucky number in America. In China, a very lucky number is 8. In fact, the more 8s you have, the better.'],
        ['start' => 83, 'end' => 94.5, 'text' => 'In 2008, China was host of the Olympic Games. For good luck, they decided to start the games at 8:08 at night on August 8th, 8:08 PM.'],
        ['start' => 94.5, 'end' => 101, 'text' => '8-8-08. Now that is a lot of 8s. Oh look.'],
        ['start' => 101, 'end' => 109, 'text' => 'A penny. Find a penny, pick it up, and all day long you’ll have good luck. Must be my lucky day.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])