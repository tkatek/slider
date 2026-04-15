<?php
$content = [
    'page_title'  => 'Warm-up:',
    'title'       => 'Warm-up: Practice 1',
    'subtitle'    => 'Listen to this audio first, then click on letters between brackets to build correct words.',
    'type'        => 'letters',
    'audio'       => materialAsset('slider/A1/Intermediate/chapter-6/audios/slide3.mp3'),
    'script'      => [
        'Customer: Hello, do you have anything for stomach ache?',
        'Pharmacist: Do you also have nausea or diarrhoea?',
        "Customer: Yes, I feel sick and I've had diarrhoea since yesterday.",
        'Pharmacist: I recommend these tablets. Take one after each loose stool, but not more than six a day.',
        'Customer: Okay. Can children take them?',
        'Pharmacist: No, this medicine is for adults only.',
    ],

    'sentences' => [
        "Customer: Hello, do you have anything for {{1}} {{2}}",
        "Pharmacist: Do you also have nausea or diarrhoea?",
        "Customer: Yes, I feel {{3}} and I've had diarrhoea since yesterday.",
        "Pharmacist: I {{4}} these tablets. Take one after each loose stool, but not more than six a day.",
        "Customer: Okay. Can children take them?",
        "Pharmacist: No, this {{5}} is for adults only.",
    ],

    'scramble' => [
        'Stomach',
        'Ache',
        'Sick',
        'Recommend',
        'Medicine',
    ],
];
?>
@include('slider.game.unscramble', ['content' => $content])
