@php
    $content['questions'] = [
        "What is your name?",
        "How old are you?",
        "Which class are you in?",
        "What's your favourite food?",
        "Where do you live?",
        "Which school do you go?",
        "What's your favourite colour?",
        "What's your favourite animal?",
        "What can you do?",
        "What can't you do?",
        "Who do you live with?",
        "What's your favourite school subject?",
    ];

    $content['title'] = "Introduce Yourself";
@endphp

@include("slider.game.spin-wheel", ['content' => $content])