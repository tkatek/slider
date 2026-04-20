<?php
$content = [
    'type' => 'reading',
    'page_title'      => 'Practice 2',
    'title'           => 'Practice 2',
    'subtitle'        => 'Where is everyone?',
    'audio'           => materialAsset("slider/A1/Advanced/chapter-10/audios/slide8/Where-is-everyone.mpeg"),

    'reading_title'   => 'Hana greets Daniel and shares what everyone is doing.',
    'reading_align'   => 'left',
    'reading_plain'   => true,
    'reading_compact' => true,

    'passage' => [
        "Daniel: Hey, I'm really sorry I'm late. I came as fast as I could.",
        "Hana: It's OK. Nobody has really come yet.",
        "Daniel: Why? Where are they?",
        "Hana: Well, John is shopping. He is getting some food.",
        "Daniel: OK, what about Emma? Where is she?",
        "Hana: Emma has an exam, so she is studying and she is going to come later.",
        "Daniel: OK, how about Alex? I don't see him around.",
        "Hana: Oh, Alex is over there. He is preparing for the BBQ.",
        "Daniel: Oh, yeah, that's right. And how about Marcus and Emily?",
        "Hana: They are over there. They are playing.",
        "Daniel: Oh, so how many people are left? Who else is coming?",
        "Hana: Uh, I don't know. No one has really contacted me yet.",
        "Daniel: Oh, well, let's hope we can get around ten people maybe.",
        "Hana: Yes, I hope so.",
        "Daniel: Cool!"
    ],

    'questions' => [
        [
            'prompt'  => 'What is John doing?',
            'correct' => 'shopping',
            'options' => [
                'studying',
                'resting',
                'shopping',
            ],
        ],
        [
            'prompt'  => 'What is Emma doing?',
            'correct' => 'studying',
            'options' => [
                'watching TV',
                'shopping',
                'studying',
            ],
        ],
        [
            'prompt'  => 'What are Marcus and Emily doing?',
            'correct' => 'having fun',
            'options' => [
                'working',
                'having fun',
                'studying',
            ],
        ],
        [
            'prompt'  => 'What is Alex doing?',
            'correct' => 'cooking',
            'options' => [
                'cooking',
                'sleeping',
                'leaving',
            ],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])
