<?php
$content = [
    'video'      => materialAsset('slider/A1/Advanced/chapter-6/video/encrypted/'),
    'thumbnail'  => materialAsset('slider/A1/Advanced/chapter-6/img/slide6.webp'),
    'isQuiz'     => 1,
    'questions' => [
        [
            'time' => 52000,
            'type' => 'true_false',
            'question' => 'Question 1: They put their bags on the luggage rack.',
            'correct_answer' => true,
            'points' => 10
        ],
        [
            'time' => 81000,
            'type' => 'true_false',
            'question' => 'Question 2: The buffet car only serves tea.',
            'correct_answer' => false,
            'points' => 10
        ],
        [
            'time' => 18000,
            'type' => 'multiple_choice',
            'question' => 'Question 3: What should Ben and his companion do after buying tickets to Edinburgh?',
            'options' => [
                'Ask the train guard if they can board now.',
                'Find their seats immediately on the train.',
                'Check the timetable for platform information.',
                'Visit the buffet car for a snack.'
            ],
            'correct_answer' => 3,
            'points' => 10
        ],
        [
            'time' => 30000,
            'type' => 'multiple_choice',
            'question' => 'Question 4: Which platform should Ben and his friend wait on for the train to Edinburgh?',
            'options' => ['Platform 4', 'Platform 6', 'Platform 5'],
            'correct_answer' => 2,
            'points' => 10
        ],
    ],
    'subtitles'  => [
        ['start' => 0, 'end' => 5, 'text' => 'Part one: At the train station.'],
        ['start' => 5, 'end' => 10, 'text' => "Look, Ben, there's the ticket machine near the entrance."],
        ['start' => 10, 'end' => 11, 'text' => "Great. Let's buy our tickets to Edinburgh."],
        ['start' => 11, 'end' => 18, 'text' => "Yes. And after this, let's check the timetable to see which platform our train leaves from."],
        ['start' => 18, 'end' => 25, 'text' => "It says platform 6. Oh, there's the train guard. Let's ask her if this is the right train."],
        ['start' => 25, 'end' => 30, 'text' => 'Excuse me. We are traveling to Edinburgh. Is this the right platform?'],
        ['start' => 30, 'end' => 34, 'text' => 'Yes, that\'s correct. The train to Edinburgh leaves in 10 minutes.'],
        ['start' => 34, 'end' => 38, 'text' => "Perfect. Let's wait on the platform. I'm so excited."],

        ['start' => 38, 'end' => 45, 'text' => 'Part two: On the train.'],
        ['start' => 45, 'end' => 49, 'text' => 'Our sleeping car is number four. Let\'s find our seats first.'],
        ['start' => 49, 'end' => 52, 'text' => "Look, there's a luggage rack above. We can put our bags there."],
        ['start' => 52, 'end' => 55, 'text' => 'Thanks. Oh, I love how clean this sleeping car is.'],
        ['start' => 55, 'end' => 60, 'text' => 'Me too. It even has bunk beds for the night.'],
        ['start' => 60, 'end' => 63, 'text' => 'Brilliant. This trip will be much better than driving.'],

        ['start' => 63, 'end' => 70, 'text' => 'Part three: During the journey.'],
        ['start' => 70, 'end' => 72, 'text' => 'Tickets, please.'],
        ['start' => 72, 'end' => 74, 'text' => 'Here you go. Thank you.'],
        ['start' => 74, 'end' => 79, 'text' => "Thank you. You can visit the buffet car if you'd like a snack or a drink."],
        ['start' => 79, 'end' => 81, 'text' => "That's a good idea. Let's go get some tea."],
        ['start' => 81, 'end' => 86, 'text' => "Yes. And after that, I'll rest in my bunk bed. Enjoy your journey."],
    ],
];
?>
@include("slider.video.interactive", ['content' => $content])