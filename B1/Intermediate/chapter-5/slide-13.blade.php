<?php
$content = [
    'page_title' => '',
    'title'      => 'Grammar / Language Focus',
    'subtitle'   => 'Present Perfect vs Past Simple',

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
    <div class="grid gap-4 lg:grid-cols-2">
        <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-700 dark:bg-slate-900">
            <h3 class="text-lg font-black text-slate-950 dark:text-white">
                Present Perfect
            </h3>

            <ul class="mt-2 list-disc space-y-1 pl-6 text-base font-black leading-snug text-slate-950 dark:text-slate-100 sm:text-lg">
                <li>Influencers <span class="text-sky-600 dark:text-sky-300">have become</span> very popular.</li>
                <li>Social media <span class="text-sky-600 dark:text-sky-300">has changed</span> advertising.</li>
                <li>Many creators <span class="text-sky-600 dark:text-sky-300">have gained</span> millions of followers.</li>
            </ul>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-700 dark:bg-slate-900">
            <h3 class="text-lg font-black text-slate-950 dark:text-white">
                Past Simple
            </h3>

            <ul class="mt-2 list-disc space-y-1 pl-6 text-base font-black leading-snug text-slate-950 dark:text-slate-100 sm:text-lg">
                <li>YouTube <span class="text-sky-600 dark:text-sky-300">became</span> popular in the 2000s.</li>
                <li>Many influencers <span class="text-sky-600 dark:text-sky-300">started</span> their channels years ago.</li>
                <li>Social media influencers <span class="text-sky-600 dark:text-sky-300">rose</span> to fame online.</li>
            </ul>
        </div>
    </div>

    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-slate-700 dark:bg-slate-900">
        <div class="grid gap-3 p-3 sm:hidden">
            <div class="rounded-xl border border-slate-200 bg-slate-50 p-3 dark:border-slate-700 dark:bg-slate-950/50">
                <p class="text-sm font-black text-red-600 dark:text-red-300">Present Perfect</p>
                <p class="mt-2 text-sm font-black text-slate-950 dark:text-slate-100">have/has + p.p.</p>
                <p class="mt-2 text-sm font-black text-slate-950 dark:text-slate-100">no specific time</p>
                <p class="mt-2 text-sm font-black text-slate-950 dark:text-slate-100">Social media has changed advertising.</p>
            </div>

            <div class="rounded-xl border border-slate-200 bg-slate-50 p-3 dark:border-slate-700 dark:bg-slate-950/50">
                <p class="text-sm font-black text-red-600 dark:text-red-300">Past Simple</p>
                <p class="mt-2 text-sm font-black text-slate-950 dark:text-slate-100">verb + ed / irregular</p>
                <p class="mt-2 text-sm font-black text-slate-950 dark:text-slate-100">specific past time</p>
                <p class="mt-2 text-sm font-black text-slate-950 dark:text-slate-100">YouTube became popular in 2005.</p>
            </div>
        </div>

        <table class="hidden w-full table-fixed border-collapse text-left text-sm font-bold text-slate-950 dark:text-slate-100 sm:table lg:text-base">
            <thead>
                <tr class="border-b border-slate-200 dark:border-slate-700">
                    <th class="w-1/2 border-r border-slate-200 px-4 py-3 font-black text-red-600 dark:border-slate-700 dark:text-red-300">
                        Present Perfect
                    </th>
                    <th class="w-1/2 px-4 py-3 font-black text-red-600 dark:text-red-300">
                        Past Simple
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                <tr>
                    <td class="border-r border-slate-200 px-4 py-4 dark:border-slate-700">
                        have/has + p.p.
                    </td>
                    <td class="px-4 py-4">
                        verb + ed / irregular
                    </td>
                </tr>

                <tr>
                    <td class="border-r border-slate-200 px-4 py-4 dark:border-slate-700">
                        no specific time
                    </td>
                    <td class="px-4 py-4">
                        specific past time
                    </td>
                </tr>

                <tr>
                    <td class="border-r border-slate-200 px-4 py-4 dark:border-slate-700">
                        Social media has changed advertising.
                    </td>
                    <td class="px-4 py-4">
                        YouTube became popular in 2005.
                    </td>
                </tr>
            </tbody>
        </table>
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