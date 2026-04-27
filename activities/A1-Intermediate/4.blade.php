@php
    $content['questions'] = [
        "When were you born?",
        "What’s your favourite sport?",
        "Do you have a big family?",
        "How often do you go to the cinema?",
        "Can you speak other languages?",
        "What are your hobbies?",
    ];

    $content['title'] = "Spinning Wheel";
@endphp

@include("slider.game.spin-wheel", ['content' => $content])