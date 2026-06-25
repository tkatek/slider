@php
    $content['questions'] = [
        'Why do we need to be inspired?',
        'Who inspires you the most? Why?',
        'What qualities make a person inspiring?',
        'Is there a book, friend, celebrity, etc. which has influenced your life?',
        'What is a place where you feel motivated?',
    ];

    $content['title'] = 'Discussion';
    $content['subtitle'] = '';
@endphp

@include("slider.game.spin-wheel", ['content' => $content])