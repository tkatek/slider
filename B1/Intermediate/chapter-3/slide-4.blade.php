<?php

$content = [
    'title'      => "Discussion",
    'subtitle'   => '',
    'grid' => [
        'cols' => [
            'base' => 2,
            'sm'   => 5,
            'md'   => 5,
            'lg'   => 5,
        ],
    ],

    'items' => [
        [
            'question' => 'What do you think the world will be like in 20 years?',
            'answer'   => '. . . . . .',
            'image'    => materialAsset('slider/B1/Intermediate/chapter-3/img/slide4/world-20-years.webp'),
        ],
        [
            'question' => 'Do you think technology will keep developing at the same speed? Why or why not?',
            'answer'   => '. . . . . .',
            'image'    => materialAsset('slider/B1/Intermediate/chapter-3/img/slide4/technology-developing.webp'),
        ],
        [
            'question' => 'How do you think climate change will change our daily lives in the future?',
            'answer'   => '. . . . . .',
            'image'    => materialAsset('slider/B1/Intermediate/chapter-3/img/slide4/climate-change.webp'),
        ],
        [
            'question' => 'Do you think robots will replace some human workers?',
            'answer'   => '. . . . . .',
            'image'    => materialAsset('slider/B1/Intermediate/chapter-3/img/slide4/robots-workers.webp'),
        ],
        [
            'question' => 'Will normal people be able to travel to space in the future?',
            'answer'   => '. . . . . .',
            'image'    => materialAsset('slider/B1/Intermediate/chapter-3/img/slide4/space-travel.webp'),
        ],
        [
            'question' => 'What do you think the future of transportation will look like?',
            'answer'   => '. . . . . .',
            'image'    => materialAsset('slider/B1/Intermediate/chapter-3/img/slide4/future-transportation.webp'),
        ],
        [
            'question' => 'Will there be a cure for cancer in the future?',
            'answer'   => '. . . . . .',
            'image'    => materialAsset('slider/B1/Intermediate/chapter-3/img/slide4/cancer-cure.webp'),
        ],
        [
            'question' => 'How do you think medicine and healthcare will change in the future?',
            'answer'   => '. . . . . .',
            'image'    => materialAsset('slider/B1/Intermediate/chapter-3/img/slide4/future-healthcare.webp'),
        ],
        [
            'question' => 'Do you think we will have world peace one day?',
            'answer'   => '. . . . . .',
            'image'    => materialAsset('slider/B1/Intermediate/chapter-3/img/slide4/world-peace.webp'),
        ],
        [
            'question' => 'In the future, will we use fossil fuels, or will we use renewable energy?',
            'answer'   => '. . . . . .',
            'image'    => materialAsset('slider/B1/Intermediate/chapter-3/img/slide4/renewable-energy.webp'),
        ],
    ],
];

?>

@include('slider.game.question-answer', ['content' => $content])