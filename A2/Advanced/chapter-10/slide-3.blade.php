@php
    $content['questions'] = [
        "What problems can people have with neighbors?",
        "Have you ever had a noisy neighbor?",
        "What should you do if someone is too loud?",
        "Is it important to complain politely? Why?",
        "What makes someone a good neighbor?",
    ];

    $content['title'] = "Practice 1: Warm-up";
@endphp

@include("slider.game.spin-wheel", ['content' => $content])