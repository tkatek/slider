<?php
$content = [
    'page_title' => 'Listening',
    'title'      => 'Practice 3',
    'subtitle'   => 'People are talking about meals in different countries.<br>Listen and number the pictures.',
    'audio'      => materialAsset('slider/A2/Intermediate/chapter-2/audios/slide14.mp3'),

    'script' => [
        'One',
        'Speaker B: Hey, Jen, how was your trip to Taiwan?',
        "Jen: Amazing. I can't wait to go back there. My favorite thing was eating dim sum.",
        "Speaker B: Dim sum? What's that?",
        "Jen: Well, it's all kinds of different little foods, like fried pancakes, egg rolls, or fried rice and vegetables.",
        'Jen: You go out with your friends to the restaurant, and the waiters bring all the different dishes around in carts while you sit around and drink tea.',
        "Jen: If you see something you like, you're supposed to wave to the waiter. It's really fun.",
        'Speaker B: Yeah, it sounds great.',
        'Two',
        "Speaker D: You used to work in Saudi Arabia, Tony. What's a traditional meal like there?",
        'Tony: Oh, you would love it. Everyone sits on cushions on a nice carpet and drinks cups of sweet coffee.',
        'Tony: Then you eat kebab with your hands.',
        "Speaker D: Kebab. That's like barbecued meat, right?",
        "Tony: That's right. You cut pieces of meat and vegetable and grill them.",
        "Tony: It's sometimes served over rice.",
        'Speaker D: Ah. It sounds great.',
        "Tony: Just remember one thing: in Saudi Arabia, it's very important to make the guest happy.",
        'Tony: So if the host offers you something, you should try to eat it.',
        'Tony: If you refuse something, you might hurt his feelings.',
        'Speaker D: Thanks for the advice.',
    ],

    'grid_class' => 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-4',
    'square_images' => true,

    'items' => [
        [
            'image'       => materialAsset('slider/A2/Intermediate/chapter-2/img/taiwan.webp'),
            'prefix'      => 'A. ',
            'answer'      => '1',
            'placeholder' => '',
        ],
        [
            'image'       => materialAsset('slider/A2/Intermediate/chapter-2/img/saudi.webp'),
            'prefix'      => 'B. ',
            'answer'      => '2',
            'placeholder' => '',
        ],
    ],
];
?>

@include('slider.game.image-missing-words', ['content' => $content])
