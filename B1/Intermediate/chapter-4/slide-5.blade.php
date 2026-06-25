<?php
$content = [
    'video'     => materialAsset(''),
    'thumbnail' => materialAsset(''),
    'isQuiz'   => 0,

    'questions' => [
        [
            'time' => 8000,
            'type' => 'multiple_choice',
            'question' => 'What is a brand mainly?',
            'options' => [
                'A type of advertisement',
                'A symbol that represents a product or company',
                'A social media account',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 25000,
            'type' => 'multiple_choice',
            'question' => 'Branding originally started with:',
            'options' => [
                'Online marketing',
                'Marks on cattle',
                'TV commercials',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 42000,
            'type' => 'multiple_choice',
            'question' => 'A strong brand can make people feel:',
            'options' => [
                'Confused and uncertain',
                'A sense of belonging',
                'Bored and uninterested',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 60000,
            'type' => 'multiple_choice',
            'question' => 'Today, brands mainly:',
            'options' => [
                'Only sell products',
                'Share stories, information, and experiences',
                'Focus only on prices',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 78000,
            'type' => 'multiple_choice',
            'question' => 'One important role of brands is to:',
            'options' => [
                'Stop people from buying products',
                'Influence people’s decisions',
                'Replace customers',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 95000,
            'type' => 'multiple_choice',
            'question' => 'What do successful brands build with customers?',
            'options' => [
                'Distance',
                'Relationships',
                'Rules',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        ['start' => 0, 'end' => 6, 'text' => 'Brands are all around us. We see them every day in shops, online, and on social media. But what exactly is a brand?'],
        ['start' => 6.5, 'end' => 18, 'text' => 'A brand is more than a logo, advertising, or marketing. A successful brand guarantees a certain level of quality and helps people trust a product or service.'],
        ['start' => 18.5, 'end' => 25, 'text' => 'It can also create emotions and give people a sense of belonging.'],
        ['start' => 25.5, 'end' => 34, 'text' => 'The history of branding goes back many years. Farmers used special marks on their cattle to show ownership.'],
        ['start' => 34.5, 'end' => 43, 'text' => 'Later, companies put their brands on wooden cases to guarantee the quality of their products.'],
        ['start' => 43.5, 'end' => 53, 'text' => 'Today, brands represent much more than products. They share stories, information, and experiences.'],
        ['start' => 53.5, 'end' => 62, 'text' => 'Some brands help people communicate, while others help them find information or build relationships.'],
        ['start' => 62.5, 'end' => 74, 'text' => 'Strong brands are built on important elements such as confidence, passion, action, security, and culture.'],
        ['start' => 74.5, 'end' => 84, 'text' => 'These qualities help companies connect with their customers and influence the choices people make.'],
        ['start' => 84.5, 'end' => 95, 'text' => 'Brands communicate with us every day. They encourage us to use their products, trust their services, and engage with their ideas.'],
        ['start' => 95.5, 'end' => 104, 'text' => 'The most successful brands create strong relationships with their customers and become an important part of their lives.'],
        ['start' => 104.5, 'end' => 116, 'text' => 'Think about the brands you use most often. Why do you trust them? How do they influence your choices? And what message do they communicate to the world?'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])