@php
    $content = [
        'page_title' => 'Introduce Yourself',
        'title'      => 'Introduce Yourself',
        'subtitle'   => '',

        'desktop_game_width' => 70,
        'desktop_pool_width' => 30,

        'sentences' => [
            "My {{1}} is James, I {{2}} in Canada but I am {{3}} Peru. I am 34 {{4}} old and I {{5}} married. I {{6}} 3 children and I {{7}} in a business company as an engineer.",


        ],

        'answers' => [
            'name',
            'live',
            'from',
            'years',
            'am',
            'have',
            'work',
        ],


    ];
@endphp

@include("slider.game.drag-and-drop-blanks")