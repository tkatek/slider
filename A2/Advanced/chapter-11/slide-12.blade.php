<?php
$content = [
    'title' => 'New Language',
    'subtitle' => 'Apologies in a restaurant: Complaints & resolutions',
    'groups' => [
        [
            'key' => 'apologizing-expressions',
            'title' => '1. Apologizing',
            'grid_class' => 'grid-cols-1 sm:grid-cols-3',
            'items' => [
                [
                    'text' => 'I’m very sorry for the inconvenience.',
                    'emoji' => '🙏',

                    'sound' => materialAsset('slider/A2/Advanced/chapter-11/audios/slide12/im-very-sorry-for-the-inconvenience.mp3'),
                ],
                [
                    'text' => 'I apologize for the mistake.',
                    'emoji' => '🙏',

                    'sound' => materialAsset('slider/A2/Advanced/chapter-11/audios/slide12/i-apologize-for-the-mistake.mp3'),
                ],
                [
                    'text' => 'That’s our fault.',
                    'emoji' => '🙏',

                    'sound' => materialAsset('slider/A2/Advanced/chapter-11/audios/slide12/thats-our-fault.mp3'),
                ],
                [
                    'text' => 'I’m sorry we didn’t meet your expectations.',
                    'emoji' => '🙏',

                    'sound' => materialAsset('slider/A2/Advanced/chapter-11/audios/slide12/im-sorry-we-didnt-meet-your-expectations.mp3'),
                ],
                [
                    'text' => 'Please accept our apologies.',
                    'emoji' => '🙏',

                    'sound' => materialAsset('slider/A2/Advanced/chapter-11/audios/slide12/please-accept-our-apologies.mp3'),
                ],
            ],
        ],
        [
            'key' => 'accepting-an-apology-expressions',
            'title' => '2. Accepting an Apology',
            'grid_class' => 'grid-cols-1 sm:grid-cols-3 ',
            'items' => [
                [
                    'text' => 'That’s okay.',
                    'emoji' => '✅',

                    'sound' => materialAsset('slider/A2/Advanced/chapter-11/audios/slide12/thats-okay.mp3'),
                ],
                [
                    'text' => 'Thank you.',
                    'emoji' => '✅',

                    'sound' => materialAsset('slider/A2/Advanced/chapter-11/audios/slide12/thank-you.mp3'),
                ],
                [
                    'text' => 'I appreciate your apology.',
                    'emoji' => '✅',

                    'sound' => materialAsset('slider/A2/Advanced/chapter-11/audios/slide12/i-appreciate-your-apology.mp3'),
                ],
                [
                    'text' => 'It’s alright.',
                    'emoji' => '✅',

                    'sound' => materialAsset('slider/A2/Advanced/chapter-11/audios/slide12/its-alright.mp3'),
                ],
                [
                    'text' => 'No worries.',
                    'emoji' => '✅',

                    'sound' => materialAsset('slider/A2/Advanced/chapter-11/audios/slide12/no-worries.mp3'),
                ],
            ],
        ],
        [
            'key' => 'refusing-an-apology-expressions',
            'title' => '3. Refusing an Apology',
            'grid_class' => 'grid-cols-1 sm:grid-cols-3 ',
            'items' => [
                [
                    'text' => 'I’m still not happy with this.',
                    'emoji' => '❌',

                    'sound' => materialAsset('slider/A2/Advanced/chapter-11/audios/slide12/im-still-not-happy-with-this.mp3'),
                ],
                [
                    'text' => 'That’s not acceptable.',
                    'emoji' => '❌',

                    'sound' => materialAsset('slider/A2/Advanced/chapter-11/audios/slide12/thats-not-acceptable.mp3'),
                ],
                [
                    'text' => 'I don’t think that’s enough.',
                    'emoji' => '❌',

                    'sound' => materialAsset('slider/A2/Advanced/chapter-11/audios/slide12/i-dont-think-thats-enough.mp3'),
                ],
                [
                    'text' => 'I would like a better solution.',
                    'emoji' => '❌',

                    'sound' => materialAsset('slider/A2/Advanced/chapter-11/audios/slide12/i-would-like-a-better-solution.mp3'),
                ],
                [
                    'text' => 'I’m disappointed.',
                    'emoji' => '❌',

                    'sound' => materialAsset('slider/A2/Advanced/chapter-11/audios/slide12/im-disappointed.mp3'),
                ],
            ],
        ],
    ],
];

?>

@include('slider.vocab.image-card', ['content' => $content])
