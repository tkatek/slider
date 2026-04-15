@php
    $content = [
        'page_title' => 'Practice 6',
        'title' => 'Practice 6',
        'subtitle' => 'Drag and drop the sentences into their correct order',
        'desktop_layout_breakpoint' => 1024,

        'desktop_game_width' => 55,
        'desktop_pool_width' => 45,
        'tile_class' => '!px-1 !py-0.5 !text-[13px] !min-h-[30px] sm:!px-2 sm:!py-1 sm:!text-sm sm:!min-h-[36px]',
        'word_bank_panel_class' => 'lg:max-h-[calc(100vh-7rem)]',
        'pool_content_class' => 'lg:max-h-[calc(100vh-15rem)] lg:overflow-y-auto lg:pr-1 lg:pb-3', 

        'sentences' => [
            "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-cyan-400 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(14,165,233,.24)]\">1</span> {{1}}",
            "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(168,85,247,.24)]\">2</span> {{2}}",
            "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-emerald-500 to-teal-400 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(16,185,129,.24)]\">3</span> {{3}}",
            "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-amber-500 to-orange-400 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(245,158,11,.24)]\">4</span> {{4}}",
            "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-rose-500 to-pink-500 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(244,63,94,.24)]\">5</span> {{5}}",
            "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-indigo-500 to-blue-500 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(79,70,229,.24)]\">6</span> {{6}}",
            "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-lime-500 to-green-400 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(132,204,22,.24)]\">7</span> {{7}}",
            "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-red-500 to-orange-500 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(239,68,68,.24)]\">8</span> {{8}}",
            "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-cyan-500 to-blue-500 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(6,182,212,.24)]\">9</span> {{9}}",
            "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-purple-500 to-indigo-500 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(168,85,247,.24)]\">10</span> {{10}}",
        ],

        'answers' => [
            'Can I help you?',
            "I'd like a bus ticket to Summerwell, please.",
            'Sure. Only one ticket?',
            'Yes, one ticket for me. How much is it?',
            "That’s four pounds, please.",
            'Here you are.',
            "And here’s your ticket.",
            'Thanks. What time does the bus leave?',
            'It leaves in ten minutes. Hurry up!',
            'Oh, thank you! Goodbye!',
        ],
    ];
@endphp

@include('slider.game.drag-and-drop-blanks', ['content' => $content])
