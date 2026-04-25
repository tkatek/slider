<?php
$content = [
    'page_title' => 'Speaking Cards',
    'title'      => 'Speaking Cards',
    'card_label' => 'Possessive Adjectives',
    'example'    => 'My sister is thin.',
    'cards'      => [
        ['answer' => 'tall',  'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide12/old.webp'), 'sentence' => 'grandpa / tall'],
        ['answer' => 'tall',  'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide10/aunt.webp'), 'sentence' => 'mom / tall'],
        ['answer' => 'tall',  'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide10/uncle.webp'), 'sentence' => 'dad / tall'],
        ['answer' => 'short', 'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide12/old.webp'), 'sentence' => 'grandma / short'],
        ['answer' => 'short', 'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide10/tom.webp'), 'sentence' => 'brother / short'],
        ['answer' => 'short', 'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide12/kind.webp'), 'sentence' => 'sister / short'],
    ],
];
?>

@include("slider.game.speaking-cards", ["content" => $content])
