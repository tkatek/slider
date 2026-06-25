<?php
$content = [
    'video'     => materialAsset(''),
    'thumbnail' => materialAsset('slider/B1/Intermediate/chapter-9/img/slide10.webp'),
    'isQuiz'   => 1,

    'questions' => [
        [
            'time' => 12000,
            'type' => 'multiple_choice',
            'question' => 'Who were the first people who inspired the speaker?',
            'options' => [
                'His teachers',
                'His friends',
                'His parents',
                'Famous athletes',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 36000,
            'type' => 'multiple_choice',
            'question' => 'What happened when the speaker was ten years old?',
            'options' => [
                'He learned photography',
                'He discovered a biography of Steve Jobs',
                'He traveled to another country',
                'He became a designer',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 52000,
            'type' => 'multiple_choice',
            'question' => 'What did the speaker learn from reading biographies?',
            'options' => [
                'How to play sports',
                'How to travel the world',
                'Valuable lessons about hard work and determination',
                'How to become famous',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 78000,
            'type' => 'multiple_choice',
            'question' => 'Why does the speaker enjoy photography?',
            'options' => [
                'It helps him earn money',
                'It helps him meet new people',
                'It helps him notice details that others may not see',
                'It helps him travel more often',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 112000,
            'type' => 'multiple_choice',
            'question' => 'According to the speaker, what can inspire us?',
            'options' => [
                'Only famous people',
                'Only books and films',
                'Only family members',
                'People, places, and experiences',
            ],
            'correct_answer' => 3,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        [
            'start' => 0,
            'end' => 6,
            'text' => 'Who inspires you? Inspiration can come from many different people and experiences.',
        ],
        [
            'start' => 6.5,
            'end' => 19,
            'text' => 'The first people who inspired me were my parents. They always encouraged me to try new things and supported me in everything I wanted to do.',
        ],
        [
            'start' => 19.5,
            'end' => 29,
            'text' => 'They taught me important values that helped me become more confident and independent.',
        ],
        [
            'start' => 29.5,
            'end' => 39,
            'text' => 'When I was ten years old, I discovered a book which changed the way I thought about the world.',
        ],
        [
            'start' => 39.5,
            'end' => 47,
            'text' => 'It was a biography of Steve Jobs.',
        ],
        [
            'start' => 47.5,
            'end' => 58,
            'text' => 'After reading it, I became interested in learning about successful people and their achievements.',
        ],
        [
            'start' => 58.5,
            'end' => 69,
            'text' => 'I read many other biographies, which taught me valuable lessons about hard work and determination.',
        ],
        [
            'start' => 69.5,
            'end' => 82,
            'text' => 'I also enjoy traveling to places where I can learn about different cultures and meet new people.',
        ],
        [
            'start' => 82.5,
            'end' => 92,
            'text' => 'Traveling has helped me become more open-minded and curious about the world around me.',
        ],
        [
            'start' => 92.5,
            'end' => 102,
            'text' => 'Another hobby that inspires me is photography. I enjoy taking pictures of interesting places and moments.',
        ],
        [
            'start' => 102.5,
            'end' => 111,
            'text' => 'Photography helps me notice details which many people do not see.',
        ],
        [
            'start' => 111.5,
            'end' => 123,
            'text' => 'There was a time when I wanted to become an architect, and another time when I wanted to become a programmer.',
        ],
        [
            'start' => 123.5,
            'end' => 133,
            'text' => 'Today, I am interested in design because I enjoy solving problems and creating useful things.',
        ],
        [
            'start' => 133.5,
            'end' => 144,
            'text' => 'I believe inspiration is everywhere. The people who support us, the places where we learn, and the experiences that challenge us can all inspire us to grow and improve.',
        ],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])