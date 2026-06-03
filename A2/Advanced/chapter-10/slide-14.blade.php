@php
    $content['questions'] = [
        "Have you ever had any problems with your neighbours? What happened?",
        "What are some common reasons why neighbours might complain about each other?",
        "Have you ever had to talk to your neighbours about a problem? How did it go?",
        "What do you think is the best way to solve problems with neighbours?",
        "Have you ever had a noisy neighbour? How did you deal with it?",
        "What should you do if your neighbour's pet is causing problems for you?",
        "Do you think neighbours should try to solve problems on their own before involving authorities?",
        "Can you share a funny or interesting story about a neighbour complaint you've heard or experienced?",
    ];

    $content['title'] = "Practice 5: Speaking Time!";
@endphp

@include("slider.game.spin-wheel", ['content' => $content])