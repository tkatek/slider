@php
    $content['questions'] = [
        "Where are you from?",
        "What do you do?",
        "Why do you need English?",
        "Do you like sports?",
        "What’s your favourite hobby?",
    ];
    $content['title'] = "Let's Get to Know You!";
@endphp
@include("slider.game.spin-wheel", ['content' => $content])