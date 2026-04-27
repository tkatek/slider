@php
    $content['questions'] = [
        "What are you doing tomorrow?",
        "When are you going shopping?",
        "What are you eating this evening for dinner?",
        "When are you meeting friends?",
        "Are you watching TV this Saturday?",
        "Are you having dinner at a restaurant this month?",
    ];

    $content['title'] = "Speaking time!";
    $content['subtitle'] = "";
@endphp

@include("slider.game.spin-wheel", ['content' => $content])