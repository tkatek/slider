@php
    $content = [
        'page_title' => 'Practice 6',
        'title' => 'Practice 6',
        'subtitle' => 'Fill in with the suitable word',
        'sentences' => [
            "This seafood {{1}} is really tasty.",
            "I can’t eat spicy {{2}}.",
            "I don't enjoy preparing three {{3}} a day every day.",
            "Doctors recommend at least 3 {{4}} a day.",
            "The typical {{5}} in the UK is fish and chips.",
            "The chef specializes in French {{6}}.",
        ],
        'answers' => [
            'dish',
            'food',
            'meals',
            'meals',
            'dish',
            'cuisine',
        ],
    ];
@endphp

@include('slider.game.drag-and-drop-blanks', ['content' => $content])