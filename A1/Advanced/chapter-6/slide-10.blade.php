<?php
$content = [
    'page_title' => 'Grammar',
    'title' => 'Grammar',
    'subtitle' => '',
    'theme_class' => 'grammar-theme-modern',
    'header_wrap_class' => 'mb-5 text-center flex flex-col items-center gap-[0.55rem]',
    'title_class' => 'font-black leading-[1.08] tracking-[-0.04em] text-4xl sm:text-5xl lg:text-6xl pb-[0.08em]',
    'title_gradient_class' => 'bg-gradient-to-br from-indigo-600 to-blue-500',
    'subtitle_class' => 'text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-600 dark:text-slate-200',
    'center_shell' => true,
    'use_card_wrapper' => false,
    'cards_grid_class' => 'grid gap-2 grid-cols-1',
    'cards' => [
        [
            'type' => 'table',
            'title' => '',
            'tone' => 'from-blue-400 to-indigo-500',
            'badge_class' => '',
            'intro' => '',
            'table_variant' => 'rich',
            'table_size' => 'large',
            'mobile_cards' => true,
            'table_headers' => ['Function', 'Key Phrase from Video', 'Real-life Use Case'],
            'table_rows' => [
                [
                    ['text' => '<span class="my-1 inline-flex w-fit items-center gap-2 rounded-2xl border border-sky-200 bg-white px-3.5 py-1.5 font-black text-slate-800 shadow-sm dark:border-sky-500/30 dark:bg-slate-900/85 dark:text-slate-100"><span class="h-2.5 w-2.5 rounded-full bg-sky-500"></span>Pointing out</span>'],
                    ['text' => '<span class="font-black text-sky-700 dark:text-sky-200">"Look, there&apos;s..."</span>'],
                    ['text' => '<span class="text-slate-700 dark:text-slate-200">Finding machines, platforms, signs</span>'],
                ],
                [
                    ['text' => '<span class="my-1 inline-flex w-fit items-center gap-2 rounded-2xl border border-violet-200 bg-white px-3.5 py-1.5 font-black text-slate-800 shadow-sm dark:border-violet-500/30 dark:bg-slate-900/85 dark:text-slate-100"><span class="h-2.5 w-2.5 rounded-full bg-violet-500"></span>Suggesting</span>'],
                    ['text' => '<span class="font-black text-violet-700 dark:text-violet-200">Let&apos;s ... / We can ...</span>'],
                    ['text' => '<span class="text-slate-700 dark:text-slate-200">Planning tickets, seats, snacks</span>'],
                ],
                [
                    ['text' => '<span class="my-1 inline-flex w-fit items-center gap-2 rounded-2xl border border-amber-200 bg-white px-3.5 py-1.5 font-black text-slate-800 shadow-sm dark:border-amber-500/30 dark:bg-slate-900/85 dark:text-slate-100"><span class="h-2.5 w-2.5 rounded-full bg-amber-500"></span>Polite request</span>'],
                    ['text' => '<span class="font-black text-amber-700 dark:text-amber-200">Excuse me... Is this the right...?</span>'],
                    ['text' => '<span class="text-slate-700 dark:text-slate-200">Asking staff or strangers</span>'],
                ],
                [
                    ['text' => '<span class="my-1 inline-flex w-fit items-center gap-2 rounded-2xl border border-emerald-200 bg-white px-3.5 py-1.5 font-black text-slate-800 shadow-sm dark:border-emerald-500/30 dark:bg-slate-900/85 dark:text-slate-100"><span class="h-2.5 w-2.5 rounded-full bg-emerald-500"></span>Confirming</span>'],
                    ['text' => '<span class="font-black text-emerald-700 dark:text-emerald-200">"Yes, that&apos;s correct."</span>'],
                    ['text' => '<span class="text-slate-700 dark:text-slate-200">Staff answering passengers</span>'],
                ],
                [
                    ['text' => '<span class="my-1 inline-flex w-fit items-center gap-2 rounded-2xl border border-indigo-200 bg-white px-3.5 py-1.5 font-black text-slate-800 shadow-sm dark:border-indigo-500/30 dark:bg-slate-900/85 dark:text-slate-100"><span class="h-2.5 w-2.5 rounded-full bg-indigo-500"></span>Offering</span>'],
                    ['text' => '<span class="font-black text-indigo-700 dark:text-indigo-200">You can ... if you&apos;d like</span>'],
                    ['text' => '<span class="text-slate-700 dark:text-slate-200">Buffet car, Wi-Fi, help</span>'],
                ],
                [
                    ['text' => '<span class="my-1 inline-flex w-fit items-center gap-2 rounded-2xl border border-rose-200 bg-white px-3.5 py-1.5 font-black text-slate-800 shadow-sm dark:border-rose-500/30 dark:bg-slate-900/85 dark:text-slate-100"><span class="h-2.5 w-2.5 rounded-full bg-rose-500"></span>Expressing excitement</span>'],
                    ['text' => '<span class="font-black text-rose-700 dark:text-rose-200">I&apos;m so excited. / Brilliant.</span>'],
                    ['text' => '<span class="text-slate-700 dark:text-slate-200">Sharing feelings with travel partner</span>'],
                ],
                [
                    ['text' => '<span class="my-1 inline-flex w-fit items-center gap-2 rounded-2xl border border-cyan-200 bg-white px-3.5 py-1.5 font-black text-slate-800 shadow-sm dark:border-cyan-500/30 dark:bg-slate-900/85 dark:text-slate-100"><span class="h-2.5 w-2.5 rounded-full bg-cyan-500"></span>Handing something over</span>'],
                    ['text' => '<span class="font-black text-cyan-700 dark:text-cyan-200">Here you go.</span>'],
                    ['text' => '<span class="text-slate-700 dark:text-slate-200">Tickets, passports, money</span>'],
                ],
                [
                    ['text' => '<span class="my-1 inline-flex w-fit items-center gap-2 rounded-2xl border border-fuchsia-200 bg-white px-3.5 py-1.5 font-black text-slate-800 shadow-sm dark:border-fuchsia-500/30 dark:bg-slate-900/85 dark:text-slate-100"><span class="h-2.5 w-2.5 rounded-full bg-fuchsia-500"></span>Agreeing &amp; closing</span>'],
                    ['text' => '<span class="font-black text-fuchsia-700 dark:text-fuchsia-200">That&apos;s a good idea. / Enjoy your...</span>'],
                    ['text' => '<span class="text-slate-700 dark:text-slate-200">Accepting offers, ending chat</span>'],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
