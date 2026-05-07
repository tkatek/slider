<?php
$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language: “to” for purpose',
    'subtitle'   => 'use + object + to + verb',

    'hide_image' => true,

    'content_grid_class' => 'grid grid-cols-1 gap-6 items-center',
    'items_grid_class'   => 'grid grid-cols-1 gap-4 text-left',
    'item_text_class'    => 'text-xl sm:text-2xl lg:text-3xl',

    'items' => [
        [
            'emoji' => '✨',
            'text'  => '<span class="font-black text-slate-950 dark:text-slate-50">Examples:</span>',
        ],
        [
            'emoji' => '🩺',
            'text'  => 'A doctor <span class="text-purple-600 dark:text-purple-300 font-black">uses</span> a stethoscope <span class="text-orange-500 dark:text-orange-300 font-black">to check</span> patients.',
            'sound' => materialAsset('slider/A2/Advanced/chapter-3/audios/slide10/1.mp3'),
        ],
        [
            'emoji' => '👩‍🏫',
            'text'  => 'A teacher <span class="text-purple-600 dark:text-purple-300 font-black">uses</span> a whiteboard <span class="text-orange-500 dark:text-orange-300 font-black">to teach</span> students.',
            'sound' => materialAsset('slider/A2/Advanced/chapter-3/audios/slide10/2.mp3'),
        ],
        [
            'emoji' => '👨‍🚒',
            'text'  => 'A firefighter <span class="text-purple-600 dark:text-purple-300 font-black">uses</span> a hose <span class="text-orange-500 dark:text-orange-300 font-black">to put out</span> fires.',
            'sound' => materialAsset('slider/A2/Advanced/chapter-3/audios/slide10/3.mp3'),
        ],
        [
            'emoji' => '✍️',
            'text'  => '<div class="mt-6">
                            <p class="text-lg sm:text-xl lg:text-2xl font-black text-slate-950 dark:text-slate-50">
                                Can you give another example using this form:
                            </p>

                            <p class="mt-6 text-2xl sm:text-3xl lg:text-4xl font-black text-orange-500 dark:text-orange-300">
                                A . . . . . . . uses a . . . . . . . to . . . . . . .
                            </p>
                        </div>',
        ],
    ],
];
?>

@include('slider.other.new-language-emoji', ['content' => $content])
