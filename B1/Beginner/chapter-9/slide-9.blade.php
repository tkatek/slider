<?php
$content = [

    'title'      => 'Grammar',
    'subtitle'   => 'Second Conditional for Giving Advice',

    'cards_grid_class' => 'mt-5 grid grid-cols-1 gap-4 lg:grid-cols-1',

    'cards' => [
        [
            'type' => 'sections',
            'title' => '',
            'tone' => 'from-violet-600 via-cyan-500 to-emerald-500',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="space-y-5">
                            <div class="rounded-3xl border border-slate-200/80 bg-white/90 px-5 py-5 shadow-sm dark:border-slate-700/70 dark:bg-slate-900/80 sm:px-6 lg:px-8">
                                <p class="text-lg font-black leading-snug text-violet-600 dark:text-violet-300 sm:text-xl lg:text-2xl">
                                    We use the Second Conditional to give advice by imagining ourselves in another person\'s situation.
                                </p>

                                <div class="mt-4 space-y-1">
                                    <h3 class="text-xl font-black leading-tight text-red-500 sm:text-2xl">
                                        Structure
                                    </h3>

                                    <p class="inline-block border-b-4 border-red-400 text-lg font-black leading-snug text-red-500 dark:border-red-300 sm:text-xl lg:text-2xl">
                                        If I were you, I would + base verb
                                    </p>
                                </div>

                                <div class="mt-4 space-y-2">
                                    <h3 class="text-xl font-black leading-tight text-emerald-600 dark:text-emerald-300 sm:text-2xl">
                                        Examples
                                    </h3>

                                    <div class="space-y-2 text-base font-black leading-snug text-slate-950 dark:text-white sm:text-lg lg:text-xl">
                                        <p>If I were you, I would talk to her.</p>
                                        <p>If I were you, I would stay calm.</p>
                                        <p>If I were you, I would listen to her perspective.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="rounded-3xl border border-indigo-200/80 bg-indigo-50/80 px-5 py-4 shadow-sm dark:border-indigo-400/20 dark:bg-indigo-500/10 sm:px-6 lg:px-8">
                                <p class="text-base font-black leading-snug text-indigo-800 dark:text-indigo-200 sm:text-lg lg:text-xl">
                                    Note: We use were (not was) after I in this expression:
                                </p>

                                <div class="mt-3 space-y-2 text-base font-black leading-tight text-slate-950 dark:text-white sm:text-lg lg:text-xl">
                                    <p>
                                        <span class="mr-2">✅</span>
                                        If I were you...
                                    </p>

                                    <p>
                                        <span class="mr-2">❌</span>
                                        If I was you...
                                    </p>
                                </div>
                            </div>
                        </div>',
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ["content" => $content])