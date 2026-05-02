<?php
$content = [
    'page_title' => "Can / Can't",
    'title'      => 'Grammar Focus',
    'subtitle'   => "Can / Can't (Communication Problems)",

    'cards_grid_class' => 'mt-6 grid grid-cols-1 gap-5 lg:grid-cols-2',

    'cards' => [
        [
            'type' => 'sections',
            'title' => "Can / Can't",
            'tone' => 'from-emerald-500 via-green-500 to-lime-500',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="space-y-5">
                            <div class="rounded-2xl border border-emerald-100 bg-emerald-50/80 px-5 py-4 dark:border-emerald-400/20 dark:bg-emerald-950/20">
                                <p class="text-lg sm:text-xl font-black leading-tight text-slate-900 dark:text-slate-50">
                                    We use <span class="text-emerald-700 dark:text-emerald-300">can / can\'t</span> to talk about:
                                </p>
                                <ul class="mt-4 space-y-3 text-base sm:text-lg font-black text-slate-800 dark:text-slate-100">
                                    <li class="flex items-center gap-3">
                                        <span class="h-2.5 w-2.5 rounded-full bg-amber-400"></span>
                                        <span>ability</span>
                                    </li>
                                    <li class="flex items-center gap-3">
                                        <span class="h-2.5 w-2.5 rounded-full bg-amber-400"></span>
                                        <span>Permission</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="rounded-2xl border border-amber-100 bg-amber-50/90 px-5 py-4 dark:border-amber-400/20 dark:bg-amber-950/20">
                                <p class="text-lg sm:text-xl font-black text-amber-600 dark:text-amber-300">Form:</p>
                                <div class="mt-4 space-y-3">
                                    <p class="text-base sm:text-lg font-black leading-[1.45] text-slate-900 dark:text-slate-100">
                                        <span class="text-blue-700 dark:text-blue-300">Affirmative:</span>
                                        Subject + <span class="text-violet-600 dark:text-violet-300">can</span> + base verb
                                    </p>
                                    <p class="text-base sm:text-lg font-black leading-[1.45] text-slate-900 dark:text-slate-100">
                                        <span class="text-blue-700 dark:text-blue-300">Negative:</span>
                                        Subject + <span class="text-violet-600 dark:text-violet-300">can\'t</span> + base verb
                                    </p>
                                    <p class="text-base sm:text-lg font-black leading-[1.45] text-slate-900 dark:text-slate-100">
                                        <span class="text-blue-700 dark:text-blue-300">Question:</span>
                                        <span class="text-violet-600 dark:text-violet-300">Can</span> + subject + base verb?
                                    </p>
                                </div>
                            </div>
                        </div>',
                    ],
                ],
            ],
        ],

        [
            'type' => 'sections',
            'title' => 'Examples',
            'tone' => 'from-blue-500 via-indigo-500 to-violet-500',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="space-y-4">
                            <div class="rounded-2xl border border-slate-200 bg-white px-5 py-4 dark:border-slate-700 dark:bg-slate-900/70">
                                <ul class="space-y-3 text-base sm:text-lg font-black leading-[1.45] text-slate-900 dark:text-slate-100">
                                    <li class="flex gap-3">
                                        <span class="mt-2 h-2.5 w-2.5 shrink-0 rounded-full bg-slate-900 dark:bg-slate-100"></span>
                                        <span>I <span class="text-amber-500 dark:text-amber-300">can</span> hear you.</span>
                                    </li>
                                    <li class="flex gap-3">
                                        <span class="mt-2 h-2.5 w-2.5 shrink-0 rounded-full bg-slate-900 dark:bg-slate-100"></span>
                                        <span>I <span class="text-amber-500 dark:text-amber-300">can\'t</span> hear you.</span>
                                    </li>
                                    <li class="flex gap-3">
                                        <span class="mt-2 h-2.5 w-2.5 shrink-0 rounded-full bg-slate-900 dark:bg-slate-100"></span>
                                        <span>I can\'t connect to the internet.</span>
                                    </li>
                                    <li class="flex gap-3">
                                        <span class="mt-2 h-2.5 w-2.5 shrink-0 rounded-full bg-slate-900 dark:bg-slate-100"></span>
                                        <span>I can\'t open the file.</span>
                                    </li>
                                    <li class="flex gap-3">
                                        <span class="mt-2 h-2.5 w-2.5 shrink-0 rounded-full bg-slate-900 dark:bg-slate-100"></span>
                                        <span>Can you repeat that?</span>
                                    </li>
                                    <li class="flex gap-3">
                                        <span class="mt-2 h-2.5 w-2.5 shrink-0 rounded-full bg-slate-900 dark:bg-slate-100"></span>
                                        <span>Can you send the message again?</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="rounded-2xl border border-indigo-100 bg-indigo-50/90 px-5 py-4 dark:border-indigo-400/20 dark:bg-indigo-950/20">
                                <p class="text-base sm:text-lg font-black leading-[1.45] text-slate-900 dark:text-slate-100">
                                    Which one of them is a possibility and which is ability? Can you tell?
                                </p>
                            </div>

                            <div class="rounded-2xl border border-emerald-100 bg-emerald-50/80 px-5 py-4 dark:border-emerald-400/20 dark:bg-emerald-950/20">
                                <p class="text-base sm:text-lg font-black leading-[1.45] text-slate-900 dark:text-slate-100">
                                    👉 Use: talking about problems and asking for help
                                </p>
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
