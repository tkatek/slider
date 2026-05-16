<?php

$content = [
    'title'    => 'Practice 2',
    'subtitle' => 'Read and answer these questions.',

    'reading_title' => 'Using Humor to Manage Tension',

    'passage' => [
        'Using humor is a powerful tool to manage tension. Advanced speakers know when a light joke can ease nerves and when it may backfire.',
        'Humor should be inclusive, relevant, and non-offensive.',
        'Even in serious environments, a clever comment or light observation can make colleagues smile and reduce stress. The key is timing and confidence — say it calmly, and don\'t overdo it. Humor becomes a tool for connection and composure, not distraction.',
    ],

    'questions' => [
        'Explain how humor can be used as a tool to manage tension in professional or serious environments.',
        'Discuss the risks of using humor in conversations and why timing and appropriateness are essential.',
        'Analyze the qualities of effective humor in communication, as mentioned in the passage.',
        'Describe how confidence influences the success of humor in reducing stress and building connection.',
        'Evaluate the idea that humor should be a tool for composure and connection rather than distraction.',
    ],
];

?>

@include('slider.C2.components.reading-response', ['content' => $content])