<?php
$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => 'Useful sentences for conversations at the petrol station.',

    'card_type'  => 'text',
    'popup'      => 'focus',
    'grid_class' => 'grid-cols-1 md:grid-cols-3',

    'items' => [
        [
            'emoji' => '⛽',
            'text'  => 'Now I have to fill the tank at <span class="text-amber-700 dark:text-amber-300 font-black">the nearest</span> fuel station.',
            'sound' => materialAsset('slider/A1/Advanced/chapter-11/audios/slide7/Now-have.mpeg'),
        ],
        [
            'emoji' => '☀️',
            'text'  => 'It\'s a <span class="text-blue-700 dark:text-blue-300 font-black">fine day</span>, isn\'t it? - <span class="text-blue-700 dark:text-blue-300 font-black">Yes, indeed it is</span>.',
            'sound' => materialAsset('slider/A1/Advanced/chapter-11/audios/slide7/It-a-fine-day.mpeg'),
        ],
        [
            'emoji' => '💬',
            'text'  => '<span class="text-blue-700 dark:text-blue-300 font-black">How may I assist you</span> today?',
            'sound' => materialAsset('slider/A1/Advanced/chapter-11/audios/slide7/How-may.mpeg'),
        ],
        [
            'emoji' => '🚗',
            'text'  => '<span class="text-blue-700 dark:text-blue-300 font-black">I need</span> a full tank of petrol for my car, please.',
            'sound' => materialAsset('slider/A1/Advanced/chapter-11/audios/slide7/I-need-full.mpeg'),
        ],
        [
            'emoji' => '❓',
            'text'  => '<span class="text-blue-700 dark:text-blue-300 font-black">Could you</span> tell me the difference?',
            'sound' => materialAsset('slider/A1/Advanced/chapter-11/audios/slide7/Could-you-tell.mpeg'),
        ],
        [
            'emoji' => '💵',
            'text'  => 'It\'s a bit <span class="text-amber-700 dark:text-amber-300 font-black">more expensive than</span> regular petrol.',
            'sound' => materialAsset('slider/A1/Advanced/chapter-11/audios/slide7/It-s-a-bit-more.mpeg'),
        ],
        [
            'emoji' => '✅',
            'text'  => '<span class="text-blue-700 dark:text-blue-300 font-black">It\'s worth</span> the cost.',
            'sound' => materialAsset('slider/A1/Advanced/chapter-11/audios/slide7/It-s-worth.mpeg'),
        ],
        [
            'emoji' => '🧾',
            'text'  => 'The total for the petrol <span class="text-blue-700 dark:text-blue-300 font-black">comes to</span> $45.',
            'sound' => materialAsset('slider/A1/Advanced/chapter-11/audios/slide7/The-total.mpeg'),
        ],
        [
            'emoji' => '🤝',
            'text'  => 'Here you go.',
            'sound' => materialAsset('slider/A1/Advanced/chapter-11/audios/slide7/Here-you-go.mpeg'),
        ],
    ],
];
?>

@include('slider.vocab.image-card', ['content' => $content])