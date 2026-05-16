<?php

$content = [
    'title'    => 'Practice 2',
    'subtitle' => 'Read and answer these questions.',

    'reading_title' => 'Advanced Debate Skills',

    'passage' => [
        'In advanced discussions, debating is not about winning — it’s about exchanging ideas effectively. Strong debaters listen carefully, identify weak points, and respond logically rather than emotionally.',
        'When challenged, confident speakers remain calm and use phrases like “Let me clarify my position” or “That argument overlooks an important factor.” This approach keeps the discussion productive and professional.',
        'Ultimately, advanced debate skills help speakers communicate persuasively while maintaining respect and credibility.',
    ],

    'questions' => [
        'Explain why effective debating is more about exchanging ideas than winning an argument. Support your answer with examples.',
        'Discuss the importance of listening carefully in advanced discussions and how it improves the quality of debate.',
        'Analyze how responding logically rather than emotionally affects the outcome of a debate.',
        'Describe the role of professional language, such as clarification phrases, in maintaining a productive discussion.',
        'Evaluate how advanced debate skills contribute to a speaker’s credibility and persuasive power.',
    ],
];

?>

@include('slider.C2.components.reading-response', ['content' => $content])