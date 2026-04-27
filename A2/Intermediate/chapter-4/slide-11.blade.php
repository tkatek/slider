<?php
$content = [
    'page_title' => 'Reflexive Pronouns',
    'title' => 'Reflexive Pronouns',
    'subtitle' => '',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4 lg:grid-cols-2',

    'cards' => [
        [
            'type' => 'sections',
            'title' => 'Reflexive Pronouns (myself, yourself, etc.)',
            'tone' => 'from-zinc-500 to-zinc-700',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="space-y-4 text-xl font-black italic leading-snug text-slate-950 dark:text-white sm:text-2xl">
                            <p><span class="not-italic">✅</span> <span class="text-violet-700 dark:text-violet-300">Use:</span></p>

                            <p>We use reflexive pronouns when:</p>

                            <p class="text-red-500">
                                The subject and object are the same person
                            </p>

                            <p><span class="not-italic">📌</span> <span class="text-indigo-700 dark:text-indigo-300">Forms:</span></p>

                            <p class="text-cyan-600 dark:text-cyan-300">
                                myself, yourself, himself, herself,<br>
                                ourselves, themselves
                            </p>

                            <p><span class="not-italic">📖</span> Examples from the dialogue:</p>

                            <p>
                                “Did <span class="text-sky-500 dark:text-sky-300">you</span> hurt
                                <span class="text-cyan-600 dark:text-cyan-300">yourself</span>?”
                            </p>

                            <p>
                                “I was <span class="text-emerald-500 dark:text-emerald-300">by</span> myself.”
                            </p>

                            <p>
                                <span class="not-italic">👉</span>
                                “yourself / myself” = the same person
                            </p>
                        </div>',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => 'Reflexive Pronouns',
            'tone' => 'from-stone-500 to-zinc-700',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="rounded-2xl border border-slate-200 bg-white px-5 py-5 shadow-sm dark:border-slate-700 dark:bg-slate-900">
                            <table class="w-full table-fixed border-collapse text-left text-lg font-black sm:text-2xl">
                                <tbody class="text-slate-950 dark:text-white">
                                    <tr>
                                        <td class="w-12 py-2 text-center">👱</td>
                                        <td class="py-2">I</td>
                                        <td class="py-2 text-teal-500 dark:text-teal-300">myself</td>
                                    </tr>
                                    <tr>
                                        <td class="w-12 py-2 text-center">👩</td>
                                        <td class="py-2">you</td>
                                        <td class="py-2 text-teal-500 dark:text-teal-300">yourself</td>
                                    </tr>
                                    <tr>
                                        <td class="w-12 py-2 text-center">🧔</td>
                                        <td class="py-2">he</td>
                                        <td class="py-2 text-teal-500 dark:text-teal-300">himself</td>
                                    </tr>
                                    <tr>
                                        <td class="w-12 py-2 text-center">👩‍🦰</td>
                                        <td class="py-2">she</td>
                                        <td class="py-2 text-teal-500 dark:text-teal-300">herself</td>
                                    </tr>
                                    <tr>
                                        <td class="w-12 py-2 text-center">👨‍👩‍👧</td>
                                        <td class="py-2">we</td>
                                        <td class="py-2 text-teal-500 dark:text-teal-300">ourselves</td>
                                    </tr>
                                    <tr>
                                        <td class="w-12 py-2 text-center">👥</td>
                                        <td class="py-2">they</td>
                                        <td class="py-2 text-teal-500 dark:text-teal-300">themselves</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>',
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
