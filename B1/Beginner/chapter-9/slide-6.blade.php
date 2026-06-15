@php
    $content = [
        'title'      => 'New Vocabulary',
        'subtitle'   => '',
        'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5',

        'items' => [
            [
                'text'     => 'cancel plans (phrase)',
                'subtitle' => 'decide not to do something that was arranged',
                'emoji'    => '📅',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-9/audios/slide6/cancel-plans.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-9/img/slide6/cancel-plans.webp'),
            ],
            [
                'text'     => 'at the last minute (phrase)',
                'subtitle' => 'just before something is supposed to happen',
                'emoji'    => '⏰',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-9/audios/slide6/at-the-last-minute.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-9/img/slide6/at-the-last-minute.webp'),
            ],
            [
                'text'     => 'upsetting (adjective)',
                'subtitle' => 'making someone feel sad or disappointed',
                'emoji'    => '😟',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-9/audios/slide6/upsetting.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-9/img/slide6/upsetting.webp'),
            ],
            [
                'text'     => "value someone's time (phrase)",
                'subtitle' => "respect the importance of another person's time",
                'emoji'    => '⌛',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-9/audios/slide6/value-someones-time.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-9/img/slide6/value-someones-time.webp'),
            ],
            [
                'text'     => 'respect schedules (phrase)',
                'subtitle' => 'follow agreed times and plans',
                'emoji'    => '🗓️',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-9/audios/slide6/respect-schedules.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-9/img/slide6/respect-schedules.webp'),
            ],
            [
                'text'     => 'continue (verb)',
                'subtitle' => 'keep happening or doing something',
                'emoji'    => '➡️',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-9/audios/slide6/continue.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-9/img/slide6/continue.webp'),
            ],
            [
                'text'     => 'serious (adjective)',
                'subtitle' => 'important and needing careful thought',
                'emoji'    => '⚠️',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-9/audios/slide6/serious.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-9/img/slide6/serious.webp'),
            ],
            [
                'text'     => 'upset (adjective/verb)',
                'subtitle' => 'unhappy or emotionally hurt',
                'emoji'    => '😢',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-9/audios/slide6/upset.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-9/img/slide6/upset.webp'),
            ],
            [
                'text'     => 'defensive (adjective)',
                'subtitle' => 'reacting as if being criticized',
                'emoji'    => '🛡️',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-9/audios/slide6/defensive.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-9/img/slide6/defensive.webp'),
            ],
            [
                'text'     => 'approach a conversation (phrase)',
                'subtitle' => 'start or handle a discussion in a particular way',
                'emoji'    => '💬',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-9/audios/slide6/approach-a-conversation.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-9/img/slide6/approach-a-conversation.webp'),
            ],
            [
                'text'     => 'calmly (adverb)',
                'subtitle' => 'in a peaceful and controlled manner',
                'emoji'    => '🧘',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-9/audios/slide6/calmly.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-9/img/slide6/calmly.webp'),
            ],
            [
                'text'     => 'concern (noun)',
                'subtitle' => 'a feeling of worry or care',
                'emoji'    => '🤔',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-9/audios/slide6/concern.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-9/img/slide6/concern.webp'),
            ],
            [
                'text'     => 'friendship (noun)',
                'subtitle' => 'the relationship between friends',
                'emoji'    => '🤝',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-9/audios/slide6/friendship.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-9/img/slide6/friendship.webp'),
            ],
            [
                'text'     => 'perspective (noun)',
                'subtitle' => "a person's way of thinking about a situation",
                'emoji'    => '👀',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-9/audios/slide6/perspective.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-9/img/slide6/perspective.webp'),
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])