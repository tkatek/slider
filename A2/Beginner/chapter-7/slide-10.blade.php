@php
    $content = [

        'title'      => 'To sum up',
        'subtitle'   => 'Question forms and answer models for describing appearance.',

        'cards_grid_class' => 'mt-6 grid grid-cols-1 gap-4',

        'cards' => [
            [
                'type' => 'sections',
                'title' => '',
                'tone' => 'from-orange-500 via-amber-500 to-yellow-500',
                'plain_sections' => true,
                'raw_items' => true,
                'sections' => [
                    [
                        'heading' => '',
                        'items' => [
                            <<<'HTML'
<div class="overflow-hidden rounded-[1.5rem] border border-orange-100 bg-white shadow-sm dark:border-orange-400/20 dark:bg-slate-900/80">
    <div class="hidden overflow-x-auto lg:block">
        <table class="w-full border-collapse text-left">
            <thead>
                <tr class="bg-gradient-to-r from-orange-500 to-amber-500">
                    <th class="border-r border-white/30 px-4 py-4 text-sm font-black text-white">Question Type</th>
                    <th class="border-r border-white/30 px-4 py-4 text-sm font-black text-white">Question Structure</th>
                    <th class="border-r border-white/30 px-4 py-4 text-sm font-black text-white">Example Question</th>
                    <th class="border-r border-white/30 px-4 py-4 text-sm font-black text-white">Short Answer</th>
                    <th class="px-4 py-4 text-sm font-black text-white">Full Answer</th>
                </tr>
            </thead>
            <tbody class="text-sm font-bold text-slate-900 dark:text-slate-100">
                <tr>
                    <td class="border-r border-b border-slate-200 px-4 py-4 font-black dark:border-slate-700">Be (is/are)</td>
                    <td class="border-r border-b border-slate-200 px-4 py-4 font-black text-red-600 dark:border-slate-700 dark:text-red-300">Is/Are + subject + adjective?</td>
                    <td class="border-r border-b border-slate-200 px-4 py-4 dark:border-slate-700">Is she tall?</td>
                    <td class="border-r border-b border-slate-200 px-4 py-4 dark:border-slate-700">Yes, she is. / No, she isn't.</td>
                    <td class="border-b border-slate-200 px-4 py-4 dark:border-slate-700">Yes, she is tall. / No, she isn't tall.</td>
                </tr>
                <tr class="bg-slate-50 dark:bg-slate-950/50">
                    <td class="border-r border-b border-slate-200 px-4 py-4 font-black dark:border-slate-700">Have (physical features)</td>
                    <td class="border-r border-b border-slate-200 px-4 py-4 font-black text-red-600 dark:border-slate-700 dark:text-red-300">Does + subject + have + noun?</td>
                    <td class="border-r border-b border-slate-200 px-4 py-4 dark:border-slate-700">Does he have curly hair?</td>
                    <td class="border-r border-b border-slate-200 px-4 py-4 dark:border-slate-700">Yes, he does. / No, he doesn't.</td>
                    <td class="border-b border-slate-200 px-4 py-4 dark:border-slate-700">Yes, he has curly hair. / No, he doesn't have curly hair.</td>
                </tr>
                <tr>
                    <td class="border-r border-b border-slate-200 px-4 py-4 font-black dark:border-slate-700">Wh- question (general)</td>
                    <td class="border-r border-b border-slate-200 px-4 py-4 font-black text-red-600 dark:border-slate-700 dark:text-red-300">What does + subject + look like?</td>
                    <td class="border-r border-b border-slate-200 px-4 py-4 dark:border-slate-700">What does she look like?</td>
                    <td class="border-r border-b border-slate-200 px-4 py-4 dark:border-slate-700">She is short with long brown hair.</td>
                    <td class="border-b border-slate-200 px-4 py-4 dark:border-slate-700">She is short. She has long brown hair.</td>
                </tr>
                <tr class="bg-slate-50 dark:bg-slate-950/50">
                    <td class="border-r border-b border-slate-200 px-4 py-4 font-black dark:border-slate-700">Wh- question (details)</td>
                    <td class="border-r border-b border-slate-200 px-4 py-4 font-black text-red-600 dark:border-slate-700 dark:text-red-300">What colour / How + adjective?</td>
                    <td class="border-r border-b border-slate-200 px-4 py-4 dark:border-slate-700">What colour are his eyes?</td>
                    <td class="border-r border-b border-slate-200 px-4 py-4 dark:border-slate-700">They're brown.</td>
                    <td class="border-b border-slate-200 px-4 py-4 dark:border-slate-700">His eyes are brown.</td>
                </tr>
                <tr>
                    <td class="border-r border-slate-200 px-4 py-4 font-black dark:border-slate-700">Choice question</td>
                    <td class="border-r border-slate-200 px-4 py-4 font-black text-red-600 dark:border-slate-700 dark:text-red-300">Is/Does + subject + A or B?</td>
                    <td class="border-r border-slate-200 px-4 py-4 dark:border-slate-700">Is he tall or short?</td>
                    <td class="border-r border-slate-200 px-4 py-4 dark:border-slate-700">He's tall.</td>
                    <td class="px-4 py-4">He is tall.</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="grid gap-3 p-3 lg:hidden">
        <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-700 dark:bg-slate-950/50">
            <h3 class="text-base font-black text-slate-950 dark:text-white">Be (is/are)</h3>
            <p class="mt-2 text-sm font-bold text-slate-700 dark:text-slate-200"><span class="font-black text-slate-950 dark:text-white">Structure:</span> <span class="text-red-600 dark:text-red-300">Is/Are + subject + adjective?</span></p>
            <p class="mt-1 text-sm font-bold text-slate-700 dark:text-slate-200"><span class="font-black text-slate-950 dark:text-white">Example:</span> Is she tall?</p>
            <p class="mt-1 text-sm font-bold text-slate-700 dark:text-slate-200"><span class="font-black text-slate-950 dark:text-white">Short:</span> Yes, she is. / No, she isn't.</p>
            <p class="mt-1 text-sm font-bold text-slate-700 dark:text-slate-200"><span class="font-black text-slate-950 dark:text-white">Full:</span> Yes, she is tall. / No, she isn't tall.</p>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-700 dark:bg-slate-950/50">
            <h3 class="text-base font-black text-slate-950 dark:text-white">Have (physical features)</h3>
            <p class="mt-2 text-sm font-bold text-slate-700 dark:text-slate-200"><span class="font-black text-slate-950 dark:text-white">Structure:</span> <span class="text-red-600 dark:text-red-300">Does + subject + have + noun?</span></p>
            <p class="mt-1 text-sm font-bold text-slate-700 dark:text-slate-200"><span class="font-black text-slate-950 dark:text-white">Example:</span> Does he have curly hair?</p>
            <p class="mt-1 text-sm font-bold text-slate-700 dark:text-slate-200"><span class="font-black text-slate-950 dark:text-white">Short:</span> Yes, he does. / No, he doesn't.</p>
            <p class="mt-1 text-sm font-bold text-slate-700 dark:text-slate-200"><span class="font-black text-slate-950 dark:text-white">Full:</span> Yes, he has curly hair. / No, he doesn't have curly hair.</p>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-700 dark:bg-slate-950/50">
            <h3 class="text-base font-black text-slate-950 dark:text-white">Wh- question (general)</h3>
            <p class="mt-2 text-sm font-bold text-slate-700 dark:text-slate-200"><span class="font-black text-slate-950 dark:text-white">Structure:</span> <span class="text-red-600 dark:text-red-300">What does + subject + look like?</span></p>
            <p class="mt-1 text-sm font-bold text-slate-700 dark:text-slate-200"><span class="font-black text-slate-950 dark:text-white">Example:</span> What does she look like?</p>
            <p class="mt-1 text-sm font-bold text-slate-700 dark:text-slate-200"><span class="font-black text-slate-950 dark:text-white">Short:</span> She is short with long brown hair.</p>
            <p class="mt-1 text-sm font-bold text-slate-700 dark:text-slate-200"><span class="font-black text-slate-950 dark:text-white">Full:</span> She is short. She has long brown hair.</p>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-700 dark:bg-slate-950/50">
            <h3 class="text-base font-black text-slate-950 dark:text-white">Wh- question (details)</h3>
            <p class="mt-2 text-sm font-bold text-slate-700 dark:text-slate-200"><span class="font-black text-slate-950 dark:text-white">Structure:</span> <span class="text-red-600 dark:text-red-300">What colour / How + adjective?</span></p>
            <p class="mt-1 text-sm font-bold text-slate-700 dark:text-slate-200"><span class="font-black text-slate-950 dark:text-white">Example:</span> What colour are his eyes?</p>
            <p class="mt-1 text-sm font-bold text-slate-700 dark:text-slate-200"><span class="font-black text-slate-950 dark:text-white">Short:</span> They're brown.</p>
            <p class="mt-1 text-sm font-bold text-slate-700 dark:text-slate-200"><span class="font-black text-slate-950 dark:text-white">Full:</span> His eyes are brown.</p>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-700 dark:bg-slate-950/50">
            <h3 class="text-base font-black text-slate-950 dark:text-white">Choice question</h3>
            <p class="mt-2 text-sm font-bold text-slate-700 dark:text-slate-200"><span class="font-black text-slate-950 dark:text-white">Structure:</span> <span class="text-red-600 dark:text-red-300">Is/Does + subject + A or B?</span></p>
            <p class="mt-1 text-sm font-bold text-slate-700 dark:text-slate-200"><span class="font-black text-slate-950 dark:text-white">Example:</span> Is he tall or short?</p>
            <p class="mt-1 text-sm font-bold text-slate-700 dark:text-slate-200"><span class="font-black text-slate-950 dark:text-white">Short:</span> He's tall.</p>
            <p class="mt-1 text-sm font-bold text-slate-700 dark:text-slate-200"><span class="font-black text-slate-950 dark:text-white">Full:</span> He is tall.</p>
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
@endphp

@include('slider.other.grammar-info-cards', ['content' => $content])