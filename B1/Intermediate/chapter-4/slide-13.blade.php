<?php

$content = [

    'type'       => 'image',
    'page_title' => 'Practice 6',
    'title'      => 'Practice 6',
    'subtitle'   => 'Choose the correct answer.',

    'enable_image_zoom' => false,
    'game_card_width' => 'max-w-5xl',
    'image_panel_col_class' => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_scale' => 0.6,

    'questions' => [
        [
            'image'   => materialAsset('slider/B1/Intermediate/chapter-4/img/slide13/clean-room.webp'),
            'prompt'  => 'I .......... my room last Sunday.',
            'correct' => 'cleaned',
            'options' => ['cleans', 'clean', 'cleaned'],
        ],
        [
            'image'   => materialAsset('slider/B1/Intermediate/chapter-4/img/slide13/listen-to-music.webp'),
            'prompt'  => 'I .......... to music last night.',
            'correct' => 'listened',
            'options' => ['listen', 'listened', 'listens'],
        ],
        [
            'image'   => materialAsset('slider/B1/Intermediate/chapter-4/img/slide13/visit-grandmother.webp'),
            'prompt'  => 'Yesterday, I .......... my grandmother.',
            'correct' => 'visited',
            'options' => ['visit', 'visits', 'visited'],
        ],
        [
            'image'   => materialAsset('slider/B1/Intermediate/chapter-4/img/slide13/download-movie.webp'),
            'prompt'  => 'I .......... a movie three days ago.',
            'correct' => 'downloaded',
            'options' => ['downloaded', 'download', 'downloads'],
        ],
        [
            'image'   => materialAsset('slider/B1/Intermediate/chapter-4/img/slide13/watch-tv.webp'),
            'prompt'  => 'Yesterday, my dad .......... TV.',
            'correct' => 'watched',
            'options' => ['watch', 'watched', 'watches'],
        ],
        [
            'image'   => materialAsset('slider/B1/Intermediate/chapter-4/img/slide13/play-football.webp'),
            'prompt'  => 'The boys .......... football.',
            'correct' => 'play',
            'options' => ['played', 'play', 'plays'],
        ],
        [
            'image'   => materialAsset('slider/B1/Intermediate/chapter-4/img/slide13/practise-guitar.webp'),
            'prompt'  => 'I .......... guitar every day.',
            'correct' => 'practise',
            'options' => ['practise', 'practiced', 'practices'],
        ],
        [
            'image'   => materialAsset('slider/B1/Intermediate/chapter-4/img/slide13/walk-to-supermarket.webp'),
            'prompt'  => 'Yesterday, my mom .......... to the supermarket.',
            'correct' => 'walked',
            'options' => ['walk', 'walks', 'walked'],
        ],
        [
            'image'   => materialAsset('slider/B1/Intermediate/chapter-4/img/slide13/play-piano.webp'),
            'prompt'  => 'Yesterday, my sister .......... piano.',
            'correct' => 'played',
            'options' => ['play', 'plays', 'played'],
        ],
        [
            'image'   => materialAsset('slider/B1/Intermediate/chapter-4/img/slide13/like-pizza.webp'),
            'prompt'  => 'I .......... pizza.',
            'correct' => 'like',
            'options' => ['like', 'liked', 'likes'],
        ],
    ],
];

?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])