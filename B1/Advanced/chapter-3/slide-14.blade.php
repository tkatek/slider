<?php

$content = [
    'title'    => 'Speaking',
    'subtitle' => 'Rephrase the following sentences',
    'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-5',
    'items' => [
        [
            'question' => "There are a lot of people there. I'm sure it is the main entrance.",
            'answer'   => 'It must be the main entrance.',
            'image'    => materialAsset('slider/B1/Advanced/chapter-3/img/slide14/1.webp'),
        ],
        [
            'question' => "We've been driving for hours. I'm sure it is not far now.",
            'answer'   => "It can't be far now.",
            'image'    => materialAsset('slider/B1/Advanced/chapter-3/img/slide14/2.webp'),
        ],
        [
            'question' => "She hasn't arrived yet. Maybe she is stuck in the traffic.",
            'answer'   => 'She may/might be stuck in the traffic.',
            'image'    => materialAsset('slider/B1/Advanced/chapter-3/img/slide14/3.webp'),
        ],
        [
            'question' => 'Look at all this snow! I think it is possible the delivery will be delayed now.',
            'answer'   => 'The delivery may be delayed now.',
            'image'    => materialAsset('slider/B1/Advanced/chapter-3/img/slide14/4.webp'),
        ],
        [
            'question' => "I'm certain that she cheated in the exam.",
            'answer'   => 'She must have cheated in the exam.',
            'image'    => materialAsset('slider/B1/Advanced/chapter-3/img/slide14/5.webp'),
        ],
        [
            'question' => "Lucy can't find her laptop. It's possible that she left it on the train.",
            'answer'   => "Lucy can't find her laptop. She might have left it on the train.",
            'image'    => materialAsset('slider/B1/Advanced/chapter-3/img/slide14/6.webp'),
        ],
        [
            'question' => "I recognise your face. I'm certain we've met before.",
            'answer'   => 'I recognise your face. We must have met before.',
            'image'    => materialAsset('slider/B1/Advanced/chapter-3/img/slide14/7.webp'),
        ],
        [
            'question' => "It is a very nice house. I'm sure they are very happy here.",
            'answer'   => 'They must be very happy here.',
            'image'    => materialAsset('slider/B1/Advanced/chapter-3/img/slide14/8.webp'),
        ],
        [
            'question' => "I hurt her badly. I'm sure she hasn't forgiven me yet.",
            'answer'   => "She can't have forgiven me yet.",
            'image'    => materialAsset('slider/B1/Advanced/chapter-3/img/slide14/9.webp'),
        ],
        [
            'question' => 'Have you seen my watch? — No, there is a chance it is under the sofa.',
            'answer'   => 'It may/might be under the sofa.',
            'image'    => materialAsset('slider/B1/Advanced/chapter-3/img/slide14/10.webp'),
        ],
    ],
];

?>

@include('slider.game.question-answer', ['content' => $content])