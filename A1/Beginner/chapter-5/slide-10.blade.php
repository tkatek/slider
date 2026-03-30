<?php
$content = [
    'page_title' => 'Practice',
    'title' => 'Practice',
    'subtitle' => 'Unscramble the following words',
    'theme_color' => '#673fe7',
    'sentences'=>[
        "{{1}}",
        "{{2}}",
        "{{3}}",
        "{{4}}",
        "{{5}}",
        "{{6}}",
        "{{7}}",
        "{{8}}",
        "{{9}}",
        "{{10}}",
    ],
    'scramble'=>[
        'Rug',
        'Table',
        'Sofa',
        'Lamp',
        'Chair',
        'Fireplace',
        'Curtains',
        'Cushion',
        'Plant',
        'Bathtub',
    ],
];
?>
@include('slider.game.unscramble', ['content' => $content])