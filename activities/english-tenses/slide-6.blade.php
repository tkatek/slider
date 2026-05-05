<?php
$content = [
    'board_title' => 'Past Simple',

    'board_subtitle' => '
        <div class="space-y-4">
            <div>
                🧩
                <span class="text-sky-600 dark:text-sky-300">Subject</span>
                <span class="text-slate-500"> + </span>
                <span class="text-rose-600 dark:text-rose-300">Verb (v2)</span>
                <span class="text-slate-500"> + </span>
                <span class="text-orange-500 dark:text-orange-300">Object</span>
            </div>

            <div>
                🚗
                <span class="text-violet-600 dark:text-violet-300">He</span>
                <span class="text-rose-600 dark:text-rose-300">drove</span>
                <span class="text-orange-500 dark:text-orange-300">a car.</span>
            </div>
        </div>
    ',

    'tone' => 'lavender',

    'button' => 'Next',
];
?>

@include('slider.activities.english-tenses.board', ['content' => $content])