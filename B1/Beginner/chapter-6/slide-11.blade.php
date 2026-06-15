<?php
$content = [
    'page_title' => 'Useful Sentence Patterns',
    'title'      => 'Useful Sentence Patterns',
    'subtitle'   => '',



    'items' => [
        [
            'emoji' => '💬',
            'text'  => '
                <span class="font-black text-blue-700 dark:text-blue-300">I prefer + noun / activity.</span><br>
                I prefer outdoor <span class="font-black text-emerald-600 dark:text-emerald-300">activities</span>.<br>
                I prefer <span class="font-black text-emerald-600 dark:text-emerald-300">reading</span> to
                <span class="font-black text-emerald-600 dark:text-emerald-300">watching</span> TV.
            ',
        ],
        [
            'emoji' => '🙋',
            'text'  => '
                <span class="font-black text-blue-700 dark:text-blue-300">I\'m more of a(n) ... person.</span><br>
                I\'m more of an outdoor person.<br>
                I\'m more of a movie person.
            ',
        ],
        [
            'emoji' => '❤️',
            'text'  => '
                <span class="font-black text-blue-700 dark:text-blue-300">I like ..., but ...</span><br>
                I like reading, <span class="font-black text-emerald-600 dark:text-emerald-300">but</span> I also enjoy hiking.<br>
                I like indoor activities, <span class="font-black text-emerald-600 dark:text-emerald-300">but</span> I need fresh air sometimes.
            ',
        ],
        [
            'emoji' => '✨',
            'text'  => '
                <span class="font-black text-blue-700 dark:text-blue-300">You should try ...</span><br>
                You should try camping.<br>
                You should try cycling with us.
            ',
        ],
        [
            'emoji' => '🌟',
            'text'  => '
                <span class="font-black text-blue-700 dark:text-blue-300">I\'m open to + noun / -ing</span><br>
                I\'m open <span class="font-black text-red-500 dark:text-red-300">to</span> new experiences.<br>
                I\'m open <span class="font-black text-red-500 dark:text-red-300">to</span>
                <span class="font-black text-emerald-600 dark:text-emerald-300">trying</span> outdoor sports.
            ',
        ],
    ],
];
?>

@include('slider.other.new-language-emoji', ['content' => $content])