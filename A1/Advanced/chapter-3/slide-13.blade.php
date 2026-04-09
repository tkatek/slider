<?php
$content = [
    'type' => 'reading',
    'page_title'      => 'Reading Comprehension',
    'title'           => 'Reading Comprehension',
    'subtitle'        => 'Read and choose the correct answer',
    'audio'           => materialAsset("slider/A1/Advanced/chapter-3/audios/slide13.mp3"),
    'reading_title'   => 'A Review of The Seaside Hotel',
    'reading_align'   => 'left',
    'reading_plain'   => true,
    'reading_compact' => true,

    'passage' => [
        "Last month, my family and I stayed at The Seaside Hotel for three nights. The hotel was very close to the beach and near shops and restaurants.",
        "Our room was on the third floor with a nice sea view. It was clean, modern, and comfortable. The staff were friendly and helped us with our bags.",
        "The only problem was the Wi-Fi. It was slow in our room but worked well in the lobby. The breakfast was very good with many food choices. Overall, we had a great stay. I recommend this hotel and hope to visit again.",
    ],

    'questions' => [
        [
            'prompt'  => '1) The hotel was very close to the ______.',
            'correct' => 'beach',
            'options' => [
                'beach',
                'airport',
                'hospital',
            ],
        ],
        [
            'prompt'  => '2) The room was on the ______ floor.',
            'correct' => 'third',
            'options' => [
                'first',
                'third',
                'fifth',
            ],
        ],
        [
            'prompt'  => '3) The staff helped the family with their ______.',
            'correct' => 'bags',
            'options' => [
                'food',
                'bags',
                'tickets',
            ],
        ],
        [
            'prompt'  => '4) The only problem was the slow ______.',
            'correct' => 'Wi-Fi',
            'options' => [
                'TV',
                'elevator',
                'Wi-Fi',
            ],
        ],
        [
            'prompt'  => '5) The writer says the breakfast was ______.',
            'correct' => 'very good',
            'options' => [
                'terrible',
                'average',
                'very good',
            ],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])