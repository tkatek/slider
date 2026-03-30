<?php
$content=[
    'video'=>materialAsset('slider/A1/Beginner/chapter-6/video/encrypted/day-in-life.m3u8'),
    'thumbnail'=>materialAsset('slider/A1/Beginner/chapter-6/video/day-in-life.webp'),
    'isQuiz' => 1,

    'questions' => [
        [
            'time' => 15000, // after "I eat breakfast"
            'type' => 'multiple_choice',
            'question' => 'What does Emily do immediately after waking up?',
            'options' => ['Goes jogging', 'Eats breakfast', 'Gets the bus to work', 'Swims in the sea'],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 32000, // after "I swim in the sea"
            'type' => 'multiple_choice',
            'question' => 'Emily swims in the sea before eating lunch.',
            'options' => ['True', 'False'],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 68000, // after "I listen to a podcast"
            'type' => 'multiple_choice',
            'question' => 'What does Thomas do while driving to work?',
            'options' => ['Reads a book', 'Listens to music', 'Listens to a podcast', 'Cooks dinner'],
            'correct_answer' => 2,
            'points' => 10
        ],
        [
            'time' => 87000, // after "After work, I go to the park"
            'type' => 'multiple_choice',
            'question' => 'After work, what does Thomas do before going home to cook dinner?',
            'options' => ['Plays video games', 'Goes to the park', 'Has a shower', 'Listens to a podcast'],
            'correct_answer' => 1,
            'points' => 10
        ],
    ],

    'subtitles' => [
        ['start' => 0, 'end' => 3, 'text' => 'Hi Emily. Hi Thomas. How are you?'],
        ['start' => 3, 'end' => 7, 'text' => "I'm well, thanks. How are you? I'm good too."],
        ['start' => 7, 'end' => 8, 'text' => 'What do you do every day?'],

        ['start' => 10, 'end' => 12, 'text' => 'I wake up.'],
        ['start' => 12, 'end' => 14, 'text' => 'I eat breakfast.'],
        ['start' => 15, 'end' => 17, 'text' => 'I go jogging.'],
        ['start' => 18, 'end' => 20, 'text' => 'I get the bus to work.'],
        ['start' => 20, 'end' => 24, 'text' => 'I read a book in the bus.'],
        ['start' => 24, 'end' => 27, 'text' => 'I eat lunch.'],
        ['start' => 28, 'end' => 31, 'text' => 'I swim in the sea.'],
        ['start' => 31, 'end' => 34, 'text' => 'I eat dinner.'],
        ['start' => 36, 'end' => 42, 'text' => 'I take a shower. Then I go to sleep.'],

        ['start' => 44, 'end' => 48, 'text' => 'How about you? What do you do every day?'],

        ['start' => 49, 'end' => 51, 'text' => 'I wake up.'],
        ['start' => 52, 'end' => 54, 'text' => 'I have a shower.'],
        ['start' => 55, 'end' => 58, 'text' => 'I eat breakfast.'],
        ['start' => 58, 'end' => 61, 'text' => 'I drive to work.'],
        ['start' => 62, 'end' => 65, 'text' => ' I listen to a podcast.'],
        ['start' => 69, 'end' => 71, 'text' => 'I eat lunch.'],
        ['start' => 72, 'end' => 75, 'text' => 'After work, I go to the park.'],
        ['start' => 75, 'end' => 78, 'text' => 'I go home and cook dinner.'],
        ['start' => 78, 'end' => 83, 'text' => 'After dinner, I play video games.'],
        ['start' => 83, 'end' => 87, 'text' => 'Lastly, I go to sleep.'],
    ],
];

?>
@include("slider.video.interactive", ['content' => $content])