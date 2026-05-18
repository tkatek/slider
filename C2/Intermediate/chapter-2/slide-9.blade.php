<?php

$content = [
    'title'    => 'Practice 2',
    'subtitle' => 'Read and answer these questions.',

    'reading_title' => '',

    'passage' => [
        "I sent a package to Canada last Monday, but the recipient hadn't received it by Thursday. I called the post office and asked about the tracking status. The clerk explained there was a minor delay due to customs inspection. I asked if I could upgrade to express delivery to ensure faster arrival. They helped me fill out the upgrade form and reassured me it would arrive within two days. I stayed polite and patient throughout the call, which made communication smooth and effective.",
    ],

    'questions' => [
        'Describe the problem the sender faced and how they responded to it.',
        'Explain the role of tracking and communication in resolving delivery issues.',
        'Discuss why customs inspections can cause delays in international shipping.',
        'Analyze how upgrading to express delivery helped solve the problem.',
        'Evaluate how politeness and patience affected the outcome of the phone call.',
    ],
];

?>

@include('slider.C2.components.reading-response', ['content' => $content])