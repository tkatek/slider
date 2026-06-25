<?php
$content = [
    'page_title' => '',
    'title'      => 'Grammar',
    'subtitle'   => 'Present Simple vs Past Simple',

    'cards_grid_class' => 'mt-6 grid grid-cols-1 gap-4',

    'cards' => [
        [
            'type' => 'sections',
            'title' => '',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        <<<'HTML'
<div class="space-y-5">
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-slate-700 dark:bg-slate-900">
        <div class="grid gap-3 p-3 sm:hidden">
            <div class="rounded-xl border border-slate-200 bg-slate-50 p-3 dark:border-slate-700 dark:bg-slate-950/50">
                <p class="text-sm font-black text-red-600 dark:text-red-300">Present Simple</p>
                <div class="mt-3 space-y-3 text-sm font-black leading-snug text-slate-950 dark:text-slate-100">
                    <p>Brands <span class="text-sky-600 underline decoration-2 underline-offset-2 dark:text-sky-300">help</span> people trust products.</p>
                    <p>Brands <span class="text-sky-600 underline decoration-2 underline-offset-2 dark:text-sky-300">share</span> stories and experiences.</p>
                    <p>Strong brands <span class="text-sky-600 underline decoration-2 underline-offset-2 dark:text-sky-300">connect</span> with customers.</p>
                </div>
            </div>

            <div class="rounded-xl border border-slate-200 bg-slate-50 p-3 dark:border-slate-700 dark:bg-slate-950/50">
                <p class="text-sm font-black text-red-600 dark:text-red-300">Past Simple</p>
                <div class="mt-3 space-y-3 text-sm font-black leading-snug text-slate-950 dark:text-slate-100">
                    <p>Farmers <span class="text-emerald-600 dark:text-emerald-300">used</span> special marks on cattle.</p>
                    <p>Companies <span class="text-emerald-600 dark:text-emerald-300">put</span> brands on wooden cases.</p>
                    <p>People <span class="text-emerald-600 dark:text-emerald-300">used</span> brands to show ownership.</p>
                </div>
            </div>
        </div>

        <table class="hidden w-full table-fixed border-collapse text-left text-sm font-bold text-slate-950 dark:text-slate-100 sm:table lg:text-base">
            <thead>
                <tr class="border-b border-slate-200 dark:border-slate-700">
                    <th class="w-1/2 border-r border-slate-200 px-4 py-3 font-black text-red-600 dark:border-slate-700 dark:text-red-300">
                        Present Simple
                    </th>
                    <th class="w-1/2 px-4 py-3 font-black text-red-600 dark:text-red-300">
                        Past Simple
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                <tr>
                    <td class="border-r border-slate-200 px-4 py-4 dark:border-slate-700">
                        Brands <span class="font-black text-sky-600 underline decoration-2 underline-offset-2 dark:text-sky-300">help</span> people trust products.
                    </td>
                    <td class="px-4 py-4">
                        Farmers <span class="font-black text-emerald-600 dark:text-emerald-300">used</span> special marks on cattle.
                    </td>
                </tr>

                <tr>
                    <td class="border-r border-slate-200 px-4 py-4 dark:border-slate-700">
                        Brands <span class="font-black text-sky-600 underline decoration-2 underline-offset-2 dark:text-sky-300">share</span> stories and experiences.
                    </td>
                    <td class="px-4 py-4">
                        Companies <span class="font-black text-emerald-600 dark:text-emerald-300">put</span> brands on wooden cases.
                    </td>
                </tr>

                <tr>
                    <td class="border-r border-slate-200 px-4 py-4 dark:border-slate-700">
                        Strong brands <span class="font-black text-sky-600 underline decoration-2 underline-offset-2 dark:text-sky-300">connect</span> with customers.
                    </td>
                    <td class="px-4 py-4">
                        People <span class="font-black text-emerald-600 dark:text-emerald-300">used</span> brands to show ownership.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-700 dark:bg-slate-900 sm:p-5">
        <p class="text-lg font-black text-slate-950 underline decoration-amber-400 decoration-4 underline-offset-4 dark:text-white sm:text-xl">
            Grammar Rule
        </p>

        <div class="mt-4 grid gap-4 lg:grid-cols-2">
            <div class="rounded-xl bg-slate-50 p-4 dark:bg-slate-950/50">
                <p class="font-black text-sky-600 underline decoration-2 underline-offset-2 dark:text-sky-300">
                    Present Simple
                </p>
                <p class="mt-2 font-black text-amber-500 dark:text-amber-300">
                    Used for facts, routines, and general truths.
                </p>
                <p class="mt-2 font-black text-slate-950 dark:text-slate-100">
                    Structure: Subject + base verb / verb + s
                </p>
                <p class="mt-2 font-black text-slate-950 dark:text-slate-100">
                    Example:<br>
                    Brands <span class="text-orange-500 dark:text-orange-300">influence</span> people's choices.
                </p>
            </div>

            <div class="rounded-xl bg-slate-50 p-4 dark:bg-slate-950/50">
                <p class="font-black text-sky-600 underline decoration-2 underline-offset-2 dark:text-sky-300">
                    Past Simple
                </p>
                <p class="mt-2 font-black text-amber-500 dark:text-amber-300">
                    Used for finished actions in the past.
                </p>
                <p class="mt-2 font-black text-slate-950 dark:text-slate-100">
                    Structure: Subject + past verb
                </p>
                <p class="mt-2 font-black text-slate-950 dark:text-slate-100">
                    Example:<br>
                    Farmers <span class="text-orange-500 dark:text-orange-300">used</span> special marks on cattle.
                </p>
            </div>
        </div>
    </div>
</div>
HTML,
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ["content" => $content])