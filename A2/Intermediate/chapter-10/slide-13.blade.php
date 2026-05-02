@php
    $content = [
        'page_title' => 'Practice 3',
        'title' => 'Practice 3',
        'subtitle' => 'What are some of the communication problems do we face?<br>Listen to the audio & match with the correct phrase',
        'answer_tile_type' => 'audio',

        'sentences' => [
            "{{1}} <span class='font-black text-slate-900 dark:text-slate-50'>Sorry, Can you say that again?</span>",
            "{{2}} <span class='font-black text-slate-900 dark:text-slate-50'>What! I didn't catch that!</span>",
            "{{3}} <span class='font-black text-slate-900 dark:text-slate-50'>Sorry, I lost you. Can you repeat that again?</span>",
            "{{4}} <span class='font-black text-slate-900 dark:text-slate-50'>I can't hear you very well.</span>",
            "{{5}} <span class='font-black text-slate-900 dark:text-slate-50'>You're breaking up!</span>",
            "{{6}} <span class='font-black text-slate-900 dark:text-slate-50'>Let me turn up the volume.</span>",
            "{{7}} <span class='font-black text-slate-900 dark:text-slate-50'>Can you hear me?</span>",
            "{{8}} <span class='font-black text-slate-900 dark:text-slate-50'>What about now?</span>",
            "{{9}} <span class='font-black text-slate-900 dark:text-slate-50'>There's an echo now.</span>",
            "{{10}} <span class='font-black text-slate-900 dark:text-slate-50'>The connection is too slow.</span>",
            "{{11}} <span class='font-black text-slate-900 dark:text-slate-50'>Are you still there?</span>",
            "{{12}} <span class='font-black text-slate-900 dark:text-slate-50'>We can try again.</span>",
        ],

        'answers' => [
            [
                'text' => 'Sorry, Can you say that again?',
                'audio' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/1.mp3'),
            ],
            [
                'text' => "What! I didn't catch that!",
                'audio' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/2.mp3'),
            ],
            [
                'text' => 'Sorry, I lost you. Can you repeat that again?',
                'audio' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/3.mp3'),
            ],
            [
                'text' => "I can't hear you very well.",
                'audio' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/4.mp3'),
            ],
            [
                'text' => "You're breaking up!",
                'audio' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/5.mp3'),
            ],
            [
                'text' => 'Let me turn up the volume.',
                'audio' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/6.mp3'),
            ],
            [
                'text' => 'Can you hear me?',
                'audio' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/7.mp3'),
            ],
            [
                'text' => 'What about now?',
                'audio' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/8.mp3'),
            ],
            [
                'text' => "There's an echo now.",
                'audio' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/9.mp3'),
            ],
            [
                'text' => 'The connection is too slow.',
                'audio' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/10.mp3'),
            ],
            [
                'text' => 'Are you still there?',
                'audio' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/11.mp3'),
            ],
            [
                'text' => 'We can try again.',
                'audio' => materialAsset('slider/A2/Intermediate/chapter-10/audios/slide14/12.mp3'),
            ],
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")