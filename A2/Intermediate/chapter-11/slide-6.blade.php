@php
    $content = [
        'page_title' => 'New Vocabulary',
        'title'      => 'New Vocabulary',
        'subtitle'   => 'Facial Expressions',
        'grid_class' => 'grid-cols-2 sm:grid-cols-3',

        'items' => [
            [
                'text'     => 'wink (face)',
                'subtitle' => 'closing one eye quickly, often for fun or a secret',
                'example'  => 'Example: He has a wink face.',
                'emoji'    => '😉',
                'sound'    => materialAsset('slider/A2/Intermediate/chapter-11/audios/slide6/wink.mp3'),
            ],
            [
                'text'     => 'worried (face)',
                'subtitle' => 'showing you feel nervous or afraid',
                'example'  => 'Example: She has a worried face.',
                'emoji'    => '😟',
                'sound'    => materialAsset('slider/A2/Intermediate/chapter-11/audios/slide6/worried.mp3'),
            ],
            [
                'text'     => 'confused (face)',
                'subtitle' => 'showing you don’t understand something',
                'example'  => 'Example: He has a confused face.',
                'emoji'    => '😕',
                'sound'    => materialAsset('slider/A2/Intermediate/chapter-11/audios/slide6/confused.mp3'),
            ],
            [
                'text'     => 'shocked (face)',
                'subtitle' => 'very surprised, often in a strong way',
                'example'  => 'Example: She has a shocked face.',
                'emoji'    => '😲',
                'sound'    => materialAsset('slider/A2/Intermediate/chapter-11/audios/slide6/shocked.mp3'),
            ],
            [
                'text'     => 'angry (face)',
                'subtitle' => 'showing you are mad',
                'example'  => 'Example: He has an angry face.',
                'emoji'    => '😠',
                'sound'    => materialAsset('slider/A2/Intermediate/chapter-11/audios/slide6/angry.mp3'),
            ],
            [
                'text'     => 'thinking (face)',
                'subtitle' => 'showing you are thinking carefully',
                'example'  => 'Example: She has a thinking face.',
                'emoji'    => '🤔',
                'sound'    => materialAsset('slider/A2/Intermediate/chapter-11/audios/slide6/thinking.mp3'),
            ],
            [
                'text'     => 'happy (face)',
                'subtitle' => 'showing you feel good and pleased',
                'example'  => 'Example: He has a happy face.',
                'emoji'    => '😊',
                'sound'    => materialAsset('slider/A2/Intermediate/chapter-11/audios/slide6/happy.mp3'),
            ],
            [
                'text'     => 'naughty (face)',
                'subtitle' => 'showing playful or a little bad behavior, not serious',
                'example'  => 'Example: She has a naughty face.',
                'emoji'    => '😏',
                'sound'    => materialAsset('slider/A2/Intermediate/chapter-11/audios/slide6/naughty.mp3'),
            ],
            [
                'text'     => 'cry (face)',
                'subtitle' => 'showing sadness with tears',
                'example'  => 'Example: He has a cry face.',
                'emoji'    => '😢',
                'sound'    => materialAsset('slider/A2/Intermediate/chapter-11/audios/slide6/cry.mp3'),
            ],
            [
                'text'     => 'laughing out loud',
                'subtitle' => 'laughing strongly with sound',
                'example'  => 'Example: She is laughing out loud.',
                'emoji'    => '😂',
                'sound'    => materialAsset('slider/A2/Intermediate/chapter-11/audios/slide6/laughing.mp3'),
            ],
            [
                'text'     => 'blush (face)',
                'subtitle' => 'your face turns red from shyness or embarrassment',
                'example'  => 'Example: He has a blush face.',
                'emoji'    => '😊',
                'sound'    => materialAsset('slider/A2/Intermediate/chapter-11/audios/slide6/blush.mp3'),
            ],
            [
                'text'     => 'smile (face)',
                'subtitle' => 'a friendly, happy expression',
                'example'  => 'Example: She has a smile face.',
                'emoji'    => '🙂',
                'sound'    => materialAsset('slider/A2/Intermediate/chapter-11/audios/slide6/smile.mp3'),
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])