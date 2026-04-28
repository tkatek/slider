@php
    $content = [
        'page_title'    => 'Listening',
        'title'         => 'Listening',
        'subtitle'      => 'Listen again. What word completes each statement? Drag and drop the correct word.',
        'audio'         => materialAsset('slider/A2/Beginner/chapter-5/audios/slide14.mp3'),

        // Full transcript
        'script'        => [
            "The weather was terrible.",
            "The people were nice.",
            "The ski trip was awful.",
            "Their trip to France was very disappointing.",
            "Her trip to the beach was terrific.",
        ],

        'desktop_game_width' => 60,
        'desktop_pool_width' => 40,

        'sentences' => [
            "<span class=\"mr-3 inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-cyan-400 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(14,165,233,.24)]\">1</span> The weather was {{1}}.",

            "<span class=\"mr-3 inline-flex items-center rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(168,85,247,.24)]\">2</span> The people were {{2}}.",

            "<span class=\"mr-3 inline-flex items-center rounded-full bg-gradient-to-r from-emerald-500 to-teal-400 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(16,185,129,.24)]\">3</span> The ski trip was {{3}}.",

            "<span class=\"mr-3 inline-flex items-center rounded-full bg-gradient-to-r from-amber-500 to-orange-400 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(245,158,11,.24)]\">4</span> Their trip to France was very {{4}}.",

            "<span class=\"mr-3 inline-flex items-center rounded-full bg-gradient-to-r from-rose-500 to-pink-500 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(244,63,94,.24)]\">5</span> Her trip to the beach was {{5}}.",
        ],

        'answers' => [
            'terrible',
            'nice',
            'awful',
            'disappointing',
            'terrific',
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")