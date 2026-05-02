@php
    $content['questions'] = [
        "How do you usually express your feelings?",
        "What do you think is the best way to express your “negative” emotions?",
        "How do you look when you are angry?",
    ];
    $content['title'] = "Discussion Questions";
@endphp
@include("slider.game.spin-wheel", ['content' => $content])