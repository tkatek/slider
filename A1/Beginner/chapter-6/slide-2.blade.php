@php
    $content['questions'] = [
        "What’s your favourite food?",
        "What’s your favourite sport?",
        "Do you have any pets?",
        "How often do you practise sports?",
        "What do you do?",
    ];

    $content['title'] = "Let’s do this warm-up first!";
@endphp

@include("slider.game.spin-wheel", ['content' => $content])