<?php
$content = [
    'video'      => materialAsset('slider/A2/Intermediate/chapter-13/videos/'),
    'thumbnail'  => materialAsset('slider/A2/Intermediate/chapter-1/img/slide13.webp'),
    'isQuiz'     => 1,
    'questions'  => [],
    'subtitles'  => [
        ['start' => 0,  'end' => 2,  'text' => 'Traditional clothes around the world.'],
        ['start' => 7,  'end' => 11, 'text' => 'The kimono is a traditional Japanese garment.'],
        ['start' => 11, 'end' => 15, 'text' => 'The design is simple: a T-shaped robe hemmed at the ankle, with wide sleeves and a collar.'],
        ['start' => 15, 'end' => 19, 'text' => 'They are traditionally made of silk, with a hand-woven floral print.'],
        ['start' => 19, 'end' => 25, 'text' => 'The kimono is synonymous with humility and politeness.'],
        ['start' => 25, 'end' => 28, 'text' => 'The nón lá conical hat.'],
        ['start' => 28, 'end' => 33, 'text' => 'A conical palm-leaf hat is a symbol of Vietnamese culture.'],
        ['start' => 33, 'end' => 37, 'text' => 'For three thousand years, this headpiece has been worn by people from all walks of life.'],
        ['start' => 37, 'end' => 44, 'text' => 'It is not uncommon to see this hat used for shade, as a fan, or even as a basket to carry shopping.'],
        ['start' => 44, 'end' => 47, 'text' => 'The Scottish kilt.'],
        ['start' => 47, 'end' => 52, 'text' => 'A kilt is a woolen knee-length garment which closely resembles a skirt.'],
        ['start' => 52, 'end' => 56, 'text' => 'It is worn exclusively by men since the 16th century.'],
        ['start' => 56, 'end' => 62, 'text' => 'Kilts have been worn at formal or sports events such as the famous Highland Games.'],
        ['start' => 62, 'end' => 66, 'text' => 'Each Scottish clan or family has its own distinct tartan pattern.'],
        ['start' => 66, 'end' => 72, 'text' => 'Sarees are best known as a part of Indian culture and are often passed on from one generation to the next as heirlooms.'],
        ['start' => 72, 'end' => 79, 'text' => 'They are made from brightly coloured silk or cotton. A sari consists of one single piece of fabric with intricate hand-woven designs.'],
        ['start' => 79, 'end' => 86, 'text' => 'It is fastened through a series of folds and can be draped in over 100 different ways, usually with one end worn over the head.'],
        ['start' => 86, 'end' => 90, 'text' => 'A burak is a piece of traditional headgear from Kazakhstan.'],
        ['start' => 90, 'end' => 95, 'text' => 'It reflects the traditionally nomadic lifestyle of the Kazakh people.'],
        ['start' => 95, 'end' => 101, 'text' => 'It is a round cap typically made from felt and often decorated with fur around the edges.'],
        ['start' => 101, 'end' => 108, 'text' => 'The male burak is quite plain, whereas the female version is more ornate. It is embroidered and decorated with beautiful feathers.'],
    ],
];
?>
@include("slider.video.interactive", ['content' => $content])