<?php
$content = [
    'video'      => materialAsset(''),
    'thumbnail'  => materialAsset('slider/B1/Intermediate/chapter-3/img/slide9.webp'),
    'isQuiz'     => 1,

    'questions' => [
        [
            'time' => 14500,
            'type' => 'multiple_choice',
            'question' => 'What might many companies use autonomous AI systems for by 2028?',
            'options' => [
                'Building houses',
                'Teaching in schools',
                'Answering customer questions and providing support',
                'Designing clothes',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 30000,
            'type' => 'multiple_choice',
            'question' => 'Why are some people concerned about increased AI surveillance?',
            'options' => [
                'It may increase internet speed.',
                'It could reduce privacy.',
                'It may improve customer service.',
                'It could create more jobs.',
            ],
            'correct_answer' => 1,
            'points' => 10,
        ],
        [
            'time' => 45000,
            'type' => 'multiple_choice',
            'question' => 'What could happen if deepfakes become more common online?',
            'options' => [
                'People may trust information more easily.',
                'It may become easier to identify fake content.',
                'It could make it harder to know what is real.',
                'Deepfakes may disappear completely.',
            ],
            'correct_answer' => 2,
            'points' => 10,
        ],
        [
            'time' => 60000,
            'type' => 'true_false',
            'question' => 'Predictive AI might help governments identify problems and prevent crime before it happens.',
            'correct_answer' => true,
            'points' => 10,
        ],
        [
            'time' => 74000,
            'type' => 'true_false',
            'question' => 'The passage states that AI-generated influencers will definitely replace all human content creators.',
            'correct_answer' => false,
            'points' => 10,
        ],
    ],

    'subtitles' => [
        ['start' => 0, 'end' => 6, 'text' => 'AI is growing very quickly, and our lives may change a lot by 2028.'],
        ['start' => 6, 'end' => 10, 'text' => 'Here are five predictions about the future.'],

        ['start' => 10, 'end' => 13, 'text' => 'One. More Autonomous Systems.'],
        ['start' => 13, 'end' => 22, 'text' => 'Many companies may use autonomous AI systems to answer customer questions and provide support without human workers.'],

        ['start' => 22, 'end' => 25, 'text' => 'Two. Predictive AI.'],
        ['start' => 25, 'end' => 34, 'text' => 'Governments might use predictive AI to identify problems and help prevent crime before it happens.'],

        ['start' => 34, 'end' => 37, 'text' => 'Three. Privacy Concerns.'],
        ['start' => 37, 'end' => 47, 'text' => 'Some people worry that increased surveillance could reduce our privacy because AI may monitor more of our daily activities.'],

        ['start' => 47, 'end' => 51, 'text' => 'Four. Deepfakes and Online Information.'],
        ['start' => 51, 'end' => 62, 'text' => 'Deepfakes could become more common online. People might use them to manipulate information, making it harder to know what is real.'],

        ['start' => 62, 'end' => 66, 'text' => 'Five. AI Influencers and Creativity.'],
        ['start' => 66, 'end' => 78, 'text' => 'AI-generated influencers may become very popular on social media. Some people think this could affect human creativity because AI might create more content than people do.'],

        ['start' => 78, 'end' => 86, 'text' => 'AI is developing fast, and nobody knows exactly what will happen.'],
        ['start' => 86, 'end' => 92, 'text' => 'Which of these predictions do you think will come true?'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])