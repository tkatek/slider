{{-- resources/views/slider/slide-emergency-or-not.blade.php --}}
<?php
// Make sure $content exists before reading from it
$content = $content ?? [];

$uid = $content['uid'] ?? ('quiz_' . substr(md5(uniqid('', true)), 0, 10));

$content = array_replace_recursive([
    'uid'        => $uid,
    'page_title' => 'Warm-up',
    'title'      => 'Warm-up',
    'subtitle'   => 'Emergency or non-Emergency?!',
    'theme'      => '#6366f1',

    'grid' => [
        'cols' => [
            'base' => 1,
            'sm'   => 1,
            'md'   => 2,
            'lg'   => 3,
        ],
        'gap'         => 'gap-3 sm:gap-4 lg:gap-5',
        'card_height' => 'h-24 sm:h-28 lg:h-32',
    ],

    'sounds' => [
        'click' => materialAsset('slider/sounds/tap.wav'),
        'done'  => materialAsset('slider/sounds/correct.wav'),
        'skip'  => materialAsset('slider/sounds/click.wav'),
    ],

    // ✅ Emergency or Not items (materialAsset() format)
    'items' => [
        [
            'question' => 'A car accident.',
            'answer'   => 'Emergency.',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-6/img/slide4/car-accident.webp'),
        ],
        [
            'question' => 'Falling off the stairs.',
            'answer'   => 'Emergency.',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-6/img/slide4/falling-off-the-stairs.webp'),
        ],
        [
            'question' => 'A house on fire.',
            'answer'   => 'Emergency.',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-6/img/slide4/house-on-fire.webp'),
        ],
        [
            'question' => 'Someone has a fever.',
            'answer'   => 'Not an emergency.',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-6/img/slide4/fever.webp'),
        ],
        [
            'question' => 'A missing cat.',
            'answer'   => 'Not an emergency.',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-6/img/slide4/missing-cat.webp'),
        ],
        [
            'question' => 'A lady who has a heart attack.',
            'answer'   => 'Emergency.',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-6/img/slide4/heart-attack.webp'),
        ],
        [
            'question' => 'A lady giving birth.',
            'answer'   => 'Emergency.',
            'image'    => materialAsset('slider/A1/Intermediate/chapter-6/img/slide4/giving-birth.webp'),
        ],
    ],
], $content);
?>

@include("slider.game.question-answer", ['content' => $content])