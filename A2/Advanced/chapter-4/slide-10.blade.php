<?php
$content = [
    'page_title' => 'Remember verb forms',
    'title'      => 'Remember verb forms',
    'subtitle'   => '',

    'cards_grid_class' => 'mt-5 grid grid-cols-1 gap-4',

    'cards' => [
        [
            'type' => 'sections',
            'title' => '',
            'tone' => 'from-blue-500 via-indigo-500 to-violet-500',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                            <div class="rounded-2xl border border-indigo-100 bg-indigo-50/80 px-5 py-4 dark:border-indigo-400/20 dark:bg-indigo-950/20">
                                <h3 class="text-base sm:text-lg font-black uppercase tracking-wide text-indigo-600 dark:text-indigo-300">
                                    Regular
                                </h3>

                                <div class="mt-3 space-y-2 text-base sm:text-lg font-bold text-slate-900 dark:text-slate-100">
                                    <p>visit → <span class="font-black text-orange-500 dark:text-orange-300">visited</span> → <span class="font-black text-orange-500 dark:text-orange-300">visited</span></p>
                                    <p>travel → <span class="font-black text-orange-500 dark:text-orange-300">travelled</span> → <span class="font-black text-orange-500 dark:text-orange-300">travelled</span></p>
                                </div>
                            </div>

                            <div class="rounded-2xl border border-orange-100 bg-orange-50/80 px-5 py-4 dark:border-orange-400/20 dark:bg-orange-950/20">
                                <h3 class="text-base sm:text-lg font-black uppercase tracking-wide text-orange-600 dark:text-orange-300">
                                    Irregular
                                </h3>

                                <div class="mt-3 space-y-2 text-base sm:text-lg font-bold text-slate-900 dark:text-slate-100">
                                    <p>meet → <span class="font-black text-indigo-600 dark:text-indigo-300">met</span> → <span class="font-black text-indigo-600 dark:text-indigo-300">met</span></p>
                                    <p>eat → <span class="font-black text-indigo-600 dark:text-indigo-300">ate</span> → <span class="font-black text-indigo-600 dark:text-indigo-300">eaten</span></p>
                                </div>
                            </div>
                        </div>',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => '',
            'tone' => 'from-orange-400 via-rose-400 to-pink-500',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="space-y-4">
                            <h3 class="text-base sm:text-lg font-black uppercase tracking-wide text-slate-700 dark:text-slate-200">
                                Irregular verbs
                            </h3>

                            <div class="hidden overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-slate-700 dark:bg-slate-900/70 sm:block">
                                <table class="w-full min-w-[620px] border-collapse text-left">
                                    <thead>
                                        <tr class="border-b border-slate-200 bg-slate-50 dark:border-slate-700 dark:bg-slate-800/80">
                                            <th class="px-4 py-3 text-sm font-black text-slate-700 dark:text-slate-200">infinitive</th>
                                            <th class="px-4 py-3 text-sm font-black text-slate-700 dark:text-slate-200">past simple</th>
                                            <th class="px-4 py-3 text-sm font-black text-slate-700 dark:text-slate-200">past participle</th>
                                        </tr>
                                    </thead>

                                    <tbody class="text-sm sm:text-base font-bold text-slate-800 dark:text-slate-100">
                                        <tr class="border-b border-slate-200 dark:border-slate-700"><td class="px-4 py-2">be</td><td class="px-4 py-2">was/were</td><td class="px-4 py-2">been</td></tr>
                                        <tr class="border-b border-slate-200 dark:border-slate-700"><td class="px-4 py-2">break</td><td class="px-4 py-2">broke</td><td class="px-4 py-2">broken</td></tr>
                                        <tr class="border-b border-slate-200 dark:border-slate-700"><td class="px-4 py-2">see</td><td class="px-4 py-2">saw</td><td class="px-4 py-2">seen</td></tr>
                                        <tr class="border-b border-slate-200 dark:border-slate-700"><td class="px-4 py-2">read</td><td class="px-4 py-2">read</td><td class="px-4 py-2">read</td></tr>
                                        <tr class="border-b border-slate-200 dark:border-slate-700"><td class="px-4 py-2">ride</td><td class="px-4 py-2">rode</td><td class="px-4 py-2">ridden</td></tr>
                                        <tr class="border-b border-slate-200 dark:border-slate-700"><td class="px-4 py-2">give</td><td class="px-4 py-2">gave</td><td class="px-4 py-2">given</td></tr>
                                        <tr class="border-b border-slate-200 dark:border-slate-700"><td class="px-4 py-2">go</td><td class="px-4 py-2">went</td><td class="px-4 py-2">gone</td></tr>
                                        <tr class="border-b border-slate-200 dark:border-slate-700"><td class="px-4 py-2">take</td><td class="px-4 py-2">took</td><td class="px-4 py-2">taken</td></tr>
                                        <tr class="border-b border-slate-200 dark:border-slate-700"><td class="px-4 py-2">have</td><td class="px-4 py-2">had</td><td class="px-4 py-2">had</td></tr>
                                        <tr><td class="px-4 py-2">fly</td><td class="px-4 py-2">flew</td><td class="px-4 py-2">flown</td></tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="grid gap-3 sm:hidden">
                                <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-700 dark:bg-slate-900/70">
                                    <div class="grid grid-cols-3 gap-2 text-xs font-black uppercase tracking-[0.06em] text-slate-500 dark:text-slate-400">
                                        <span>infinitive</span>
                                        <span>past simple</span>
                                        <span>past participle</span>
                                    </div>

                                    <div class="mt-3 space-y-2 text-sm font-bold text-slate-900 dark:text-slate-100">
                                        <div class="grid grid-cols-3 gap-2 rounded-xl bg-slate-50 px-3 py-2 dark:bg-slate-800/70"><span>be</span><span>was/were</span><span>been</span></div>
                                        <div class="grid grid-cols-3 gap-2 rounded-xl bg-slate-50 px-3 py-2 dark:bg-slate-800/70"><span>break</span><span>broke</span><span>broken</span></div>
                                        <div class="grid grid-cols-3 gap-2 rounded-xl bg-slate-50 px-3 py-2 dark:bg-slate-800/70"><span>see</span><span>saw</span><span>seen</span></div>
                                        <div class="grid grid-cols-3 gap-2 rounded-xl bg-slate-50 px-3 py-2 dark:bg-slate-800/70"><span>read</span><span>read</span><span>read</span></div>
                                        <div class="grid grid-cols-3 gap-2 rounded-xl bg-slate-50 px-3 py-2 dark:bg-slate-800/70"><span>ride</span><span>rode</span><span>ridden</span></div>
                                        <div class="grid grid-cols-3 gap-2 rounded-xl bg-slate-50 px-3 py-2 dark:bg-slate-800/70"><span>give</span><span>gave</span><span>given</span></div>
                                        <div class="grid grid-cols-3 gap-2 rounded-xl bg-slate-50 px-3 py-2 dark:bg-slate-800/70"><span>go</span><span>went</span><span>gone</span></div>
                                        <div class="grid grid-cols-3 gap-2 rounded-xl bg-slate-50 px-3 py-2 dark:bg-slate-800/70"><span>take</span><span>took</span><span>taken</span></div>
                                        <div class="grid grid-cols-3 gap-2 rounded-xl bg-slate-50 px-3 py-2 dark:bg-slate-800/70"><span>have</span><span>had</span><span>had</span></div>
                                        <div class="grid grid-cols-3 gap-2 rounded-xl bg-slate-50 px-3 py-2 dark:bg-slate-800/70"><span>fly</span><span>flew</span><span>flown</span></div>
                                    </div>
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

@include("slider.other.grammar-info-cards", ['content' => $content])
