<?php

$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => '',
    'grid_class' => 'grid-cols-1 sm:grid-cols-4 ',

    'items' => [
        [
            'text'  => 'How <span class="text-indigo-600 font-black">may</span> I help you?',
            'emoji' => '🛎️',
            'sound' => materialAsset('slider/A1/Advanced/chapter-1/audios/slide7/line-01.mp3'),
        ],
        [
            'text'  => 'I have a reservation for tonight / <span class="text-indigo-600 font-black">I&rsquo;d like to</span> check in, please.',
            'emoji' => '📝',
            'sound' => materialAsset('slider/A1/Advanced/chapter-1/audios/slide7/line-02-corrected.mp3'),
        ],
        [
            'text'  => '<span class="text-indigo-600 font-black">May I</span> have your name, please?',
            'emoji' => '👤',
            'sound' => materialAsset('slider/A1/Advanced/chapter-1/audios/slide7/line-03.mp3'),
        ],
        [
            'text'  => '<span class="text-indigo-600 font-black">Would you like to</span> upgrade to a deluxe room for only $20 per night?',
            'emoji' => '⬆️',
            'sound' => materialAsset('slider/A1/Advanced/chapter-1/audios/slide7/line-04.mp3'),
        ],
        [
            'text'  => 'That sounds great!',
            'emoji' => '✨',
            'sound' => materialAsset('slider/A1/Advanced/chapter-1/audios/slide7/line-05.mp3'),
        ],
        [
            'text'  => '<span class="text-indigo-600 font-black">Can you</span> please sign here?',
            'emoji' => '✍️',
            'sound' => materialAsset('slider/A1/Advanced/chapter-1/audios/slide7/line-06.mp3'),
        ],
        [
            'text'  => 'The deluxe room includes breakfast and you can use the gym.',
            'emoji' => '🍳',
            'sound' => materialAsset('slider/A1/Advanced/chapter-1/audios/slide7/line-07.mp3'),
        ],
        [
            'text'  => '<span class="text-indigo-600 font-black">Would you mind</span> filling out this form please?',
            'emoji' => '📝',
            'sound' => materialAsset('slider/A1/Advanced/chapter-1/audios/slide7/line-08.mp3'),
        ],
        [
            'text'  => '<span class="text-indigo-600 font-black">Could I</span> also see your passport?',
            'emoji' => '🛂',
            'sound' => materialAsset('slider/A1/Advanced/chapter-1/audios/slide7/line-09.mp3'),
        ],
        [
            'text'  => 'Do you have your confirmation number?',
            'emoji' => '🔢',
            'sound' => materialAsset('slider/A1/Advanced/chapter-1/audios/slide7/line-10.mp3'),
        ],
        [
            'text'  => '<span class="text-indigo-600 font-black">Can I</span> see some form of identification, please?',
            'emoji' => '🪪',
            'sound' => materialAsset('slider/A1/Advanced/chapter-1/audios/slide7/line-11.mp3'),
        ],
        [
            'text'  => 'I have a reservation under the name Dan.',
            'emoji' => '📋',
            'sound' => materialAsset('slider/A1/Advanced/chapter-1/audios/slide7/line-12.mp3'),
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])