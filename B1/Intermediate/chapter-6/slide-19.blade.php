@php
    $content = [
        'page_title' => 'Listen Again',
        'title'      => 'Listen Again',
        'subtitle'   => 'Fill in the blanks using the words from the box.',

        'audio' => materialAsset('slider/B1/Intermediate/chapter-6/audios/slide18.mp3'),

    'script' => [
        'Do you like shopping?',
        'Yes, I’m a shopaholic.',
        'What do you usually shop for?',
        'I usually shop for clothes. I’m a big fashion fan.',
        'Where do you go shopping?',
        'At some fashion boutiques in my neighborhood.',
        'Are there many shops in your neighborhood?',
        'Yes. My area is the city center, so I have many choices of where to shop.',
        'Do you spend much money on shopping?',
        'Yes and I’m usually broke at the end of the month.',
        'Do you usually shop online? What items?',
        'Yes, but not really often. I only buy furniture online.',
        'What’s the difference between shopping online and offline?',
        'Unlike shopping offline, you cannot try on the pieces of clothes or check the material when shopping online.',
    ],

        'sentences' => [
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-blue-500 text-sm font-black text-white'>A</span> Do you spend much {{1}} on shopping?",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-emerald-500 text-sm font-black text-white'>B</span> Yes, and I’m usually {{2}} at the end of the month.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-blue-500 text-sm font-black text-white'>A</span> Do you usually shop {{3}}? What items?",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-emerald-500 text-sm font-black text-white'>B</span> Yes, but not really {{4}}. I only buy {{5}} online.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-blue-500 text-sm font-black text-white'>A</span> What’s the {{6}} between shopping online and offline?",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-emerald-500 text-sm font-black text-white'>B</span> Unlike shopping offline, you cannot {{7}} on the pieces of {{8}} or check the {{9}} when shopping online.",
        ],

        'answers' => [
            'money',
            'broke',
            'online',
            'often',
            'furniture',
            'difference',
            'try',
            'clothes',
            'material',
        ],

        'word_bank' => [
            'money',
            'often',
            'furniture',
            'try',
            'difference',
            'broke',
            'online',
            'clothes',
            'material',
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")