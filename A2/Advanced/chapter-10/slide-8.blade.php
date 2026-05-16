<?php
$content = [
    'page_title' => 'Listening',
    'title'      => 'Listening: Apartment Problems',
    'subtitle'   => 'What would you do if you were Mr. Burton at the end of this conversation? <br>Listen to the recording and read along with the conversation.',

    // --- Image Control ---
    'show_footer_image' => 0,
    'footer_image'      => '',

    'people' => [
        'left'  => [
            'name'  => 'Apartment Manager',
            'image' => materialAsset('slider/A2/Advanced/chapter-10/img/apartment-manager.webp'),
        ],
        'right' => [
            'name'  => 'Tenant',
            'image' => materialAsset('slider/A2/Advanced/chapter-10/img/tenant.webp'),
        ],
    ],

    'dialogues' => [

        [
            'text'   => 'Hello Mr. Brown. How is your apartment?',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-10/audios/slide8/1.mp3'),
        ],
        [
            'text'   => 'Not very good, actually. I want to complain about the noise from apartment 4B.',
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-10/audios/slide8/2.mp3'),
        ],
        [
            'text'   => 'What kind of noise?',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-10/audios/slide8/3.mp3'),
        ],
        [
            'text'   => 'The music is very loud every night, especially after 10 p.m. Could you ask him to turn it down?',
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-10/audios/slide8/4.mp3'),
        ],
        [
            'text'   => 'Okay, I’ll talk to him. Anything else?',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-10/audios/slide8/5.mp3'),
        ],
        [
            'text'   => 'Yes. There is also a very bad smell coming from the building next door.',
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-10/audios/slide8/6.mp3'),
        ],
        [
            'text'   => 'I understand. I will check the problem.',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-10/audios/slide8/7.mp3'),
        ],
        [
            'text'   => 'And there’s another problem. I hear loud noises every week.',
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-10/audios/slide8/8.mp3'),
        ],
        [
            'text'   => 'Oh, that is from military training nearby.',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-10/audios/slide8/9.mp3'),
        ],
        [
            'text'   => 'Really? You didn’t tell me about these problems before I rented the apartment.',
            'side'   => 'right',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-10/audios/slide8/10.mp3'),
        ],
        [
            'text'   => 'I’m sorry, Mr. Brown. I’ll do my best to help.',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-10/audios/slide8/11.mp3'),
        ],
    ],
];
?>

@include("slider.vocab.image-conversation", ['content' => $content])