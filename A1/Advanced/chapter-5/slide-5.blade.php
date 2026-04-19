<?php
$content = [
    'video'      => materialAsset('slider/A1/Advanced/chapter-5/video/bus-encrypted/bus.m3u8'),
    'thumbnail'  => materialAsset('slider/A1/Advanced/chapter-5/img/slide5.webp'),
    'isQuiz'     => 1,
    'questions' => [
        [
            'time' => 1500,
            'type' => 'multiple_choice',
            'question' => 'Question 1: Where is she?',
            'options' => ['At the bus station', 'At the train station', 'At the airport'],
            'correct_answer' => 0,
            'points' => 10
        ],
        [
            'time' => 3600,
            'type' => 'multiple_choice',
            'question' => 'Question 2: Samina asks the driver: "Excuse me, driver, I want to go to West Hole. ______ bus do I take?"',
            'options' => ['Where', 'Which', 'When'],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 8600,
            'type' => 'multiple_choice',
            'question' => 'Question 3: The driver says: "You’ll need the number ______."',
            'options' => ['6', '9', '19'],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 30500,
            'type' => 'multiple_choice',
            'question' => 'Question 4: The driver tells Samina she is going the ______ way.',
            'options' => ['right', 'wrong', 'fast'],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 37200,
            'type' => 'multiple_choice',
            'question' => 'Question 5: The driver says Samina should ______ the road.',
            'options' => ['walk', 'drive', 'cross'],
            'correct_answer' => 2,
            'points' => 10
        ],
    ],
    'subtitles'  => [
        ['start' => 0, 'end' => 3.5, 'text' => 'Samina: Excuse me, driver, I want to go to West Hole. Which bus do I take?'],
        ['start' => 4.7, 'end' => 8.5, 'text' => 'Bus Driver: West Hole? You’ll need the number nine, I think.'],
        ['start' => 9, 'end' => 10, 'text' => 'Samina: Thank you.'],

        ['start' => 20, 'end' => 24, 'text' => 'Samina: Excuse me, driver, I want to go to West Hole. Is this the right bus?'],
        ['start' => 25, 'end' => 30, 'text' => 'Bus Driver: West Hole? No, this bus goes to Hanford and Brentley. You’re going the wrong way, you want the 19.'],
        ['start' => 30.5, 'end' => 32.5, 'text' => 'Samina: Oh no! What should I do?'],
        ['start' => 32.5, 'end' => 37, 'text' => 'Bus Driver: Get off here, cross the road and take the 19 from the other side. That one goes to West Hole.'],
        ['start' => 37, 'end' => 39, 'text' => 'Samina: Cross the road and take the 19?'],
        ['start' => 39, 'end' => 41, 'text' => 'Bus Driver: That’s right.'],
        ['start' => 41, 'end' => 42, 'text' => 'Samina: Thank you very much.'],
    ],
];
?>
@include("slider.video.interactive", ['content' => $content])