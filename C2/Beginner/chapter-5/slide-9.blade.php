<?php

$content = [
    'title'    => 'Practice 2',
    'subtitle' => 'Read and answer these questions.',

    'reading_title' => 'Maintaining Professional Connections',

    'passage' => [
        'Meeting someone professionally is just the first step. Maintaining connections requires consistency, tact, and professionalism. A well-timed follow-up shows genuine interest and leaves a positive impression.',
        'Using written messages, such as emails or LinkedIn notes, allows you to summarize your discussion, propose next steps, and reinforce rapport. Always be polite, concise, and respectful of the other person’s time.',
        'Over time, nurturing these relationships can lead to collaboration, mentorship, and career opportunities. Strategic follow-ups separate advanced networkers from casual contacts.',
    ],

    'questions' => [
        'Explain why meeting someone professionally is only the first step in building strong professional relationships.',
        'Discuss how consistency, tact, and professionalism contribute to maintaining long-term connections.',
        'Analyze the role of well-timed follow-ups in creating a positive and lasting professional impression.',
        'Describe how written communication, such as emails or LinkedIn messages, can strengthen rapport and clarify next steps.',
        'Evaluate how strategic follow-ups distinguish advanced networkers from casual contacts and influence career opportunities.',
    ],
];

?>

@include('slider.C2.components.reading-response', ['content' => $content])