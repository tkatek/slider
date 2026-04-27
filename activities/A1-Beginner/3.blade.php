@php
    $content['questions'] = [
        "What’s your name?",
        "How old are you?",
        "When is your birthday?",
        "What grade are you in?",
        "What’s your surname?",
        "Where do you live?",
        "What is your favourite food?",
        "What is your favourite movie?",
        "What is your hobby?",
        "What makes you happy?",
    ];

    $content['title'] = "Spinning Wheel";
@endphp

@include("slider.game.spin-wheel", ['content' => $content])