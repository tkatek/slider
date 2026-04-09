<?php
$content = [
    'page_title' => 'New Language',
    'title' => 'New Language',
    'subtitle' => '',
    'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4',

    'items' => [
        [
            'text' => 'How may I help you?',
            'text_html' => 'How <span class="title-highlight">may</span> I help you?',
            'emoji' => '🛎️',
            'sound' => materialAsset('slider/A1/Advanced/chapter-1/audios/slide7/line-01.mp3'),
        ],
        [
            'text' => "I have a reservation for tonight / I'd like to check in, please.",
            'text_html' => 'I have a reservation for tonight / <span class="title-highlight">I&rsquo;d like to</span> check in, please.',
            'emoji' => '📝',
            'sound' => materialAsset('slider/A1/Advanced/chapter-1/audios/slide7/line-02-corrected.mp3'),
        ],
        [
            'text' => 'May I have your name, please?',
            'text_html' => '<span class="title-highlight">May I</span> have your name, please?',
            'emoji' => '👤',
            'sound' => materialAsset('slider/A1/Advanced/chapter-1/audios/slide7/line-03.mp3'),
        ],
        [
            'text' => 'Would you like to upgrade to a deluxe room for only $20 per night?',
            'text_html' => '<span class="title-highlight">Would you like to</span> upgrade to a deluxe room for only $20 per night?',
            'emoji' => '⬆️',
            'sound' => materialAsset('slider/A1/Advanced/chapter-1/audios/slide7/line-04.mp3'),
        ],
        [
            'text' => 'That sounds great!',
            'emoji' => '✨',
            'sound' => materialAsset('slider/A1/Advanced/chapter-1/audios/slide7/line-05.mp3'),
        ],
        [
            'text' => 'Can you please sign here?',
            'text_html' => '<span class="title-highlight">Can you</span> please sign here?',
            'emoji' => '✍️',
            'sound' => materialAsset('slider/A1/Advanced/chapter-1/audios/slide7/line-06.mp3'),
        ],
        [
            'text' => 'The deluxe room includes breakfast and you can use the gym.',
            'emoji' => '🍳',
            'sound' => materialAsset('slider/A1/Advanced/chapter-1/audios/slide7/line-07.mp3'),
        ],
        [
            'text' => 'Would you mind filling out this form please?',
            'text_html' => '<span class="title-highlight">Would you mind</span> filling out this form please?',
            'emoji' => '📝',
            'sound' => materialAsset('slider/A1/Advanced/chapter-1/audios/slide7/line-08.mp3'),
        ],
        [
            'text' => 'Could I also see your passport?',
            'text_html' => '<span class="title-highlight">Could I</span> also see your passport?',
            'emoji' => '🛂',
            'sound' => materialAsset('slider/A1/Advanced/chapter-1/audios/slide7/line-09.mp3'),
        ],
        [
            'text' => 'Do you have your confirmation number?',
            'emoji' => '🔢',
            'sound' => materialAsset('slider/A1/Advanced/chapter-1/audios/slide7/line-10.mp3'),
        ],
        [
            'text' => 'Can I see some form of identification, please?',
            'text_html' => '<span class="title-highlight">Can I</span> see some form of identification, please?',
            'emoji' => '🪪',
            'sound' => materialAsset('slider/A1/Advanced/chapter-1/audios/slide7/line-11.mp3'),
        ],
        [
            'text' => 'I have a reservation under the name Dan.',
            'emoji' => '📋',
            'sound' => materialAsset('slider/A1/Advanced/chapter-1/audios/slide7/line-12.mp3'),
        ],
    ],
];
?>

@include('slider.vocab.sentence-audio', ['content' => $content])
