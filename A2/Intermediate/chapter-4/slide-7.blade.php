@php
    $content = [
        'page_title' => 'Practice 3',
        'title' => 'Practice 3',
        'subtitle' => 'Drag & drop the right word to fill in the sentences',
        'sentences' => [
            "I {{1}} my coffee.",
            "I {{2}} my phone.",
            "I {{3}} my keys.",
            "I {{4}} the bus.",
            "I {{5}} my finger.",
            "I {{6}} my head.",
            "I {{7}} my bag.",
        ],
        'answers' => [
            'spilled',
            'dropped',
            'lost',
            'missed',
            'cut',
            'hit',
            'lost',
        ],
    ];
@endphp

@include('slider.game.drag-and-drop-blanks', ['content' => $content])