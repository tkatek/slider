<?php
$content=[
    'video'=>materialAsset('slider/A1/Beginner/chapter-5/video/encrypted/my-Home.m3u8'),
    'thumbnail'=>materialAsset('slider/A1/Beginner/chapter-5/video/my-Home.webp'),
    'isQuiz'=>0,
    'questions' => [
        [
            // "apartment / flat" (11s–19s)
            'time' => 13000,
            'type' => 'multiple_choice',
            'question' => 'Another word for an apartment is ?',
            'options' => ['A flat', 'A balcony', 'A townhouse'],
            'correct_answer' => 0,
            'points' => 10
        ],
        [
            // "townhouse / housing complex" (22s–30s)
            'time' => 22000,
            'type' => 'multiple_choice',
            'question' => 'Another word for a housing complex is ?',
            'options' => ['A garage', 'An apartment', 'A townhouse'],
            'correct_answer' => 2,
            'points' => 10
        ],
        [
            // "bedside table" (40s–45s)
            'time' => 37000,
            'type' => 'multiple_choice',
            'question' => 'There is a ___ next to the bed ?',
            'options' => ['Curtain', 'Bedside table', 'Microwave'],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            // kitchen island + chairs (60s–70s)
            'time' => 65000,
            'type' => 'multiple_choice',
            'question' => 'There are chairs and an island in the kitchen?',
            'options' => ['True', 'False'],
            'correct_answer' => 0,
            'points' => 10
        ],
        [
            // "cushions" on sofa (74s–79s)
            'time' => 85000,
            'type' => 'multiple_choice',
            'question' => 'There is a ___ on the sofa ?',
            'options' => ['Coffee table', 'Rug', 'Cushion'],
            'correct_answer' => 2,
            'points' => 10
        ],
    ],
    'subtitles' => [
        ['start' => 0,  'end' => 3,  'text' => 'Houses, rooms, and furniture'],
        ['start' => 3,  'end' => 6,  'text' => 'This is a house.'],
        ['start' => 6,  'end' => 9,  'text' => 'It has a garage.'],
        ['start' => 9,  'end' => 13,  'text' => 'This is an apartment, Or flat.'],
        ['start' => 13,  'end' => 16,  'text' => 'It has a balcony.'],
        ['start' => 16,  'end' => 22,  'text' => 'This is a townhouse, Or Housing complex.'],

        ['start' => 22, 'end' => 25, 'text' => 'This is the bedroom'],
        ['start' => 25, 'end' => 28, 'text' => 'In the bedroom there are curtains'],
        ['start' => 28, 'end' => 32, 'text' => 'A bed with bedding and pillows'],
        ['start' => 32, 'end' => 37, 'text' => 'A bedside table with a lamp'],

        ['start' => 37, 'end' => 40, 'text' => 'This is the bathroom'],
        ['start' => 40, 'end' => 49, 'text' => 'There is a window, A bathtub, A shower, A sink And a toilet'],

        ['start' => 50, 'end' => 52, 'text' => 'This is the Kitchen'],
        ['start' => 52, 'end' => 62, 'text' => 'There is a fridge, A microwave, An oven, A sink, An island, And some chairs'],

        ['start' => 64, 'end' => 66, 'text' => 'This is the living room.'],
        ['start' => 66, 'end' => 72, 'text' => 'There is a sofa or couch With some cushions'],
        ['start' => 72, 'end' => 77, 'text' => 'A coffee table there is a carpet or rug'],
        ['start' => 78, 'end' => 80, 'text' => 'There is a plant'],
        ['start' => 80, 'end' => 85, 'text' => 'And a TV or television With a TV unit'],

        ['start' => 87, 'end' => 89, 'text' => 'This is the dining room.'],
        ['start' => 89, 'end' => 92, 'text' => 'In the dining room there is a table'],
        ['start' => 92, 'end' => 97, 'text' => 'Chairs And some flowers'],
    ],


];

?>
@include("slider.video.interactive",['content'=>$content])

