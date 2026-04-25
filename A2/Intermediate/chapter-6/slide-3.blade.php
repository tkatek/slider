<?php

$content = array_replace_recursive([
    'page_title' => 'Practice 1',
    'title'      => 'Warm-up: Practice 1',
    'subtitle'   => 'What were they doing?<br>Look at the pictures and correct the verbs:',

    'grid' => [
        'cols' => [
            'base' => 2,
            'sm'   => 2,
            'md'   => 3,
            'lg'   => 3,
        ],
    ],

    'items' => [
        [
            'question' => 'Paula ________ her book yesterday afternoon. (read)',
            'answer'   => 'was reading',
            'image'    => materialAsset('slider/A2/Intermediate/chapter-6/img/slide3/1.webp'),
        ],
        [
            'question' => 'My sister ________ dinner all night. (cook)',
            'answer'   => 'was cooking',
            'image'    => materialAsset('slider/A2/Intermediate/chapter-6/img/slide3/2.webp'),
        ],
        [
            'question' => 'Mike ________ his English homework yesterday morning. (do)',
            'answer'   => 'was doing',
            'image'    => materialAsset('slider/A2/Intermediate/chapter-6/img/slide3/3.webp'),
        ],
        [
            'question' => 'My parents ________ the garden all day last week. (clean up)',
            'answer'   => 'were cleaning up',
            'image'    => materialAsset('slider/A2/Intermediate/chapter-6/img/slide3/4.webp'),
        ],
        [
            'question' => 'They ________ in the kitchen last Monday. (not eat)',
            'answer'   => "weren’t eating",
            'image'    => materialAsset('slider/A2/Intermediate/chapter-6/img/slide3/5.webp'),
        ],
    ],

], $content ?? []);
?>

@include("slider.game.question-answer", ['content' => $content])
