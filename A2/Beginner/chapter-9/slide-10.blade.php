<?php
$content = [
    'page_title' => 'Practice 4 - Celebrities',
    'title'      => 'Practice 4: Celebrities',
    'subtitle'   => 'Listen. Two friends are watching an awards ceremony on TV, and they are talking about the celebrities. Who are they talking about? Number the pictures 1 to 4',

    'audio'      => materialAsset('slider/A2/Beginner/chapter-9/audios/slide10.mp3'),

    'script' => [
        'One',
        "Woman 1: Yeah, and she travels all around the world - she's always helping people.",
        "Woman 1: Now who's the woman with the dark hair and the beautiful brown eyes?",
        'Woman 2: The one with long, straight hair.',
        'Woman 1: No, the one with the very curly hair.',
        "Woman 2: Oh, she's on TV sometimes, and she makes a lot of movies. I think she's from Mexico.",
        'Woman 1: Oh, yeah.',
        "Woman 2: Let's see, now, what's her name? Oh, it's um...",

        'Two',
        "Woman 2: Look. She's got a great smile, too. The woman with the long brown hair.",
        'Woman 1: Do you mean the one with the long, straight hair?',
        "Woman 2: No, no. It's not really straight. But it's not curly, either.",
        'Woman 1: Oh, her? Yeah, she has beautiful eyes.',
        "Woman 2: Are they blue or green? I can't tell.",
        "Woman 1: Anyway, what's her name? She's in a lot of movies.",

        'Three',
        "Woman 1: Yeah, and he sings all over the world - he's very famous.",
        "Woman 2: Now who's the man with the short dark hair and the strong voice?",
        'Woman 1: The one with the sporty style?',
        'Woman 2: No, the one who always looks young.',
        "Woman 1: Oh, he's on TV sometimes, and he sings a lot of hit songs. I think he's from Egypt.",
        'Woman 2: Oh, yeah.',
        "Woman 1: Let's see, now, what's his name? Oh, it's um...",

        'Four',
        "Woman 1: Yeah, and he's very funny - he makes people laugh all the time.",
        "Woman 2: Now who's the man with the short hair and the expressive face?",
        'Woman 1: The one who acts in comedies?',
        'Woman 2: No, the one who is also in many famous movies and plays.',
        "Woman 1: Oh, he's on TV sometimes, and he's a very famous actor. I think he's from Egypt.",
        'Woman 2: Oh, yeah.',
        "Woman 1: Let's see, now, what's his name? Oh, it's um...",
    ],

    'grid_class' => 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-4',
    'square_images' => true,

    'items' => [
        [
            'image'       => materialAsset('slider/A2/Beginner/chapter-9/img/slide10/Salma-Hayek.webp'),
            'prefix'      => 'Salma Hayek',
            'answer'      => '2',
            'placeholder' => '',
        ],
        [
            'image'       => materialAsset('slider/A2/Beginner/chapter-9/img/slide10/Amr-Diab.webp'),
            'prefix'      => 'Amr Diab',
            'answer'      => '3',
            'placeholder' => '',
        ],
        [
            'image'       => materialAsset('slider/A2/Beginner/chapter-9/img/slide10/Angelina-Jolie.webp'),
            'prefix'      => 'Angelina Jolie',
            'answer'      => '1',
            'placeholder' => '',
        ],
        [
            'image'       => materialAsset('slider/A2/Beginner/chapter-9/img/slide10/Adel-Emam.webp'),
            'prefix'      => 'Adel Emam',
            'answer'      => '4',
            'placeholder' => '',
        ],
    ],
];

shuffle($content['items']);
?>

@include('slider.game.image-missing-words', ['content' => $content])
