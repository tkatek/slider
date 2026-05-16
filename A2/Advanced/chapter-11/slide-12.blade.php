<?php

$content = [
    'page_title' => 'New Language',
    'title' => 'New Language',
    'subtitle' => 'Apologies in a restaurant: Complaints & resolutions',
    'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',

    'groups' => [
        [
            'key' => 'apologizing-expressions',
            'title' => '1. Apologizing',
            'grid_class' => 'grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5',
            'items' => [
                [
                    'text' => 'I’m very sorry for the inconvenience.',
                    'emoji' => '🙏',
                    'description' => 'Apologizing',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-12/audios/slide5/im-very-sorry-for-the-inconvenience.mp3'),
                ],
                [
                    'text' => 'I apologize for the mistake.',
                    'emoji' => '🙏',
                    'description' => 'Apologizing',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-12/audios/slide5/i-apologize-for-the-mistake.mp3'),
                ],
                [
                    'text' => 'That’s our fault.',
                    'emoji' => '🙏',
                    'description' => 'Taking responsibility',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-12/audios/slide5/thats-our-fault.mp3'),
                ],
                [
                    'text' => 'I’m sorry we didn’t meet your expectations.',
                    'emoji' => '🙏',
                    'description' => 'Apologizing',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-12/audios/slide5/im-sorry-we-didnt-meet-your-expectations.mp3'),
                ],
                [
                    'text' => 'Please accept our apologies.',
                    'emoji' => '🙏',
                    'description' => 'Formal apology',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-12/audios/slide5/please-accept-our-apologies.mp3'),
                ],
            ],
        ],
        [
            'key' => 'accepting-an-apology-expressions',
            'title' => '2. Accepting an Apology',
            'grid_class' => 'grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5',
            'items' => [
                [
                    'text' => 'That’s okay.',
                    'emoji' => '✅',
                    'description' => 'Accepting an apology',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-12/audios/slide5/thats-okay.mp3'),
                ],
                [
                    'text' => 'Thank you.',
                    'emoji' => '✅',
                    'description' => 'Accepting politely',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-12/audios/slide5/thank-you.mp3'),
                ],
                [
                    'text' => 'I appreciate your apology.',
                    'emoji' => '✅',
                    'description' => 'Accepting an apology',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-12/audios/slide5/i-appreciate-your-apology.mp3'),
                ],
                [
                    'text' => 'It’s alright.',
                    'emoji' => '✅',
                    'description' => 'Accepting an apology',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-12/audios/slide5/its-alright.mp3'),
                ],
                [
                    'text' => 'No worries.',
                    'emoji' => '✅',
                    'description' => 'Casual acceptance',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-12/audios/slide5/no-worries.mp3'),
                ],
            ],
        ],
        [
            'key' => 'refusing-an-apology-expressions',
            'title' => '3. Refusing an Apology',
            'grid_class' => 'grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5',
            'items' => [
                [
                    'text' => 'I’m still not happy with this.',
                    'emoji' => '❌',
                    'description' => 'Refusing an apology',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-12/audios/slide5/im-still-not-happy-with-this.mp3'),
                ],
                [
                    'text' => 'That’s not acceptable.',
                    'emoji' => '❌',
                    'description' => 'Expressing dissatisfaction',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-12/audios/slide5/thats-not-acceptable.mp3'),
                ],
                [
                    'text' => 'I don’t think that’s enough.',
                    'emoji' => '❌',
                    'description' => 'Refusing an apology',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-12/audios/slide5/i-dont-think-thats-enough.mp3'),
                ],
                [
                    'text' => 'I would like a better solution.',
                    'emoji' => '❌',
                    'description' => 'Asking for a solution',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-12/audios/slide5/i-would-like-a-better-solution.mp3'),
                ],
                [
                    'text' => 'I’m disappointed.',
                    'emoji' => '❌',
                    'description' => 'Expressing disappointment',
                    'sound' => materialAsset('slider/C2/Beginner/chapter-12/audios/slide5/im-disappointed.mp3'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.sentence-audio', ['content' => $content])
