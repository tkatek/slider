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
$content['subtitle'] = "Make Future Speculations using will (won’t), may (may not), or might (might not)";
@endphp

@include("slider.game.spin-wheel", ['content' => $content]) 