@php
    $content['questions'] = [
        "What motivates you to study or work hard?",
        "What challenges do you face as a student while learning English?",
        "Is learning English sometimes difficult? Why?",
        "Who encourages you in your life?",
        "How can you keep yourself motivated?",
        "Do you think mistakes help people learn? Why?",
    ];

    $content['title'] = "Let's Talk About Motivation!";
@endphp

@include("slider.game.spin-wheel", ['content' => $content])