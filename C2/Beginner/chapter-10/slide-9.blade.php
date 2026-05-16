<?php

$content = [
    'title'    => 'Practice 2',
    'subtitle' => 'Read and answer these questions.',

    'reading_title' => '',

    'passage' => [
        'When I first started speaking English, I translated everything in my head. People understood me, but their reactions felt strange. Later, I realized my sentences were correct — just not natural. Once I stopped translating and started copying how native speakers actually talk, my confidence improved. Fluency isn\'t about big words; it\'s about sounding relaxed and real.',
    ],

    'questions' => [
        'Explain the difference between literal translation and natural English speech, using examples from the text.',
        'Discuss how overthinking language can affect fluency and communication confidence.',
        'Analyze why copying native speakers can help improve natural flow in speaking.',
        'Describe what fluency really means according to the passage.',
        'Evaluate the idea that using big words is less important than sounding relaxed and real when speaking a language.',
    ],
];

?>

@include('slider.C2.components.reading-response', ['content' => $content])