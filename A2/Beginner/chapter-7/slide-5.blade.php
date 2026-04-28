@php
    $content['questions'] = [
        "Do you have long or short hair?",
        "Are you tall or short?",
        "What colour are your eyes?",
        "What does your best friend look like?",
        "Who is the tallest person you know?",
        "Do you prefer long hair or short hair? Why?",
    ];
    $content['title'] = "Let’s spin the wheel!";
    $content['page_title'] = "A2 Unit 3: Appearances";
    $content['subtitle'] = "Discussion";
@endphp
@include("slider.game.spin-wheel", ['content' => $content])