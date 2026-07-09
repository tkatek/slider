<?php
$content = [
    'page_title' => 'Grammar Focus',
    'title'      => 'Grammar Focus',
    'subtitle'   => "should / shouldn't for advice and moral responsibility",

    'note_title' => '',

    'items' => [
        [
            'emoji' => '🤝',
            'text'  => "We <span class=\"font-black text-emerald-600 dark:text-emerald-300\">should</span> respect people's feelings.",
            'sound' => '',
        ],
        [
            'emoji' => '❤️',
            'text'  => "We <span class=\"font-black text-emerald-600 dark:text-emerald-300\">should</span> show compassion.",
            'sound' => '',
        ],
        [
            'emoji' => '🚫',
            'text'  => "We <span class=\"font-black text-rose-600 dark:text-rose-300\">shouldn't</span> judge others.",
            'sound' => '',
        ],
        [
            'emoji' => '👟',
            'text'  => "We <span class=\"font-black text-emerald-600 dark:text-emerald-300\">should</span> put ourselves in other people's situations.",
            'sound' => '',
        ],
        [
            'emoji' => '💔',
            'text'  => "We <span class=\"font-black text-rose-600 dark:text-rose-300\">shouldn't</span> make people feel worthless.",
            'sound' => '',
        ],
    ],
];
?>

@include('slider.other.new-language-emoji', ['content' => $content])