@php
    $content = [
        'page_title' => 'Practice 6',
        'title'      => 'Listening',
        'subtitle'   => 'Listen to 4 speculations and complete the missing parts',

        'audio' => materialAsset('slider/B1/Intermediate/chapter-2/audios/slide12.mp3'),

        'script' => [
            "1. A: There's no way he won fairly.",
            "B: Why do you say that?",
            "A: He <span class='text-red-500 font-semibold'>must have</span> cheated in the race.",


            "2. A: You look worried. What's wrong?",
            "B: I've lost my phone.",
            "A: Where do you think it is?",
            "B: <span class='text-red-500 font-semibold'>I might have</span> left it on the bus, or it could be at work. I just don't know.",


            "3. A: Did she compete in the last Olympics?",
            "B: No, she <span class='text-red-500 font-semibold'>can't have</span> competed.",
            "A: Why not?",
            "B: Because she wasn't good enough at the time.",


            "4. A: The town was really quiet yesterday.",
            "B: Yes, it was.",
            "A: The shops <span class='text-red-500 font-semibold'>must have been</span> empty because everyone was watching the final.",
        ],

        'sentences' => [
            "
            <strong class='text-blue-600 dark:text-blue-400'>1. A:</strong> There's no way he won fairly.<br>
            <strong class='text-emerald-600 dark:text-emerald-400'>B:</strong> Why do you say that?<br>
            <strong class='text-blue-600 dark:text-blue-400'>A:</strong> He {{1}} cheated in the race.",

            "
            <strong class='text-blue-600 dark:text-blue-400'>2. A:</strong> You look worried. What's wrong?<br>
            <strong class='text-emerald-600 dark:text-emerald-400'>B:</strong> I've lost my phone.<br>
            <strong class='text-blue-600 dark:text-blue-400'>A:</strong> Where do you think it is?<br>
            <strong class='text-emerald-600 dark:text-emerald-400'>B:</strong> {{2}} left it on the bus, or it could be at work. I just don't know.",

            "
            <strong class='text-blue-600 dark:text-blue-400'>3. A:</strong> Did she compete in the last Olympics?<br>
            <strong class='text-emerald-600 dark:text-emerald-400'>B:</strong> No, she {{3}} competed.<br>
            <strong class='text-blue-600 dark:text-blue-400'>A:</strong> Why not?<br>
            <strong class='text-emerald-600 dark:text-emerald-400'>B:</strong> Because she wasn't good enough at the time.",

            "
            <strong class='text-blue-600 dark:text-blue-400'>4. A:</strong> The town was really quiet yesterday.<br>
            <strong class='text-emerald-600 dark:text-emerald-400'>B:</strong> Yes, it was.<br>
            <strong class='text-blue-600 dark:text-blue-400'>A:</strong> The shops {{4}} empty because everyone was watching the final.",
        ],

        'answers' => [
            'must have',
            'I might have',
            "can't have",
            'must have been',
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")