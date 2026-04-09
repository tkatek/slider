<?php
$content = [
    'video'      => materialAsset('slider/A1/Advanced/chapter-1/video/encrypted/'),
    'thumbnail'  => materialAsset('slider/A1/Advanced/chapter-5/img/slide6.webp'),
    'isQuiz'     => 1,
    'questions' => [
        [
            'time' => 24000,
            'type' => 'multiple_choice',
            'question' => 'Question 1: Where is she?',
            'options' => ['At the bus station', 'At the train station', 'At the airport'],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 28000,
            'type' => 'multiple_choice',
            'question' => 'Question 2: Samina asks the driver: "Excuse me, driver, I want to go to West Hole. ______ bus do I take?"',
            'options' => ['Where', 'Which', 'When'],
            'correct_answer' => 2,
            'points' => 10
        ],
        [
            'time' => 76000,
            'type' => 'multiple_choice',
            'question' => 'Question 3: The driver says: "You’ll need the number ______."',
            'options' => ['6', '9', '19'],
            'correct_answer' => 2,
            'points' => 10
        ],
        [
            'time' => 86000,
            'type' => 'multiple_choice',
            'question' => 'Question 4: The driver tells Samina she is going the ______ way.',
            'options' => ['right', 'wrong', 'fast'],
            'correct_answer' => 2,
            'points' => 10
        ],
        [
            'time' => 90000,
            'type' => 'multiple_choice',
            'question' => 'Question 5: The driver says Samina should ______ the road.',
            'options' => ['walk', 'drive', 'cross'],
            'correct_answer' => 3,
            'points' => 10
        ],
    ],
    'subtitles'  => [
        ['start' => 15, 'end' => 24, 'text' => 'Samina: Excuse me, driver, I want to go to West Hole. Which bus do I take?'],
        ['start' => 24, 'end' => 28, 'text' => 'Bus Driver: West Hole? You’ll need the number nine, I think.'],
        ['start' => 28, 'end' => 30, 'text' => 'Samina: Thank you.'],

        ['start' => 69, 'end' => 79, 'text' => 'Samina: Excuse me, driver, I want to go to West Hole. Is this the right bus?'],
        ['start' => 79, 'end' => 86, 'text' => 'Bus Driver: West Hole? No, this bus goes to Hanford and Brentley. You’re going the wrong way, you want the 19.'],
        ['start' => 86, 'end' => 88, 'text' => 'Samina: Oh no! What should I do?'],
        ['start' => 88, 'end' => 93, 'text' => 'Bus Driver: Get off here, cross the road and take the 19 from the other side. That one goes to West Hole.'],
        ['start' => 93, 'end' => 98, 'text' => 'Samina: Cross the road and take the 19?'],
        ['start' => 98, 'end' => 100, 'text' => 'Bus Driver: That’s right.'],
        ['start' => 100, 'end' => 103, 'text' => 'Samina: Thank you very much.'],
    ],
];
?>
@include("slider.video.interactive", ['content' => $content])