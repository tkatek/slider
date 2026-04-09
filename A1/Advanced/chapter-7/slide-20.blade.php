<?php
$content = [
    'page_title' => 'Writing',
    'title'      => 'Writing',
    'subtitle'   => "Can you write the meaning of the Sign ? Use can, can’t, must, or mustn’t",

    'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-4',
    'image_ratio' => '4 / 3',
    'image_fit' => 'cover',

    'items' => [
        [
            'text'        => 'No wifi',
            'image'       => materialAsset('slider/A1/Advanced/chapter-7/img/slide20/no-wifi.webp'),
            'answer'      => "You can't use WIFI",
            'placeholder' => 'Write the meaning...',
            'example'     => true,
            'show_answer_in_input' => true, 
        ],
        [
            'text'        => 'No parking',
            'image'       => materialAsset('slider/A1/Advanced/chapter-7/img/slide18/no-parking.webp'),
            'answer'      => '',
            'placeholder' => 'Write the meaning...',
        ],
        [
            'text'        => 'No swimming',
            'image'       => materialAsset('slider/A1/Advanced/chapter-7/img/slide18/no-swim.webp'),
            'answer'      => '',
            'placeholder' => 'Write the meaning...', 
        ],
        [
            'text'        => 'Turn left',
            'image'       => materialAsset('slider/A1/Advanced/chapter-7/img/slide20/turn-left.webp'),
            'answer'      => '',
            'placeholder' => 'Write the meaning...',
        ],
        [
            'text'        => 'Give way',
            'image'       => materialAsset('slider/A1/Advanced/chapter-7/img/slide20/give-way.webp'),
            'answer'      => '',
            'placeholder' => 'Write the meaning...',
        ],
        [
            'text'        => "Don't turn left",
            'image'       => materialAsset('slider/A1/Advanced/chapter-7/img/slide20/no-turn-left.webp'),
            'answer'      => '',
            'placeholder' => 'Write the meaning...',
        ],
        [
            'text'        => 'No fishing',
            'image'       => materialAsset('slider/A1/Advanced/chapter-7/img/slide20/no-fishing.webp'),
            'answer'      => '',
            'placeholder' => 'Write the meaning...',
        ],
        [
            'text'        => 'No eating', 
            'image'       => materialAsset('slider/A1/Advanced/chapter-7/img/slide20/no-eating.webp'),
            'answer'      => '',
            'placeholder' => 'Write the meaning...',
        ],
    ],
];
?>

@include('slider.other.image-writing', ['content' => $content])
