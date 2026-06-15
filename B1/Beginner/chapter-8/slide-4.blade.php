<?php

$content = [
    'title'      => 'Warm up: Practice 1',
    'subtitle'   => 'Complete the sentences with the correct form of the verb.',
    'grid_class' => 'grid-cols-2 sm:grid-cols-3',

    'items' => [
        [
            'question' => 'I wish I ........ (have) money to travel to England.',
            'answer'   => 'had',
            'image'    => materialAsset('slider/B1/Beginner/chapter-8/img/slide4/travel-to-england.webp'),
        ],
        [
            'question' => 'I wish I ........ (eat) all that chocolate. I feel sick.',
            'answer'   => 'hadn’t eaten',
            'image'    => materialAsset('slider/B1/Beginner/chapter-8/img/slide4/eat-chocolate.webp'),
        ],
        [
            'question' => 'If only she ........ (see) the doctor earlier. He could have saved her.',
            'answer'   => 'had seen',
            'image'    => materialAsset('slider/B1/Beginner/chapter-8/img/slide4/see-doctor-earlier.webp'),
        ],
        [
            'question' => 'I like travelling around the world. If only I ........ (have) time to realize my dream.',
            'answer'   => 'had',
            'image'    => materialAsset('slider/B1/Beginner/chapter-8/img/slide4/travelling-around-the-world.webp'),
        ],
        [
            'question' => 'I wish you ........ (stop) talking so loud! I have a headache.',
            'answer'   => 'would stop',
            'image'    => materialAsset('slider/B1/Beginner/chapter-8/img/slide4/stop-talking-loud.webp'),
        ],
    ],
];

?>

@include('slider.game.question-answer', ['content' => $content])