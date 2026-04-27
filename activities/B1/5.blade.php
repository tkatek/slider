@php
    $content['questions'] = [
        "Tell us about your name. Where did it come from?",
        "What do you like doing in your free time?",
        "What kind of weather do you like and why?",
        "Tell us about your family.",
        "Tell us about something that makes you feel happy.",
        "Tell us about your favourite food. Do you know its ingredients?",
        "What’s your favourite sport? How often do you practise it?",
    ];

    $content['title'] = "Introduce Yourself";
@endphp

@include("slider.game.spin-wheel", ['content' => $content])