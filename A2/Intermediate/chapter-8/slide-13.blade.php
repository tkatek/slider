@php
    $content['questions'] = [
        "What if you have a lot of money?",
        "What if you are tired at work?",
        "What if you have an interview?",
        "What if you lose your phone?",
        "What if you see a mouse?",
        "What if you win the lottery?",
    ];
    $content['title'] = "Practice.5 Speaking Time!";
    $content['subtitle'] = "What if?!!!";
@endphp
@include("slider.game.spin-wheel", ['content' => $content])
