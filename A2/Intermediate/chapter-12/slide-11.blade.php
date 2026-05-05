<?php
$content = [
    'page_title' => 'Now it’s your turn!',
    'title'      => 'Now it’s your turn!',
    'subtitle'   => 'Practice reading out the dialogue',

    // --- Image Control ---
    'show_footer_image' => 0,
    'footer_image'      => '',

    'people' => [
        'left'  => [
            'name'  => 'Woman',
            'image' => materialAsset('slider/A2/Intermediate/chapter-12/woman.webp'),
        ],
        'right' => [
            'name'  => 'Man',
            'image' => materialAsset('slider/A2/Intermediate/chapter-12/man.webp'),
        ],
    ],

    'dialogues' => [
        [
            'text'   => "You know, nodding your head – moving your head up and down – means “yes” in most places, but in one place I know of, it means “no.”",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A2/Intermediate/chapter-12/audios/slide11/1.mp3'),
        ],
        [
            'text'   => "Well, in Brazil, where I’m from, it means “yes.” Where does nodding your head mean “no”?",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Intermediate/chapter-12/audios/slide11/2.mp3'),
        ],
        [
            'text'   => "In Greece.",
            'side'   => 'left',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A2/Intermediate/chapter-12/audios/slide11/3.mp3'),
        ],
        [
            'text'   => "Hmm.",
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Intermediate/chapter-12/audios/slide11/4.mp3'),
        ],
    ],
];
?>

@include("slider.vocab.image-conversation", ['content' => $content])