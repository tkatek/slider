@php
    $content['questions'] = [
        "🌍 Moving to another country",
        "💼 Changing your job/career path",
        "👶 Having children",
        "🐶 Having more pets",
        "🎨 Starting a new hobby",
        "🇨🇳 Learning Chinese",
        "🏠 Buying a house",
        "🤖 Getting a robot",
    ];

    $content['title'] = "Speaking";
@endphp

@include("slider.game.spin-wheel", ['content' => $content]) 