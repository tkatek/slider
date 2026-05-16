<?php

$content = [
    'title'    => 'Practice 2',
    'subtitle' => 'Read and answer these questions.',

    'reading_title' => '',

    'passage' => [
        'When people speak naturally, they don\'t plan every sentence. They react. They pause. They sometimes change their minds mid-sentence. That\'s not a mistake - that\'s real communication. The moment I stopped trying to sound perfect, my English started sounding confident.',
    ],

    'questions' => [
        'Explain why reacting in real time is an important part of natural communication.',
        'Discuss the role of pauses and mid-sentence changes in sounding confident rather than perfect.',
        'Analyze how the desire to sound perfect can negatively affect spoken English.',
        'Describe what the passage suggests about the difference between "correct" English and confident English.',
        'Evaluate the idea that mistakes are a natural and valuable part of real communication.',
    ],
];

?>

@include('slider.C2.components.reading-response', ['content' => $content])