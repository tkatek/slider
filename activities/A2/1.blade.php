@php
    $content = [
        'page_title'    => 'Listening',
        'title'         => 'Listening',
        'subtitle'      => 'Listen. Complete the questions and answers.',
        'audio'         => materialAsset('slider/A1/Beginner/chapter-2/audios/slide9.mp3'),

        // Full transcript
        'script'        => [
            "What’s his surname? Clarke.",
            "What’s his first name? Adam.",
            "Where’s he from? England.",
            "What’s his address? 37 Kings Street, Manchester, M12 4JB.",
            "What’s his phone number? 07700 955031.",
            "How old is he? He’s 27.",
            "What’s his job? He’s a police officer.",
            "Is he married? No, he isn’t.",
        ],

        'desktop_game_width' => 60,
        'desktop_pool_width' => 40,

'sentences' => [
    "<span class=\"mr-3 inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-cyan-400 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(14,165,233,.24)]\">1</span> What’s his <strong class='text-pink-600 dark:text-pink-400'>surname</strong>? <span class='font-black text-slate-900 dark:text-white'>Clarke.</span>",

    "<span class=\"mr-3 inline-flex items-center rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(168,85,247,.24)]\">2</span> What’s his {{1}}? <span class='font-black text-slate-900 dark:text-white'>Adam.</span>",

    "<span class=\"mr-3 inline-flex items-center rounded-full bg-gradient-to-r from-emerald-500 to-teal-400 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(16,185,129,.24)]\">3</span> Where’s he {{2}}? <span class='font-black text-slate-900 dark:text-white'>England.</span>",

    "<span class=\"mr-3 inline-flex items-center rounded-full bg-gradient-to-r from-amber-500 to-orange-400 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(245,158,11,.24)]\">4</span> What’s his {{3}}? <span class='font-black text-slate-900 dark:text-white'>37 Kings Street, Manchester, M12 4JB.</span>",

    "<span class=\"mr-3 inline-flex items-center rounded-full bg-gradient-to-r from-rose-500 to-pink-500 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(244,63,94,.24)]\">5</span> What’s his {{4}} number? <span class='font-black text-slate-900 dark:text-white'>07700 955031.</span>",

    "<span class=\"mr-3 inline-flex items-center rounded-full bg-gradient-to-r from-indigo-500 to-blue-500 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(79,70,229,.24)]\">6</span> How old is he? He’s {{5}}.",

    "<span class=\"mr-3 inline-flex items-center rounded-full bg-gradient-to-r from-lime-500 to-green-400 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(132,204,22,.24)]\">7</span> What’s his {{6}}? <span class='font-black text-slate-900 dark:text-white'>He’s a police officer.</span>",

    "<span class=\"mr-3 inline-flex items-center rounded-full bg-gradient-to-r from-red-500 to-orange-500 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(239,68,68,.24)]\">8</span> Is he {{7}}? <span class='font-black text-slate-900 dark:text-white'>No, he isn’t.</span>",
],

        'answers' => [
            'first name',
            'from',
            'address',
            'phone',
            '27',
            'job',
            'married',
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")