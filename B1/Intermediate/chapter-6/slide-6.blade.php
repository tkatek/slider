<?php
$content = [
    'video'     => materialAsset(''),
    'thumbnail' => materialAsset('slider/B1/Intermediate/chapter-6/img/slide6.webp'),
    'isQuiz'   => 0,

    'questions' => [
        [
            'time' => 12000,
            'type' => 'multiple_choice',
            'question' => 'What is the main purpose of advertising?',
            'options' => [
                'To entertain people only',
                'To attract attention and influence buying decisions',
                'To reduce product sales',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 45000,
            'type' => 'multiple_choice',
            'question' => 'Which advertising method uses famous people to promote products?',
            'options' => [
                'Repetition',
                'Emotional appeal',
                'Celebrity endorsement',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 58000,
            'type' => 'multiple_choice',
            'question' => 'Why do advertisers use repetition?',
            'options' => [
                'To lower prices',
                'To make products more memorable',
                'To create new products',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 72000,
            'type' => 'multiple_choice',
            'question' => 'What is one ethical concern about advertising?',
            'options' => [
                'It can be misleading.',
                'It always reduces sales.',
                'It prevents people from buying products.',
            ],
            'correct_answer' => 0,
            'points' => 10,
        ],
        [
            'time' => 90000,
            'type' => 'multiple_choice',
            'question' => 'What do many consumers want from modern advertising?',
            'options' => [
                'More advertisements every day',
                'Free products',
                'Honest and transparent advertising',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        [
            'start' => 0,
            'end' => 8,
            'text' => 'Advertising is an important part of modern life. We see advertisements on buses, billboards, websites, social media, and television.',
        ],
        [
            'start' => 8.5,
            'end' => 15,
            'text' => 'Their main goal is to attract our attention and influence our buying decisions.',
        ],
        [
            'start' => 15.5,
            'end' => 25,
            'text' => 'Advertising has a long history. Ancient Egyptians used posters to promote products.',
        ],
        [
            'start' => 25.5,
            'end' => 35,
            'text' => 'Later, newspapers, radio, and television helped advertisements reach larger audiences.',
        ],
        [
            'start' => 35.5,
            'end' => 44,
            'text' => 'Today, the internet allows companies to advertise through social media, search engines, and influencers.',
        ],
        [
            'start' => 44.5,
            'end' => 54,
            'text' => 'Advertisers use different techniques to persuade customers. One common technique is emotional appeal.',
        ],
        [
            'start' => 54.5,
            'end' => 64,
            'text' => 'Emotional appeal connects a product with feelings such as happiness, freedom, or success.',
        ],
        [
            'start' => 64.5,
            'end' => 73,
            'text' => 'Another technique is celebrity endorsement, where famous people promote products.',
        ],
        [
            'start' => 73.5,
            'end' => 81,
            'text' => 'Advertisers also use repetition to make products more memorable.',
        ],
        [
            'start' => 81.5,
            'end' => 91,
            'text' => 'However, advertising can raise ethical concerns. Some advertisements may be misleading and cause people to make uninformed decisions.',
        ],
        [
            'start' => 91.5,
            'end' => 100,
            'text' => 'Others may target children, who can be easily influenced.',
        ],
        [
            'start' => 100.5,
            'end' => 111,
            'text' => 'In the future, technology may make advertising even more interactive.',
        ],
        [
            'start' => 111.5,
            'end' => 121,
            'text' => 'As consumers become more aware, they want advertising to be honest, transparent, and trustworthy.',
        ],
        [
            'start' => 121.5,
            'end' => 133,
            'text' => 'Advertising is a powerful tool. It can inform, influence, and inspire people, but it should also be responsible and ethical.',
        ],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])