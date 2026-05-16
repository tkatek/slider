<?php

$content = [
    'title'    => 'Practice 2',
    'subtitle' => 'Read and answer these questions.',

    'reading_title' => 'Advanced Networking Skills',

    'passage' => [
        'Networking is not just about exchanging business cards. Advanced networking is about creating meaningful professional relationships. This requires confidence, active listening, and strategic communication.',
        'An advanced professional introduces themselves clearly, shows genuine interest in the other person, and asks insightful questions. They follow up after initial meetings to nurture the connection, maintaining rapport over time.',
        'Effective networking opens doors to collaboration, mentorship, and career opportunities. Mastering this skill can set you apart in competitive industries.',
    ],

    'questions' => [
        'Explain why advanced networking goes beyond simply exchanging business cards. Use examples to support your answer.',
        'Discuss the role of confidence, active listening, and strategic communication in creating meaningful professional relationships.',
        'Analyze how asking insightful questions and showing genuine interest can strengthen professional connections.',
        'Describe the importance of following up after initial meetings and maintaining professional rapport over time.',
        'Evaluate how mastering networking skills can impact career opportunities and professional growth.',
    ],
];

?>

@include('slider.C2.components.reading-response', ['content' => $content])