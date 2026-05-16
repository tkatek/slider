<?php

$content = [
    'title'    => 'Practice 2',
    'subtitle' => 'Read and answer these questions.',

    'reading_title' => 'Confidence in Communication',

    'passage' => [
        'Confidence in communication doesn’t always mean certainty. Advanced speakers know how to manage uncertainty without revealing it. They pause, choose their words carefully, and maintain a calm tone.',
        'Instead of using fillers like “um” or “maybe,” they rely on structured phrases that buy time and project control. This creates the impression of confidence, even in unfamiliar situations.',
    ],

    'questions' => [
        'Explain why balance is essential in professional persuasion and how it influences communication outcomes.',
        'Discuss the importance of relying on logic, evidence, and respectful language instead of emotional arguments in professional settings.',
        'Analyze how acknowledging opposing views contributes to effective persuasion and reduces resistance.',
        'Evaluate the impact of diplomatic phrases like “I see your point” or “From my perspective” on professional discussions.',
        'Describe how effective persuasion can build trust, strengthen collaboration, and improve decision-making outcomes in the workplace.',
    ],
];

?>

@include('slider.C2.components.reading-response', ['content' => $content])