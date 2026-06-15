@php
    $content['title'] = 'Discussion Questions';
    $content['subtitle'] = 'What if?!';
    
    $content['questions'] = [
        'What would you do if you won a million dollars?',
        'What if you could travel anywhere tomorrow?',
        "What if you didn't need to sleep?",
        'What if people could read minds?',
        'What if there were no internet?',
    ];
@endphp

@include("slider.game.spin-wheel", ['content' => $content])