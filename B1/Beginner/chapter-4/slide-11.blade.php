<?php
$content = [
    'title'    => 'Listening',
    'subtitle' => 'Melissa and Robin talk about a film, Listen and answer the questions.',
    'type' => 'questions_only',
    'audio' => materialAsset('slider/B1/Beginner/chapter-4/audios/slide11.mp3'),

    'script' => [
        'Melissa: Have you seen the new James Bond film?',
        'Robin: Yes, have you?',
        'Melissa: Yes, I’ve seen it, yeah. Not very good, is it?',
        'Robin: Oh, I don’t agree. I really enjoyed it.',
        'Melissa: Well, I thought it was boring. James Bond films are always the same. James Bond is cool, he goes to some beautiful country and he meets a beautiful girl. The bad guys all die at the end. You always know what’s going to happen. Of course the special effects were great, but that’s about all.',
        'Robin: Well, it’s not meant to be too serious, you know. I thought it was fun, I liked it.',
        'Melissa: Did you really?',
        'Robin: Yes, I did. I thought it was exciting. It was great to watch, the actors were great and James Bond was fantastic. I’m going to see it again this weekend. Do you want to come?',
        'Melissa: What, again? No thanks, once was enough. I’m going to see the new Tarantino film.',
    ],

    'questions' => [
        [
            'prompt'  => 'What film are they talking about?',
            'correct' => 'The New James Bond Film',
            'options' => [
                'The New James Bond Film',
                'The New Tarantino Film',
            ],
        ],
        [
            'prompt'  => 'Did Robin and Melissa like the film?',
            'correct' => 'Robin Liked It, But Melissa Didn’t.',
            'options' => [
                'Robin Liked It, But Melissa Didn’t.',
                'Melissa Liked It, But Robin Didn’t.',
                'They Both Liked It.',
                'They Both Didn’t Like It.',
            ],
        ],
        [
            'prompt'  => 'Who thinks James Bond films are always the same?',
            'correct' => 'Melissa',
            'options' => ['Robin', 'Melissa'],
        ],
        [
            'prompt'  => 'Who thinks James Bond films are just for fun?',
            'correct' => 'Robin',
            'options' => ['Robin', 'Melissa'],
        ],
        [
            'prompt'  => 'Who thinks the special effects were good?',
            'correct' => 'Melissa',
            'options' => ['Robin', 'Melissa'],
        ],
        [
            'prompt'  => 'Who is going to see the film again?',
            'correct' => 'Robin',
            'options' => ['Robin', 'Melissa'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])