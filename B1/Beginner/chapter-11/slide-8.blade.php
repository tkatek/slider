@php
    $content = [
        'title'      => 'New Vocabulary',
        'subtitle'   => '',
        'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5',

        'items' => [
            [
                'text'     => 'late for work (phrase)',
                'subtitle' => 'arriving at work after the expected time',
                'emoji'    => '⏰',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-11/audios/slide8/late-for-work.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-11/img/slide8/late-for-work.webp'),
            ],
            [
                'text'     => 'wake up (phrasal verb)',
                'subtitle' => 'stop sleeping',
                'emoji'    => '🛏️',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-11/audios/slide8/wake-up.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-11/img/slide8/wake-up.webp'),
            ],
            [
                'text'     => 'on time (phrase)',
                'subtitle' => 'at the correct or expected time',
                'emoji'    => '⌚',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-11/audios/slide8/on-time.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-11/img/slide8/on-time.webp'),
            ],
            [
                'text'     => 'effect (noun)',
                'subtitle' => 'the result of an action or situation',
                'emoji'    => '➡️',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-11/audios/slide8/effect.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-11/img/slide8/effect.webp'),
            ],
            [
                'text'     => 'regret (noun/verb)',
                'subtitle' => 'feeling sorry about something that happened in the past',
                'emoji'    => '😔',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-11/audios/slide8/regret.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-11/img/slide8/regret.webp'),
            ],
            [
                'text'     => 'unreal (adjective)',
                'subtitle' => 'imaginary; not true or real',
                'emoji'    => '💭',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-11/audios/slide8/unreal.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-11/img/slide8/unreal.webp'),
            ],
            [
                'text'     => 'condition (noun)',
                'subtitle' => 'a situation or circumstance',
                'emoji'    => '📌',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-11/audios/slide8/condition.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-11/img/slide8/condition.webp'),
            ],
            [
                'text'     => 'pass an exam (phrase)',
                'subtitle' => 'achieve a successful result in a test',
                'emoji'    => '✅',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-11/audios/slide8/pass-an-exam.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-11/img/slide8/pass-an-exam.webp'),
            ],
            [
                'text'     => 'fail an exam (phrase)',
                'subtitle' => 'not achieve a successful result in a test',
                'emoji'    => '❌',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-11/audios/slide8/fail-an-exam.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-11/img/slide8/fail-an-exam.webp'),
            ],
            [
                'text'     => 'race (noun)',
                'subtitle' => 'a competition to see who is fastest',
                'emoji'    => '🏁',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-11/audios/slide8/race.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-11/img/slide8/race.webp'),
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])