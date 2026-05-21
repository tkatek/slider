<?php
$content = [
    'page_title' => '',
    'title'      => 'New Language',
    'subtitle'   => '',
    'image'      => materialAsset('slider/A2/Advanced/chapter-5/img/slide7.webp'),
    'note_label' => 'Useful Language',
    'note_title' => 'How can you overcome difficulties in a new country?',
    'note_content' => [
        'The Problend & the Solution',
    ],

    'items'      => [
        [
            'emoji' => '🏠',
            'text'  => '<div class="grid gap-2 sm:grid-cols-[minmax(0,1fr)_auto_minmax(0,1fr)] sm:items-center">
                            <span class="rounded-2xl border border-rose-100 bg-rose-50 px-3 py-2 text-rose-900 dark:border-rose-500/20 dark:bg-rose-950/25 dark:text-rose-100">I am homesick.</span>
                            <span class="hidden text-xl font-black text-slate-400 sm:inline">&rarr;</span>
                            <span class="rounded-2xl border border-emerald-100 bg-emerald-50 px-3 py-2 text-emerald-900 dark:border-emerald-500/20 dark:bg-emerald-950/25 dark:text-emerald-100">Make new friends.</span>
                        </div>',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-5/audios/slide7/1.mp3'),
        ],
        [
            'emoji' => '🌍',
            'text'  => '<div class="grid gap-2 sm:grid-cols-[minmax(0,1fr)_auto_minmax(0,1fr)] sm:items-center">
                            <span class="rounded-2xl border border-rose-100 bg-rose-50 px-3 py-2 text-rose-900 dark:border-rose-500/20 dark:bg-rose-950/25 dark:text-rose-100">Everything is new.</span>
                            <span class="hidden text-xl font-black text-slate-400 sm:inline">&rarr;</span>
                            <span class="rounded-2xl border border-emerald-100 bg-emerald-50 px-3 py-2 text-emerald-900 dark:border-emerald-500/20 dark:bg-emerald-950/25 dark:text-emerald-100">You
                                <span class="bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 bg-clip-text text-transparent font-black">have to</span>
                                relearn things.</span>
                        </div>',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-5/audios/slide7/2.mp3'),
        ],
        [
            'emoji' => '🎯',
            'text'  => '<div class="grid gap-2 sm:grid-cols-[minmax(0,1fr)_auto_minmax(0,1fr)] sm:items-center">
                            <span class="rounded-2xl border border-rose-100 bg-rose-50 px-3 py-2 text-rose-900 dark:border-rose-500/20 dark:bg-rose-950/25 dark:text-rose-100">I miss everything.</span>
                            <span class="hidden text-xl font-black text-slate-400 sm:inline">&rarr;</span>
                            <span class="rounded-2xl border border-emerald-100 bg-emerald-50 px-3 py-2 text-emerald-900 dark:border-emerald-500/20 dark:bg-emerald-950/25 dark:text-emerald-100">You
                                <span class="bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 bg-clip-text text-transparent font-black">need to</span>
                                adapt to achieve your goals.</span>
                        </div>',
            'sound'    => materialAsset('slider/A2/Advanced/chapter-5/audios/slide7/3.mp3'),
        ],
    ],
];
?>
@include('slider.other.new-language-emoji', ['content' => $content])
