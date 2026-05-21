<?php

$content = [
    'page_title' => 'New Language',
    'title' => 'New Language',
    'subtitle' => "Prepositions of time: '<span class=\"hl-red\">at</span>', '<span class=\"hl-red\">in</span>', '<span class=\"hl-red\">on</span>'",
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4 md:grid-cols-1 lg:grid-cols-1',

    'cards' => [
        [
            'type' => 'sections',
            'title' => 'Look at these examples to see how we use <span class="hl-gold">at</span>, <span class="hl-gold">in</span> and <span class="hl-gold">on</span> to talk about time:',
            'tone' => 'from-slate-600 to-slate-800',
            'badge_class' => '',
            'plain_sections' => true,
            'raw_items' => true,
            'card_class' => 'bg-gradient-to-br from-white via-violet-50/65 to-fuchsia-50/45 dark:from-slate-900 dark:via-violet-950/25 dark:to-fuchsia-950/20',

            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                            <div class="rounded-2xl border border-violet-100 bg-white/90 px-4 py-3 shadow-sm ring-1 ring-violet-100/60 dark:border-violet-900/45 dark:bg-slate-950/50 dark:ring-violet-500/10">&bull; <span class="hl-red">At</span> noon, the sun is very bright.</div>
                            <div class="rounded-2xl border border-fuchsia-100 bg-white/90 px-4 py-3 shadow-sm ring-1 ring-fuchsia-100/60 dark:border-fuchsia-900/45 dark:bg-slate-950/50 dark:ring-fuchsia-500/10">&bull; <span class="hl-red">In</span> autumn, the weather turns cooler.</div>
                            <div class="rounded-2xl border border-purple-100 bg-white/90 px-4 py-3 shadow-sm ring-1 ring-purple-100/60 dark:border-purple-900/45 dark:bg-slate-950/50 dark:ring-purple-500/10">&bull; <span class="hl-red">On</span> foggy days, it is hard to see far.</div>
                            <div class="rounded-2xl border border-indigo-100 bg-white/90 px-4 py-3 shadow-sm ring-1 ring-indigo-100/60 dark:border-indigo-900/45 dark:bg-slate-950/50 dark:ring-indigo-500/10">&bull; <span class="hl-red">In</span> the morning, the air is fresh.</div>
                            <div class="rounded-2xl border border-violet-100 bg-white/90 px-4 py-3 shadow-sm ring-1 ring-violet-100/60 dark:border-violet-900/45 dark:bg-slate-950/50 dark:ring-violet-500/10">&bull; <span class="hl-red">On</span> hot afternoons, people look for shade.</div>
                            <div class="rounded-2xl border border-fuchsia-100 bg-white/90 px-4 py-3 shadow-sm ring-1 ring-fuchsia-100/60 dark:border-fuchsia-900/45 dark:bg-slate-950/50 dark:ring-fuchsia-500/10">&bull; <span class="hl-red">At</span> sunset, the sky changes colour.</div>
                        </div>',
                    ],
                ],
            ],
        ],
    ],
];

?>

@include("slider.other.grammar-info-cards", ['content' => $content])