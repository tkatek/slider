<?php
$content = [
    'type' => 'emoji',

    'title'    => 'Practice 4',
    'subtitle' => 'Read and choose right or wrong.',

    'questions' => [
        [
            'emoji' => '☀️🏃',
            'prompt' => 'You can do outdoor activities when the weather is sunny.',
            'correct' => 'True',
            'options' => ['True', 'False']
        ],
        [
            'emoji' => '⛈️🏠',
            'prompt' => 'During stormy weather, you should stay inside.',
            'correct' => 'True',
            'options' => ['True', 'False']
        ],
        [
            'emoji' => '🤔🌦️',
            'prompt' => 'No one knows what tomorrow’s weather will be.',
            'correct' => 'False',
            'options' => ['False', 'True']
        ],
        [
            'emoji' => '☀️☁️',
            'prompt' => 'Sunny weather means dark clouds in the sky.',
            'correct' => 'False',
            'options' => ['True', 'False']
        ],
        [
            'emoji' => '☀️🛼',
            'prompt' => 'What can you do when it is sunny?',
            'correct' => 'Roller skate',
            'options' => ['Roller skate', 'Play board games', 'Stay inside all day', 'Watch lightning']
        ],
        [
            'emoji' => '🧑‍🔬🌤️',
            'prompt' => 'Weather scientists can guess tomorrow’s weather.',
            'correct' => 'True',
            'options' => ['True', 'False']
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])