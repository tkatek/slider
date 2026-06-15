<?php
$content = [
    'page_title' => 'Language Focus',
    'title'      => 'Language Focus',
    'subtitle'   => 'Random acts of kindness collocations',

    'note_title'   => 'Collocations are words that go together:',
    'note_content' => [
        'For Example: “Make a difference”',
    ],

    'items' => [
        [
            'emoji' => '🙏',
            'text'  => '<span class="font-black text-emerald-700 dark:text-emerald-300">Ask for a favor</span>',
        ],
        [
            'emoji' => '🤝',
            'text'  => '<span class="font-black text-emerald-700 dark:text-emerald-300">Do a favor</span>',
        ],
        [
            'emoji' => '↩️',
            'text'  => '<span class="font-black text-emerald-700 dark:text-emerald-300">Return a favor</span>',
        ],
        [
            'emoji' => '🙋',
            'text'  => '<span class="font-black text-emerald-700 dark:text-emerald-300">Need a favor</span>',
        ],
        [
            'emoji' => '💚',
            'text'  => '<span class="font-black text-emerald-700 dark:text-emerald-300">Take care of</span> someone/something',
        ],
        [
            'emoji' => '🛠️',
            'text'  => '<span class="font-black text-emerald-700 dark:text-emerald-300">Help someone</span> with something',
        ],
        [
            'emoji' => '✋',
            'text'  => '<span class="font-black text-emerald-700 dark:text-emerald-300">Lend a hand</span>',
        ],
        [
            'emoji' => '😊',
            'text'  => '<span class="font-black text-emerald-700 dark:text-emerald-300">Give a smile</span>',
        ],
    ],
];
?>

@include('slider.other.new-language-emoji', ['content' => $content])