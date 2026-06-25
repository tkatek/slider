<?php
$content = [
    'page_title' => '',
    'title'      => 'New Language',
    'subtitle'   => 'Modals of Deduction in the Past',

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
    <div class="grid gap-3 p-3 sm:hidden">
        <div class="rounded-xl border border-slate-200 bg-slate-50 p-3 dark:border-slate-700 dark:bg-slate-950/50">
            <p class="text-sm font-black text-slate-950 dark:text-white">must have + past participle</p>
            <p class="mt-1 text-sm font-bold text-slate-800 dark:text-slate-100">Strong certainty about the past</p>
            <p class="mt-2 text-sm font-bold text-slate-800 dark:text-slate-100">
                He <span class="font-black text-red-500">must have gone</span> out with friends.
            </p>
        </div>

        <div class="rounded-xl border border-slate-200 bg-slate-50 p-3 dark:border-slate-700 dark:bg-slate-950/50">
            <p class="text-sm font-black text-slate-950 dark:text-white">might have + past participle</p>
            <p class="mt-1 text-sm font-bold text-slate-800 dark:text-slate-100">A possible explanation about the past</p>
            <p class="mt-2 text-sm font-bold text-slate-800 dark:text-slate-100">
                Anthony <span class="font-black text-red-500">might have gone</span> to see Ricardo.
            </p>
        </div>

        <div class="rounded-xl border border-slate-200 bg-slate-50 p-3 dark:border-slate-700 dark:bg-slate-950/50">
            <p class="text-sm font-black text-slate-950 dark:text-white">could have + past participle</p>
            <p class="mt-1 text-sm font-bold text-slate-800 dark:text-slate-100">Another possible explanation about the past</p>
            <p class="mt-2 text-sm font-bold text-slate-800 dark:text-slate-100">
                Where <span class="font-black text-red-500">could he have gone</span>?
            </p>
        </div>

        <div class="rounded-xl border border-slate-200 bg-slate-50 p-3 dark:border-slate-700 dark:bg-slate-950/50">
            <p class="text-sm font-black text-slate-950 dark:text-white">can\'t have + past participle</p>
            <p class="mt-1 text-sm font-bold text-slate-800 dark:text-slate-100">Something is impossible or unlikely in the past</p>
            <p class="mt-2 text-sm font-bold text-slate-800 dark:text-slate-100">
                He <span class="font-black text-red-500">can\'t have forgotten</span> to call us.
            </p>
        </div>
    </div>

    <table class="hidden w-full table-fixed border-collapse text-left text-sm font-bold text-slate-950 dark:text-slate-100 sm:table lg:text-base">
        <thead>
            <tr class="border-b border-slate-200 bg-white dark:border-slate-700 dark:bg-slate-900">
                <th class="w-[32%] border-r border-slate-200 px-3 py-3 font-black text-slate-950 dark:border-slate-700 dark:text-white lg:px-4">
                    Modal
                </th>
                <th class="w-[32%] border-r border-slate-200 px-3 py-3 font-black text-slate-950 dark:border-slate-700 dark:text-white lg:px-4">
                    Use
                </th>
                <th class="w-[36%] px-3 py-3 font-black text-slate-950 dark:text-white lg:px-4">
                    Examples
                </th>
            </tr>
        </thead>

        <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
            <tr>
                <td class="border-r border-slate-200 px-3 py-4 dark:border-slate-700 lg:px-4">
                    <span class="font-black">must have + past participle</span>
                </td>
                <td class="border-r border-slate-200 px-3 py-4 dark:border-slate-700 lg:px-4">
                    Strong certainty about the past
                </td>
                <td class="px-3 py-4 lg:px-4">
                    He <span class="font-black text-red-500">must have gone</span> out with friends.
                </td>
            </tr>

            <tr>
                <td class="border-r border-slate-200 px-3 py-4 dark:border-slate-700 lg:px-4">
                    <span class="font-black">might have + past participle</span>
                </td>
                <td class="border-r border-slate-200 px-3 py-4 dark:border-slate-700 lg:px-4">
                    A possible explanation about the past
                </td>
                <td class="px-3 py-4 lg:px-4">
                    Anthony <span class="font-black text-red-500">might have gone</span> to see Ricardo.
                </td>
            </tr>

            <tr>
                <td class="border-r border-slate-200 px-3 py-4 dark:border-slate-700 lg:px-4">
                    <span class="font-black">could have + past participle</span>
                </td>
                <td class="border-r border-slate-200 px-3 py-4 dark:border-slate-700 lg:px-4">
                    Another possible explanation about the past
                </td>
                <td class="px-3 py-4 lg:px-4">
                    Where <span class="font-black text-red-500">could he have gone</span>?
                </td>
            </tr>

            <tr>
                <td class="border-r border-slate-200 px-3 py-4 dark:border-slate-700 lg:px-4">
                    <span class="font-black">can\'t have + past participle</span>
                </td>
                <td class="border-r border-slate-200 px-3 py-4 dark:border-slate-700 lg:px-4">
                    Something is impossible or unlikely in the past
                </td>
                <td class="px-3 py-4 lg:px-4">
                    He <span class="font-black text-red-500">can\'t have forgotten</span> to call us.
                </td>
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