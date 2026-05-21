@php
    $content['questions'] = [
        "What problems can people have with neighbours?",
        "Have you ever had a noisy neighbour?",
        "What should you do if someone is too loud?",
        "Is it important to complain politely? Why?",
        "What makes someone a good neighbour?",
    ];

    $content['title'] = "Practice 1: Warm-up";
@endphp

@include("slider.game.spin-wheel", ['content' => $content])