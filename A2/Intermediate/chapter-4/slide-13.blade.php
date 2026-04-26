<?php
$content = [
    'page_title' => 'Reading Comprehension',
    'title'      => 'Reading Comprehension',
    'subtitle'   => 'Read these three excerpts and answer the questions',
    'heading'    => '',
    'passage_title' => 'Are you having a BAD week?',

    'passage' => [
        '<strong>Sean Davis:</strong> Actually, yes. I was going to work on the train Monday morning, and I was talking to this woman. I guess I wasn’t paying attention, and I missed my stop. I was half an hour late for a meeting with my new boss.',
        '<strong>Julia Chen:</strong> Definitely! My friend accidentally deleted all my music files when she was using my computer. Actually, she was trying to help me - she was downloading stuff from my phone, and something went wrong. I spent hours on the phone with tech support.',
        '<strong>Roberto Moreno:</strong> Yeah, kind of. A couple of days ago, a friend and I were trying to look cool in front of some girls at the mall. We weren’t looking, and we walked right into a glass door. I was so embarrassed.',
    ],

    'images' => [
        [
            'class' => 'w-full max-w-2xl',
            'html' => '<div class="rounded-2xl border border-slate-200 bg-white p-5 text-left text-base font-bold leading-relaxed text-slate-900 shadow-sm dark:border-slate-700 dark:bg-slate-900 dark:text-white sm:text-lg">
                <ol class="list-decimal space-y-3 pl-5">
                    <li>
                        Sean <span class="text-slate-500 dark:text-slate-400">missed / was missing</span> his stop because he
                        <span class="text-slate-500 dark:text-slate-400">talked / was talking</span> to a woman on the train.
                    </li>
                    <li>
                        Julia’s friend <span class="text-slate-500 dark:text-slate-400">deleted / was deleting</span> all Julia’s music files when she
                        <span class="text-slate-500 dark:text-slate-400">used / was using</span> her computer.
                    </li>
                    <li>
                        Roberto and his friend <span class="text-slate-500 dark:text-slate-400">tried / were trying</span> to look cool when they
                        <span class="text-slate-500 dark:text-slate-400">walked / were walking</span> into a glass door.
                    </li>
                </ol>
            </div>',
            'alt' => 'Past simple and past continuous choices',
        ],
    ],
];
?>

@include("slider.other.reading-comprehension", ['content' => $content])
