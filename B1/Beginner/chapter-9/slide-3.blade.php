@php
    $content['title'] = 'Warm up<br>Practice 1';
    $content['subtitle'] = 'What would you do if.....?';
    
    $content['questions'] = [
        'What would you do if you saw a ghost?',
        'What would you do if you travelled into the future?',
        'What would you do if you were a robot?',
        'What would you do if a robber asked for all your money?',
        'What would you do if you were the richest man on Earth?',
    ];
@endphp

@include("slider.game.spin-wheel", ['content' => $content])