@php
    $content = [
        'title' => 'Listen & type what you hear',
        'subtitle' => '',

        'items' => [
            [
                'audio' => materialAsset('slider/B1/Intermediate/chapter-3/audios/slide15/1.mp3'),
                'script' => "I sometimes wonder what life will be like in the\nfuture.",
                'answer' => 'I sometimes wonder what life will be like in the future.',
            ],
            [
                'audio' => materialAsset('slider/B1/Intermediate/chapter-3/audios/slide15/2.mp3'),
                'script' => "Do you think we'll still drive cars?",
                'answer' => "Do you think we'll still drive cars?",
            ],
            [
                'audio' => materialAsset('slider/B1/Intermediate/chapter-3/audios/slide15/3.mp3'),
                'script' => "Maybe there won't be roads.",
                'answer' => "Maybe there won't be roads.",
            ],
            [
                'audio' => materialAsset('slider/B1/Intermediate/chapter-3/audios/slide15/4.mp3'),
                'script' => "Maybe we won't have to cook our meals.",
                'answer' => "Maybe we won't have to cook our meals.",
            ],
        ],
    ];
@endphp

@include('slider.game.listening-dictation', ['content' => $content])