<?php
$content = [
    'page_title' => 'Practice',
    'title'      => 'Practice 6',
    'subtitle'   => 'Use the vocabulary you learnt from the listening activity and fill in the missing words under each picture.',


    'items' => [
        [
            'number' => 'a',
            'image'  => materialAsset('slider/B1/Intermediate/chapter-7/img/slide19/close.webp'),
            'parts'  => [
                ['text' => 'My sister and I are very c'],
                ['answer' => 'lose'],
                ['text' => '. We see each other every week.'],
            ],
        ],
        [
            'number' => 'b',
            'image'  => materialAsset('slider/B1/Intermediate/chapter-7/img/slide19/get-on.webp'),
            'parts'  => [
                ['text' => "I don't g"],
                ['answer' => 'et'],
                ['text' => ' o'],
                ['answer' => 'n'],
                ['text' => " with my brother. He's very annoying."],
            ],
        ],
        [
            'number' => 'c',
            'image'  => materialAsset('slider/B1/Intermediate/chapter-7/img/slide19/similar.webp'),
            'parts'  => [
                ['text' => 'My two sisters are very s'],
                ['answer' => 'imilar'],
                ['text' => '. They are both very funny.'],
            ],
        ],
    ],
];
?>

@include('slider.game.image-missing-words', ['content' => $content])