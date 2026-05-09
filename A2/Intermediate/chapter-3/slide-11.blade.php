<?php
$content = [
    'page_title' => 'Practice 3',
    'title'      => 'Practice 3',
    'subtitle'   => 'Find the match: Superstitions Around The World',

    'mode'                => 'image',
    'question_prompt'     => '',
    'show_all_items'      => true,
    'choices_per_question'=> 6,
    'grid_class'          => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-3',
    'success_title'       => 'Great job!',

    'items' => [
        [
            'key'     => 'usa-black-cat',
            'text'    => 'it is bad luck.',
            'image'   => materialAsset('slider/A2/Intermediate/chapter-1/img/slide2/usa.webp'),
            'caption' => 'In the U.S., if a black cat walks in front of you, ...',
        ],
        [
            'key'     => 'scotland-black-cat',
            'text'    => 'it brings money.',
            'image'   => materialAsset('slider/A2/Intermediate/chapter-1/img/slide2/british.webp'),
            'caption' => 'In Scotland, people think a black cat ...',
        ],
        [
            'key'     => 'thailand-snake',
            'text'    => 'you will meet your future husband or wife.',
            'image'   => materialAsset('slider/A2/Intermediate/chapter-3/img/slide11/thailand.webp'),
            'caption' => 'In Thailand, if you dream about a snake, it means ...',
        ],
        [
            'key'     => 'japan-white-snake',
            'text'    => 'it brings good luck.',
            'image'   => materialAsset('slider/A2/Intermediate/chapter-3/img/slide11/japan.webp'),
            'caption' => 'In Japan, seeing a white snake ...',
        ],
        [
            'key'     => 'spain-full-moon',
            'text'    => 'it is dangerous. You may see ghosts.',
            'image'   => materialAsset('slider/A2/Intermediate/chapter-1/img/slide2/spain.webp'),
            'caption' => 'In Spain, people think that going out on a full moon night ...',
        ],
        [
            'key'     => 'turkey-full-moon',
            'text'    => 'you will have a good future.',
            'image'   => materialAsset('slider/A2/Intermediate/chapter-3/img/slide11/turkey.webp'),
            'caption' => 'In Turkey, people believe that if you are born on a full moon, ...',
        ],
    ],
];
?>

@include('slider.game.image-guess-who', ['content' => $content])
