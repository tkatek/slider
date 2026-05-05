<?php
$content = [
    'page_title' => 'New Language',
    'title' => 'New Language',
    'subtitle' => '',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4',

    'cards' => [
        [
            'type' => 'sections',
            'title' => '',
            'tone' => 'from-indigo-500 to-blue-600',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="overflow-x-auto rounded-xl border border-slate-200 dark:border-slate-700">
                            <table class="w-full min-w-[760px] border-collapse text-left text-sm font-bold">
                                <thead>
                                    <tr class="bg-slate-100 text-slate-900 dark:bg-slate-800 dark:text-slate-100">
                                        <th class="border-b border-slate-200 px-4 py-3 text-slate-900 dark:border-slate-700 dark:text-slate-100">Category</th>
                                        <th class="border-b border-slate-200 px-4 py-3 text-slate-900 dark:border-slate-700 dark:text-slate-100">Expressions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-slate-800 dark:text-slate-100">
                                    <tr>
                                        <td class="border-b border-slate-200 px-4 py-4 text-base font-black dark:border-slate-700">Strongly Like 💗</td>
                                        <td class="border-b border-slate-200 px-4 py-4 text-base font-medium leading-[1.45] dark:border-slate-700">I love it. / I really love it. / I enjoy it. / I really enjoy it.</td>
                                    </tr>
                                    <tr>
                                        <td class="border-b border-slate-200 px-4 py-4 text-base font-black dark:border-slate-700">Like 🙄</td>
                                        <td class="border-b border-slate-200 px-4 py-4 text-base font-medium leading-[1.45] dark:border-slate-700">I like it. / I quite like it.</td>
                                    </tr>
                                    <tr>
                                        <td class="border-b border-slate-200 px-4 py-4 text-base font-black dark:border-slate-700">Neutral 🙄</td>
                                        <td class="border-b border-slate-200 px-4 py-4 text-base font-medium leading-[1.45] dark:border-slate-700">I don’t mind it. / It’s okay.</td>
                                    </tr>
                                    <tr>
                                        <td class="border-b border-slate-200 px-4 py-4 text-base font-black dark:border-slate-700">Don’t Like 🙁</td>
                                        <td class="border-b border-slate-200 px-4 py-4 text-base font-medium leading-[1.45] dark:border-slate-700">I don’t like it. / I don’t really like it.</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-4 text-base font-black">Strongly Dislike 😡</td>
                                        <td class="px-4 py-4 text-base font-medium leading-[1.45]">I hate it. / I really hate it.</td>
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