@php
    $content['questions'] = [
        "How do you usually talk to your friends?",
        "Do you prefer texting or calling?",
        "What apps do you use every day?",
        "Do you use social media to stay in touch?",
        "How often do you check your phone?",
        "Do you prefer voice messages or typing?",
        "Is it important to stay in touch with family? Why?",
    ];
    $content['title'] = "Discussion";
@endphp
@include("slider.game.spin-wheel", ['content' => $content])
