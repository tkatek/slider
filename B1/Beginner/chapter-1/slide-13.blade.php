<?php
$content = [
    'title'    => 'Listen again',
    'subtitle' => 'Read the sentences and tick True or False',
    'type' => 'questions_only',
    'image_panel_col_class'  => 'sm:col-span-0',
    'answer_panel_col_class' => 'sm:col-span-12',
    'audio' => materialAsset('slider/B1/Beginner/chapter-1/audios/slide13.mp3'),

    'script' => [
        'Noelia: Hi, Paul. Have you got a minute? I need a favour.',
        'Paul: Sure. What do you need help with?',
        'Noelia: You know the project for Active Arctic?',
        'Paul: Yes. We finally finished it!',
        'Noelia: Well... I am really sorry, but the client wants some more changes.',
        'Paul: Really? I already changed it many times!',
        'Noelia: I know. I am sorry. Would you be able to work on it this afternoon?',
        'Paul: I am not really sure if I can. I am working on another project today.',
        'Noelia: Oh right. Is there any chance you could work late tonight?',
        "Paul: Sorry, Noelia. I would if I could, but I can't.",
        'Noelia: Why not?',
        'Paul: I am taking my niece to the cinema for her birthday.',
        'Noelia: OK. Then could you come early tomorrow morning?',
        'Paul: Maybe. What time?',
        'Noelia: 6 a.m.?',
        "Paul: That's too early! How about 7 a.m.?",
        'Noelia: OK. Deal!',
        'Paul: Deal!',
    ],
    
    'questions' => [
        [
            'prompt'  => 'Noelia asks Paul for help with a project.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => 'Paul says he is free all afternoon.',
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => 'The client wants more changes to the project.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => 'Paul agrees to work late that night.',
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => 'Paul is taking his niece to the cinema for her birthday.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => 'Paul agrees to come early the next morning.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
