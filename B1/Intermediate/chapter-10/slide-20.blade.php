@php
    $content['questions'] = [
        'Describe a brave person you know.',
        'Talk about a time you felt afraid.',
        'Who inspires you?',
        'What gives you strength?',
        'Have you ever been recognized for something?',
        'Describe a famous person who inspires you.',
        'Talk about a small act of kindness.',
        'Describe a time when someone helped you.',
    ];

    $content['title'] = 'Speaking';
    $content['subtitle'] = '';
@endphp

@include("slider.game.spin-wheel", ['content' => $content])