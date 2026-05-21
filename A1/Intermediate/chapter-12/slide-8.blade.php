<?php

$content = [
    'title'    => 'Grammar Focus',
    'subtitle' => 'Asking for Permission : (Can / Could / May)',

    'image'     => materialAsset('slider/A1/Intermediate/chapter-10/img/slide7/window-seat.webp'),


    'cards' => [
        [
            'label' => 'Example 1',
            'emoji' => '💺',
            'text'  => '<span class="text-indigo-600 font-black">Could</span> you please <span class="text-indigo-600 font-black">help</span> me find my seat?',
            'theme' => 'indigo',
        ],
        [
            'label' => 'Example 2',
            'emoji' => '🪪',
            'text'  => '<span class="text-violet-600 font-black">May</span> I <span class="text-violet-600 font-black">see</span> your boarding pass, please?',
            'theme' => 'violet',
        ],
        [
            'label' => 'Example 3',
            'emoji' => '🛫',
            'text'  => '<span class="text-blue-600 font-black">May</span> I <span class="text-blue-600 font-black">recline</span> my seat?',
            'theme' => 'blue',
        ],
        [
            'label' => 'Example 4',
            'emoji' => '🛏️',
            'text'  => '<span class="text-sky-600 font-black">Can</span> I <span class="text-sky-600 font-black">have</span> a blanket?',
            'theme' => 'sky',
        ],
    ],
];

?>

@include('slider.other.discussion', ['content' => $content])