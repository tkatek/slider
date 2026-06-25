@php
    $content = [
        'title' => 'Listening Dictation',
        'subtitle' => 'Listen, then write the full sentence you will listen to:',

        'items' => [
            [
                'audio' => materialAsset('slider/B1/Beginner/chapter-8/audios/1.mp3'),
                'script' => "If I had a million pounds, I'd buy a big house in the countryside.",
                'answer' => "If I had a million pounds, I'd buy a big house in the countryside.",
            ],
            [
                'audio' => materialAsset('slider/B1/Beginner/chapter-8/audios/2.mpeg'),
                'script' => 'If I were the boss, I would let people work from home.',
                'answer' => 'If I were the boss, I would let people work from home.',
            ],
        ],
    ];
@endphp

@include('slider.game.listening-dictation', ['content' => $content])