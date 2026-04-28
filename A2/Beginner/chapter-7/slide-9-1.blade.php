<?php
$content = [
    'page_title' => 'Grammar Focus',
    'title' => 'Grammar Focus',
    'subtitle' => '',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4 lg:grid-cols-3',

    'cards' => [
        [
            'type' => 'sections',
            'title' => '💇 Hair',
            'tone' => 'from-zinc-500 to-stone-700',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="rounded-2xl border border-slate-200 bg-white px-4 py-3 dark:border-slate-700 dark:bg-slate-900/70">
                            <p class="text-base font-bold leading-[1.55] text-slate-800 dark:text-slate-100">How long is her hair?</p>
                            <p class="mt-2 pl-5 text-base font-bold leading-[1.55] text-slate-700 dark:text-slate-200">It’s pretty short.</p>
                        </div>',
                        '<div class="rounded-2xl border border-slate-200 bg-white px-4 py-3 dark:border-slate-700 dark:bg-slate-900/70">
                            <p class="text-base font-bold leading-[1.55] text-slate-800 dark:text-slate-100">What color is his hair?</p>
                            <p class="mt-2 pl-5 text-base font-bold leading-[1.55] text-slate-700 dark:text-slate-200">It’s dark/light brown.</p>
                        </div>',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => '🎂 Age',
            'tone' => 'from-zinc-500 to-stone-700',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="rounded-2xl border border-slate-200 bg-white px-4 py-3 dark:border-slate-700 dark:bg-slate-900/70">
                            <p class="text-base font-bold leading-[1.55] text-slate-800 dark:text-slate-100">How old is she?</p>
                            <p class="mt-2 pl-5 text-base font-bold leading-[1.55] text-slate-700 dark:text-slate-200">She’s about 32.</p>
                            <p class="pl-5 text-base font-bold leading-[1.55] text-slate-700 dark:text-slate-200">She’s in her thirties.</p>
                        </div>',
                        '<div class="rounded-2xl border border-slate-200 bg-white px-4 py-3 dark:border-slate-700 dark:bg-slate-900/70">
                            <p class="text-base font-bold leading-[1.55] text-slate-800 dark:text-slate-100">How old is he?</p>
                            <p class="mt-2 pl-5 text-base font-bold leading-[1.55] text-slate-700 dark:text-slate-200">He’s in his twenties.</p>
                        </div>',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => '✍️ Notice the following:',
            'tone' => 'from-zinc-500 to-stone-700',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="rounded-2xl border border-slate-200 bg-white px-4 py-3 dark:border-slate-700 dark:bg-slate-900/70">
                            <p class="text-base font-black leading-[1.45] text-slate-950 dark:text-slate-50 underline decoration-slate-400 decoration-2 underline-offset-4">Using "is" for descriptions:</p>
                            <ul class="mt-3 space-y-2 pl-5 text-base font-bold leading-[1.45] text-slate-800 dark:text-slate-100">
                                <li>• He <span class="text-red-500 font-black">is</span> tall.</li>
                                <li>• She <span class="text-red-500 font-black">is</span> short.</li>
                                <li>• They <span class="text-red-500 font-black">are</span> young.</li>
                            </ul>
                        </div>',
                        '<div class="rounded-2xl border border-slate-200 bg-white px-4 py-3 dark:border-slate-700 dark:bg-slate-900/70">
                            <p class="text-base font-black leading-[1.5] text-blue-700 dark:text-blue-300">
                                Use "is/ am /are" + adjective to describe height, age, and general appearance.
                            </p>
                        </div>',
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])