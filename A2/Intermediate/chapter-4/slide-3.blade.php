@php
    $content['questions'] = [
        "Have you ever had a bad day? What happened?",
        "Do things usually go right or wrong for you?",
        "Have you ever missed the bus? What did you do?",
        "Have you ever lost something important?",
        "Have you ever been late for school / work? Why?",
        "Have you ever dropped or broken something?",
        "What were you doing when something went wrong?",
        "How did you feel when it happened? (sad, angry, embarrassed)",
    ];
    $content['title'] = "Practice 1: Warm-up";
@endphp
@include("slider.game.spin-wheel", ['content' => $content])