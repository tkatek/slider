<?php
$content = [
    'type'       => 'image',
    'page_title' => 'Listening',
    'title'      => 'Gestures in different cultures',
    'subtitle'   => 'Listen. People are comparing gestures from around the world.<br>Which two countries are they talking about?',

    'enable_image_zoom'      => false,
    'game_card_width'        => 'max-w-5xl',
    'image_panel_col_class'  => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_scale'            => 0.72,


    'audio' => materialAsset('slider/A2/Intermediate/chapter-12/audios/slide9.mp3'),

    'script' => [
        "1",
        "Woman: You know, nodding your head - moving your head up and down - means “yes” in most places, but in one place I know of, it means “no.”",
        "Man: Well, in Brazil, where I’m from, it means “yes.” Where does nodding your head mean “no”?",
        "Woman: In Greece.",
        "Man: Hmm",

        "2",
        "Man: I didn’t know raising your eyebrows means “yes” in Tonga. It means something very different in Peru.",
        "Woman: Yeah? What does it mean in Peru?",
        "Man: “Money.” Raising your eyebrows is a gesture for “money” in Peru.",

        "3",
        "Woman: Um, Ramon, you said that tapping your head means “I’m thinking” in Argentina.",
        "Ramon: Yes, that’s right.",
        "Woman: You’d better be careful about using that gesture in Canada. It means “someone is crazy.”",
        "Ramon: It means “someone is crazy” in Canada? I didn’t know that. I’ll be careful.",
    ],

    'questions' => [
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-12/img/nod.webp'),
            'prompt'  => 'Nodding your head',
            'correct' => ['Brazil', 'Greece'],
            'options' => [
                'Brazil',
                'France',
                'Greece',
            ],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-12/img/eyebrows.webp'),
            'prompt'  => 'Raising your eyebrows',
            'correct' => ['Peru', 'Tonga'],
            'options' => [
                'Peru',
                'Spain',
                'Tonga',
            ],
        ],
        [
            'image'   => materialAsset('slider/A2/Intermediate/chapter-12/img/tapping.webp'),
            'prompt'  => 'Tapping your head',
            'correct' => ['Argentina', 'Canada'],
            'options' => [
                'Argentina',
                'Canada',
                'Turkey',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])