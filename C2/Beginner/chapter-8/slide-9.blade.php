<?php

$content = [
    'title'    => 'Practice 2',
    'subtitle' => 'Read and answer these questions.',

    'reading_title' => 'Awkward Moments',

    'passage' => [
        'Awkward moments happen to everyone. The key is to stay composed and not panic. Advanced communicators acknowledge mistakes or unexpected questions politely, use phrases to regain control, and continue confidently.',
        'A calm tone, short pauses, and polite acknowledgment can transform embarrassment into professionalism. The goal is to maintain credibility and even strengthen relationships by handling situations gracefully.',
    ],

    'questions' => [
        'Explain why staying composed during awkward moments is important for professional communication.',
        'Discuss strategies advanced communicators use to handle mistakes or unexpected questions gracefully.',
        'Analyze how a calm tone and short pauses can transform embarrassment into professionalism.',
        'Evaluate the role of polite acknowledgment in maintaining credibility during difficult situations.',
        'Describe how handling awkward moments effectively can strengthen professional relationships.',
    ],
];

?>

@include('slider.C2.components.reading-response', ['content' => $content])