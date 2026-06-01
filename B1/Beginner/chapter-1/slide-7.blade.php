<?php
$content = [
    'title'          => "Let's Watch This Video",
    'video'          => materialAsset('slider/B1/Beginner/chapter-1/video/'),
    'thumbnail'      => materialAsset('slider/B1/Beginner/chapter-1/slide7.webp'),
    'isQuiz'         => 1,
    'showTranscript' => 0,

    'questions' => [
        [
            'time' => 23000,
            'type' => 'multiple_choice',
            'question' => '1- Why is Anne calling Sarah?',
            'options' => ['To invite her to dinner', 'To ask for a favor', 'To study together'],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 25000,
            'type' => 'multiple_choice',
            'question' => '2- What does Anne ask Sarah to do first?',
            'options' => ['Walk the dog', 'Water the plants', 'Take care of the house'],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 31000,
            'type' => 'multiple_choice',
            'question' => '3- On which days does Anne want Sarah to feed the cat?',
            'options' => ['Friday and Saturday', 'Saturday and Sunday', 'Sunday and Monday'],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 57000,
            'type' => 'multiple_choice',
            'question' => '4- Which expression uses a verb in the -ing form?',
            'options' => ['Could you please help me?', 'Would you be able to help me?', 'Would you mind helping me?'],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 32000,
            'type' => 'multiple_choice',
            'question' => '5- What does Sarah say when Anne asks for help?',
            'options' => ['I can’t do that.', 'Not at all!', 'Maybe later.'],
            'correct_answer' => 1,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        ['start' => 0,  'end' => 4.5,  'text' => 'Do you sometimes ask your friends for favors?'],
        ['start' => 4.5,  'end' => 8.8,  'text' => 'Listen to this phone call with my friend and learn how to ask for favors in American English.'],

        ['start' => 9,  'end' => 12,  'text' => 'An: Hi Sarah, it\'s An.'],
        ['start' => 12,  'end' => 15,  'text' => 'Sarah: Hi An, what\'s up?'],
        ['start' => 15,  'end' => 23,  'text' => 'An: I\'m going away to visit my family this weekend. Would you be able to take care of my house while I\'m gone?'],
        ['start' => 23,  'end' => 25,  'text' => 'Sarah: Of course.'],
        ['start' => 25,  'end' => 31,  'text' => 'An: Thanks. Would you mind feeding my cat on Saturday and Sunday?'],
        ['start' => 31,  'end' => 32,  'text' => 'Sarah: Not at all.'],
        ['start' => 32,  'end' => 36,  'text' => 'An: And one more thing, could you please water my plants on Saturday?'],
        ['start' => 36,  'end' => 38,  'text' => 'Sarah: Sure.'],

        ['start' => 38,  'end' => 44,  'text' => 'Here are three polite ways to ask for a favor: Would you be able to + a verb.'],
        ['start' => 44,  'end' => 50,  'text' => 'Would you be able to help me move into my new house?'],
        ['start' => 50,  'end' => 57,  'text' => 'Would you be able to walk my dog?'],
        ['start' => 57,  'end' => 62,  'text' => 'Would you mind + a verb in the -ing form: Would you mind helping me with this report?'],
        ['start' => 62,  'end' => 67,  'text' => 'Would you mind lending me your laptop?'],
        ['start' => 67,  'end' => 72,  'text' => 'Could you please + a verb: Could you please help me with my homework?'],
        ['start' => 72,  'end' => 76,  'text' => 'Could you please drive me home?'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])