@php
    $content = [
        'page_title' => 'Warm-up.2',
        'title'      => 'Practice 2: Warm-up',
        'subtitle'   => 'Listen & complete the missing words in the dialogue<br>Complete the dialogues with must, might, might not or can’t.',

        'audio' => materialAsset('slider/B1/Intermediate/chapter-2/audios/slide4.mp3'),

        'script' => [
            'A: Someone is knocking at the door.',
            'B: It must be the pizza delivery man. I ordered a pizza.',
            'A: I know you ordered a pizza. But it can’t be him, because you ordered the pizza five minutes ago.',
            'B: Yes, you are right. Then it might be your sister.',
            'A: No, it can’t be my sister, she’s out of town.',
            'B: Well, then just open the door; it might be important.',
        ],

        'sentences' => [
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-orange-500 text-sm font-black text-white'>A</span> Someone is knocking at the door.",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-purple-500 text-sm font-black text-white'>B</span> It {{1}} be the pizza delivery man. I ordered a pizza.",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-orange-500 text-sm font-black text-white'>A</span> I know you ordered a pizza. But it {{2}} be him, because you ordered the pizza five minutes ago.",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-purple-500 text-sm font-black text-white'>B</span> Yes, you are right. Then it {{3}} be your sister.",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-orange-500 text-sm font-black text-white'>A</span> No, it {{4}} be my sister, she's out of town.",
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-purple-500 text-sm font-black text-white'>B</span> Well, then just open the door; it {{5}} be important.",
        ],

        'answers' => [
            'must',
            "can't",
            'might',
            "can't",
            'might',
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")