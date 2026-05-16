<?php
$content = [
    'page_title' => 'Listening',
    'title'      => 'Listening',
    'subtitle'   => 'Tips for Learning English<br>Hana gives some tips about learning any language, especially English',

    // --- Image Control ---
    'show_footer_image' => 0,
    'footer_image'      => '',

    'people' => [
        'left'  => [
            'name'  => 'Ben',
            'image' => materialAsset('slider/A2/Advanced/chapter-9/img/ben.webp'),
        ],
        'right' => [
            'name'  => 'Hana',
            'image' => materialAsset('slider/A2/Advanced/chapter-9/img/hana.webp'),
        ],
    ],

    'dialogues' => [

        [
            'text'   => 'Hana, you speak English very well. What advice can you give English learners?',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-9/audios/slide10/1.mp3'),
        ],
        [
            'text'   => 'First, I think listening is very important. You can listen to English videos, podcasts, or websites for learners. Listening helps you understand pronunciation, vocabulary, and sentence patterns.',
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-9/audios/slide10/2.mp3'),
        ],
        [
            'text'   => 'Why is listening important?',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-9/audios/slide10/3.mp3'),
        ],
        [
            'text'   => 'Because communication starts with understanding people. When you listen every day, your English improves naturally.',
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-9/audios/slide10/4.mp3'),
        ],
        [
            'text'   => 'Any other tips?',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-9/audios/slide10/5.mp3'),
        ],
        [
            'text'   => 'Yes. Learning vocabulary and common phrases helped me a lot. Sometimes I understood the words, but not the real meaning. Learning phrases and idioms helped me understand native speakers better.',
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-9/audios/slide10/6.mp3'),
        ],
        [
            'text'   => 'Did you practise using them?',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-9/audios/slide10/7.mp3'),
        ],
        [
            'text'   => 'Yes. I watched English TV shows and learned how people use expressions in real situations. At first, I was nervous, but I kept practising.',
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-9/audios/slide10/8.mp3'),
        ],
        [
            'text'   => 'What about writing?',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-9/audios/slide10/9.mp3'),
        ],
        [
            'text'   => 'Reading helps writing a lot. When you read English stories or texts, you learn sentence structure and paragraph organization.',
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-9/audios/slide10/10.mp3'),
        ],
        [
            'text'   => 'Did you keep a journal?',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-9/audios/slide10/11.mp3'),
        ],
        [
            'text'   => 'Yes. Writing in a journal helped me think carefully about grammar and vocabulary. It also helped me become more confident.',
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-9/audios/slide10/12.mp3'),
        ],
        [
            'text'   => 'Thank you for the advice.',
            'side'   => 'left',
            'gender' => 'male',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-9/audios/slide10/13.mp3'),
        ],
        [
            'text'   => 'You’re welcome.',
            'side'   => 'right',
            'gender' => 'female',
            'sound'  => materialAsset('slider/A2/Advanced/chapter-9/audios/slide10/14.mp3'),
        ],
    ],
];
?>

@include("slider.vocab.image-conversation", ['content' => $content])