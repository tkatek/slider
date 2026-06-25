<?php
$content = [
    'page_title' => '',
    'title'      => 'New Language<br>(Speculating and Deducing)',
    'title_class' => 'text-3xl sm:text-4xl lg:text-5xl',
    'subtitle'   => 'Modals of deduction',

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
                        '<div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-slate-700 dark:bg-slate-900">
    <div class="bg-violet-100 px-4 py-4 text-center dark:bg-violet-950/40 sm:px-5 sm:py-5">
        <p class="text-base font-black leading-snug text-red-500 sm:text-lg lg:text-xl">
            We use modals of deduction to talk about how likely or unlikely something is.
        </p>
    </div>

    <div class="grid gap-3 p-3 sm:hidden">
        <div class="rounded-xl border border-slate-200 bg-slate-50 p-3 dark:border-slate-700 dark:bg-slate-950/50">
            <p class="text-sm font-black text-blue-900 dark:text-blue-300">must be</p>
            <p class="mt-1 text-sm font-bold text-slate-800 dark:text-slate-100">Strong certainty</p>
            <p class="mt-2 text-sm font-bold text-slate-800 dark:text-slate-100">
                She <span class="font-black text-red-500">must be</span> popular.
            </p>
        </div>

        <div class="rounded-xl border border-slate-200 bg-slate-50 p-3 dark:border-slate-700 dark:bg-slate-950/50">
            <p class="text-sm font-black text-blue-900 dark:text-blue-300">can\'t be</p>
            <p class="mt-1 text-sm font-bold text-slate-800 dark:text-slate-100">Strong negative deduction</p>
            <p class="mt-2 text-sm font-bold text-slate-800 dark:text-slate-100">
                They <span class="font-black text-red-500">can\'t be</span> real friends.
            </p>
        </div>

        <div class="rounded-xl border border-slate-200 bg-slate-50 p-3 dark:border-slate-700 dark:bg-slate-950/50">
            <p class="text-sm font-black text-blue-900 dark:text-blue-300">might be</p>
            <p class="mt-1 text-sm font-bold text-slate-800 dark:text-slate-100">Possibility</p>
            <p class="mt-2 text-sm font-bold text-slate-800 dark:text-slate-100">
                She <span class="font-black text-red-500">might be</span> lonely.
            </p>
        </div>

        <div class="rounded-xl border border-slate-200 bg-slate-50 p-3 dark:border-slate-700 dark:bg-slate-950/50">
            <p class="text-sm font-black text-blue-900 dark:text-blue-300">may be</p>
            <p class="mt-1 text-sm font-bold text-slate-800 dark:text-slate-100">Possibility</p>
            <p class="mt-2 text-sm font-bold text-slate-800 dark:text-slate-100">
                She may <span class="font-black">not know</span> them.
            </p>
        </div>

        <div class="rounded-xl border border-slate-200 bg-slate-50 p-3 dark:border-slate-700 dark:bg-slate-950/50">
            <p class="text-sm font-black text-blue-900 dark:text-blue-300">could be</p>
            <p class="mt-1 text-sm font-bold text-slate-800 dark:text-slate-100">Possible explanation</p>
            <p class="mt-2 text-sm font-bold text-slate-800 dark:text-slate-100">
                It <span class="font-black text-red-500">could be</span> China.
            </p>
        </div>

        <div class="rounded-xl border border-slate-200 bg-slate-50 p-3 dark:border-slate-700 dark:bg-slate-950/50">
            <p class="text-sm font-black text-blue-900 dark:text-blue-300">might be able to</p>
            <p class="mt-1 text-sm font-bold text-slate-800 dark:text-slate-100">Possible ability</p>
            <p class="mt-2 text-sm font-bold text-slate-800 dark:text-slate-100">
                I <span class="font-black text-red-500">might be</span> able to help.
            </p>
        </div>
    </div>

    <table class="hidden w-full table-fixed border-collapse text-left text-sm font-bold text-slate-950 dark:text-slate-100 sm:table lg:text-base">
        <thead>
            <tr class="border-b border-slate-200 bg-white dark:border-slate-700 dark:bg-slate-900">
                <th class="w-[30%] border-r border-slate-200 px-3 py-3 font-medium text-blue-900 dark:border-slate-700 dark:text-blue-300 lg:px-4">
                    • Structure
                </th>
                <th class="w-[32%] border-r border-slate-200 px-3 py-3 font-medium text-blue-900 dark:border-slate-700 dark:text-blue-300 lg:px-4">
                    Use
                </th>
                <th class="w-[38%] px-3 py-3 font-medium text-blue-900 dark:text-blue-300 lg:px-4">
                    Example
                </th>
            </tr>
        </thead>

        <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
            <tr>
                <td class="border-r border-slate-200 px-3 py-3 dark:border-slate-700 lg:px-4">• <span class="font-black">must be</span></td>
                <td class="border-r border-slate-200 px-3 py-3 dark:border-slate-700 lg:px-4">Strong certainty</td>
                <td class="px-3 py-3 lg:px-4">She <span class="font-black text-red-500">must be</span> popular.</td>
            </tr>
            <tr>
                <td class="border-r border-slate-200 px-3 py-3 dark:border-slate-700 lg:px-4">• <span class="font-black">can\'t be</span></td>
                <td class="border-r border-slate-200 px-3 py-3 dark:border-slate-700 lg:px-4">Strong negative deduction</td>
                <td class="px-3 py-3 lg:px-4">They <span class="font-black text-red-500">can\'t be</span> real friends.</td>
            </tr>
            <tr>
                <td class="border-r border-slate-200 px-3 py-3 dark:border-slate-700 lg:px-4">• <span class="font-black">might be</span></td>
                <td class="border-r border-slate-200 px-3 py-3 dark:border-slate-700 lg:px-4">Possibility</td>
                <td class="px-3 py-3 lg:px-4">She <span class="font-black text-red-500">might be</span> lonely.</td>
            </tr>
            <tr>
                <td class="border-r border-slate-200 px-3 py-3 dark:border-slate-700 lg:px-4">• <span class="font-black">may be</span></td>
                <td class="border-r border-slate-200 px-3 py-3 dark:border-slate-700 lg:px-4">Possibility</td>
                <td class="px-3 py-3 lg:px-4">She may <span class="font-black">not know</span> them.</td>
            </tr>
            <tr>
                <td class="border-r border-slate-200 px-3 py-3 dark:border-slate-700 lg:px-4">• <span class="font-black">could be</span></td>
                <td class="border-r border-slate-200 px-3 py-3 dark:border-slate-700 lg:px-4">Possible explanation</td>
                <td class="px-3 py-3 lg:px-4">It <span class="font-black text-red-500">could be</span> China.</td>
            </tr>
            <tr>
                <td class="border-r border-slate-200 px-3 py-3 dark:border-slate-700 lg:px-4">• <span class="font-black">might be able to</span></td>
                <td class="border-r border-slate-200 px-3 py-3 dark:border-slate-700 lg:px-4">Possible ability</td>
                <td class="px-3 py-3 lg:px-4">I <span class="font-black text-red-500">might be</span> able to help.</td>
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

@include("slider.other.grammar-info-cards", ["content" => $content])