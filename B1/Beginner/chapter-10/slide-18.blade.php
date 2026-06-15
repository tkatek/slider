<?php
$content = [
    'title'    => 'Listening',
    'subtitle' => 'Listen to the sentences, and choose the correct answer',
    'type' => 'questions_only',


    'questions' => [
        [
            'prompt'  => 'What happened first?',
            'correct' => 'I finished dinner',
            'options' => ['I watched a movie', 'I finished dinner'],
            'audio'   => materialAsset("slider/B1/Beginner/chapter-10/audios/slide18/1.mp3"),
            'script'  => [
                'I watched a movie after I had finished dinner.',
            ],
        ],
        [
            'prompt'  => 'What happened first?',
            'correct' => 'She left the party',
            'options' => ['She left the party', 'It started to rain'],
            'audio'   => materialAsset("slider/B1/Beginner/chapter-10/audios/slide18/2.mp3"),
            'script'  => [
                'She had left the party before it started to rain.',
            ],
        ],
        [
            'prompt'  => 'What happened first?',
            'correct' => 'They ate all the cake',
            'options' => ['We arrived', 'They ate all the cake'],
            'audio'   => materialAsset("slider/B1/Beginner/chapter-10/audios/slide18/3.mp3"),
            'script'  => [
                'They had eaten all the cake before we arrived.',
            ],
        ],
        [
            'prompt'  => 'What happened first?',
            'correct' => 'I studied a lot',
            'options' => ['I studied a lot', 'I took the exam'],
            'audio'   => materialAsset("slider/B1/Beginner/chapter-10/audios/slide18/4.mp3"),
            'script'  => [
                'I had studied a lot before I took the exam.',
            ],
        ],
        [
            'prompt'  => 'What happened first?',
            'correct' => 'The teacher explained the topic',
            'options' => ['The teacher explained the topic', 'The students asked questions'],
            'audio'   => materialAsset("slider/B1/Beginner/chapter-10/audios/slide18/5.mp3"),
            'script'  => [
                'The teacher had explained the topic before the students asked questions.',
            ],
        ],
        [
            'prompt'  => 'What happened first?',
            'correct' => 'She read the book',
            'options' => ['She watched the movie', 'She read the book'],
            'audio'   => materialAsset("slider/B1/Beginner/chapter-10/audios/slide18/6.mp3"),
            'script'  => [
                'She had read the book before she watched the movie.',
            ],
        ],
        [
            'prompt'  => 'What happened first?',
            'correct' => 'We finished the project',
            'options' => ['We presented the project', 'We finished the project'],
            'audio'   => materialAsset("slider/B1/Beginner/chapter-10/audios/slide18/7.mp3"),
            'script'  => [
                'We had finished the project before we presented it.',
            ],
        ],
        [
            'prompt'  => 'What happened first?',
            'correct' => 'My friend called me',
            'options' => ['My friend called me', 'I left the house'],
            'audio'   => materialAsset("slider/B1/Beginner/chapter-10/audios/slide18/8.mp3"),
            'script'  => [
                'My friend had called me before I left the house.',
            ],
        ],
        [
            'prompt'  => 'What happened first?',
            'correct' => 'We closed the window',
            'options' => ['The storm started', 'We closed the window'],
            'audio'   => materialAsset("slider/B1/Beginner/chapter-10/audios/slide18/9.mp3"),
            'script'  => [
                'We had closed the window before the storm started.',
            ],
        ],
        [
            'prompt'  => 'What happened first?',
            'correct' => 'He did his homework',
            'options' => ['He did his homework', 'He played video games'],
            'audio'   => materialAsset("slider/B1/Beginner/chapter-10/audios/slide18/10.mp3"),
            'script'  => [
                'He had done his homework before he played video games.',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])