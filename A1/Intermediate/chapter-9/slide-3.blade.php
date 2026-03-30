@php
    $content['questions'] = [
        "What do you need to prepare before going on holiday?",
        "What is the perfect time to travel for you?",
        "Do you usually make a to-do list before travelling?",
    ];

    $content['badge'] = "Let‘s spin the wheel";
    $content['title'] = "Let‘s do this warm-up first!";
@endphp
@include("slider.game.spin-wheel", ['content' => $content])