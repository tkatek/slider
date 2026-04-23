@php
    $content['questions'] = [
        "What were you doing yesterday at 7 am?",
        "What were you doing this time two days ago?",
        "What were you doing at 8 am this morning?",
        "What were you doing at 9 pm last night?",
        "What were you doing before this class?",
        "What were you doing before you went to bed last night?",
        "What were you doing at 9 am three days ago?",
    ];
    $content['title'] = "What were you doing?";
@endphp
@include("slider.game.spin-wheel", ['content' => $content])
