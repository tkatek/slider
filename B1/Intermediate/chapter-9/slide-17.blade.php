<?php
$content = [
    'title'    => 'Listening',
    'subtitle' => 'Listen to someone talking about Shakespeare whose works influenced her.',
    'type'     => 'audio',

    'audio' => materialAsset('slider/B1/Intermediate/chapter-9/audios/slide17.mp3'),

    'question_prompt_label'  => 'True or False',

    'script' => [
        'Someone whose work influenced me a lot is William Shakespeare. He is an English writer who wrote plays and poems. His most famous works include Romeo and Juliet, which made a strong impression on me. He was born in 1564 and became one of the most important writers in English literature. His plays, which are still performed today, are known all over the world. They mix drama, comedy, and tragedy. His works, which often explore love, power, and human nature, include unforgettable characters such as kings, lovers, and villains. He wrote in a style that is powerful and poetic. Reading his plays as a teenager is what made me interested in literature.',
    ],

    'questions' => [
        [
            'prompt'  => 'Shakespeare wrote only novels.',
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => 'His plays are still performed today.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => 'His stories often include themes like love and power.',
            'correct' => 'True',
            'options' => ['True', 'False'],
        ],
        [
            'prompt'  => 'He had no influence on modern literature.',
            'correct' => 'False',
            'options' => ['True', 'False'],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])