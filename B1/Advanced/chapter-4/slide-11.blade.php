@php
    $content = [
        'page_title' => 'Practice 4',
        'title'      => 'Practice 4',
        'subtitle'   => 'Drag and drop the words to complete the sentences using the present continuous (active or passive)',

        'sentences' => [
            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-green-500 text-sm font-black text-white'>1</span> In this video, we {{1}} climate change and how it {{2}} our planet.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-green-800 text-sm font-black text-white'>2</span> Human activities, particularly the burning of fossil fuels, {{3}} large amounts of greenhouse gases.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-green-500 text-sm font-black text-white'>3</span> These greenhouse gases trap heat and {{4}} the Earth’s temperature to rise.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-green-800 text-sm font-black text-white'>4</span> Extreme weather events like hurricanes, floods, and droughts {{5}} around the world.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-green-500 text-sm font-black text-white'>5</span> These events {{6}} more frequent and severe.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-green-800 text-sm font-black text-white'>6</span> Sea levels {{7}} at an increasing rate, and coastal communities and infrastructure {{8}} at risk.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-green-500 text-sm font-black text-white'>7</span> Many plant and animal species {{9}} to adapt to the changing climate.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-green-800 text-sm font-black text-white'>8</span> Action {{10}} today to reduce our carbon footprint.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-green-500 text-sm font-black text-white'>9</span> Renewable energy {{11}} more, and policies that prioritize the health of our planet {{12}}.",

            "<span class='mr-2 inline-flex h-7 w-7 items-center justify-center rounded-full bg-green-800 text-sm font-black text-white'>10</span> Climate change {{13}} in this video. Please share it to help spread awareness.",
        ],

        'answers' => [
            'are discussing',
            'is affecting',
            'are releasing',
            'is causing',
            'are being experienced',
            'are becoming',
            'are rising',
            'are being put',
            'are struggling',
            'is being taken',
            'is being discussed',
            'are supporting',
            'is being discussed',
        ],

        'word_bank' => [
            'are discussing',
            'is affecting',
            'are releasing',
            'is causing',
            'are becoming',
            'are rising',
            'are struggling',
            'are being put',
            'are being discussed',
            'are being experienced',
            'is being taken',
            'is being discussed',
            'are supporting',
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")