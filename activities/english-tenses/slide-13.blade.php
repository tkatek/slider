<?php
$content = [
    'board_title' => 'Future Perfect Continuous',

    'board_subtitle' => '
        <div class="space-y-4">
            <div>
                🧩
                <span class="text-sky-600 dark:text-sky-300">Subject</span>
                <span class="text-slate-500"> + </span>
                <span class="text-fuchsia-600 dark:text-fuchsia-300">will have been</span>
                <span class="text-slate-500"> + </span>
                <span class="text-rose-600 dark:text-rose-300">Verb (+ing)</span>
                <span class="text-slate-500"> + </span>
                <span class="text-orange-500 dark:text-orange-300">Object</span>
            </div>

            <div>
                ⏳
                <span class="text-violet-600 dark:text-violet-300">He</span>
                <span class="text-fuchsia-600 dark:text-fuchsia-300">will have been</span>
                <span class="text-rose-600 dark:text-rose-300">driving</span>
                <span class="text-orange-500 dark:text-orange-300">a car.</span>
            </div>
        </div>
    ',

    'tone' => 'rose',

    'button' => 'Restart Lesson',
    'button_action' => 'restart',
    'restart_fallback' => 'slide-1.blade.php',
];
?>

@include('slider.activities.english-tenses.board', ['content' => $content])