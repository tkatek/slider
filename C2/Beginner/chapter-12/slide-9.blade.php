<?php

$content = [
    'title'    => 'Practice 2',
    'subtitle' => 'Read and answer these questions.',

    'reading_title' => 'Disagreeing with Confidence',

    'passage' => [
        'For a long time, I avoided disagreeing because I didn\'t want conflict. But I learned that confidence isn\'t about being loud — it\'s about being clear. Now, when I disagree, I don\'t apologize for my opinion. I listen, I respond calmly, and I stand by what I believe.',
    ],

    'questions' => [
        'Explain how the speaker\'s understanding of confidence changes over time in the passage.',
        'Discuss the difference between avoiding conflict and expressing disagreement confidently.',
        'Analyze why clarity and calm responses are more effective than loudness in disagreements.',
        'Describe the role of listening in handling opposing views respectfully.',
        'Evaluate the idea that you should not apologize for your opinion when expressing disagreement.',
    ],
];

?>

@include('slider.C2.components.reading-response', ['content' => $content])