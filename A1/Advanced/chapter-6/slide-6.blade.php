<?php
$content = [
    'video'      => materialAsset('slider/A1/Advanced/chapter-6/video/train-encrypted/train.m3u8'),
    'thumbnail'  => materialAsset('slider/A1/Advanced/chapter-6/img/slide6.webp'),
    'isQuiz'     => 1,
    'questions' => [
        [
            'time' => 17600,
            'type' => 'multiple_choice',
            'question' => 'Question 1: What should Ben and his companion do after buying tickets to Edinburgh?',
            'options' => [
                'Ask the train guard if they can board now.',
                'Find their seats immediately on the train.',
                'Check the timetable for platform information.',
                'Visit the buffet car for a snack.'
            ],
            'correct_answer' => 2,
            'points' => 10
        ],
        [
            'time' => 27200,
            'type' => 'multiple_choice',
            'question' => 'Question 2: Which platform should Ben and his friend wait on for the train to Edinburgh?',
            'options' => ['Platform 4', 'Platform 6', 'Platform 5'],
            'correct_answer' => 1,
            'points' => 10
        ],
        [
            'time' => 51800,
            'type' => 'true_false',
            'question' => 'Question 3: They put their bags on the luggage rack.',
            'correct_answer' => true,
            'points' => 10
        ],
        [
            'time' => 75800,
            'type' => 'true_false',
            'question' => 'Question 4: The buffet car only serves tea.',
            'correct_answer' => false,
            'points' => 10
        ],
    ],
    'subtitles'  => [
        ['start' => 0, 'end' => 3.5, 'text' => 'Part one: At the train station.'],
        ['start' => 3.5, 'end' => 6.5, 'text' => "Look, Ben, there's the ticket machine near the entrance."],
        ['start' => 9.7, 'end' => 12, 'text' => "Great. Let's buy our tickets to Edinburgh."],
        ['start' => 12, 'end' => 17, 'text' => "Yes. And after this, let's check the timetable to see which platform our train leaves from."],
        ['start' => 20.5, 'end' => 27, 'text' => "It says platform 6. Oh, there's the train guard. Let's ask her if this is the right train."],
        ['start' => 27.5, 'end' => 31.5, 'text' => 'Excuse me. We are traveling to Edinburgh. Is this the right platform?'],
        ['start' => 31.7, 'end' => 36, 'text' => 'Yes, that\'s correct. The train to Edinburgh leaves in 10 minutes.'],
        ['start' => 36.7, 'end' => 39.7, 'text' => "Perfect. Let's wait on the platform. I'm so excited."],

        ['start' => 39.7, 'end' => 41, 'text' => 'Part two: On the train.'],
        ['start' => 43, 'end' => 46.5, 'text' => 'Our sleeping car is number four. Let\'s find our seats first.'],
        ['start' => 48.5, 'end' => 51.5, 'text' => "Look, there's a luggage rack above. We can put our bags there."],
        ['start' => 52.5, 'end' => 56, 'text' => 'Thanks. Oh, I love how clean this sleeping car is.'],
        ['start' => 56, 'end' => 59.5, 'text' => 'Me too. It even has bunk beds for the night.'],
        ['start' => 59.5, 'end' => 62, 'text' => 'Brilliant. This trip will be much better than driving.'],

        ['start' => 62.5, 'end' => 65.5, 'text' => 'Part three: During the journey.'],
        ['start' => 66, 'end' => 67, 'text' => 'Tickets, please.'],
        ['start' => 67.5, 'end' => 70, 'text' => 'Here you go. Thank you.'],
        ['start' => 71, 'end' => 75, 'text' => "Thank you. You can visit the buffet car if you'd like a snack or a drink."],
        ['start' => 76.7, 'end' => 80, 'text' => "That's a good idea. Let's go get some tea."],
        ['start' => 80, 'end' => 83, 'text' => "Yes. And after that, I'll rest in my bunk bed."],
        ['start' => 84.5, 'end' => 86, 'text' => "Enjoy your journey."],
    ],
];
?>
@include("slider.video.interactive", ['content' => $content])
