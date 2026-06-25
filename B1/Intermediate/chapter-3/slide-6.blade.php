@php
    $content = [
        'title'      => 'New Vocabulary',
        'subtitle'   => '',
        'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5',

        'items' => [
            [
                'text'     => 'autonomous (adjective)',
                'subtitle' => 'Able to work without human control.',
                'example'  => 'An autonomous car can drive itself.',
                'emoji'    => '🚗',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-3/audios/slide6/autonomous.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-3/img/slide6/autonomous.webp'),
            ],
            [
                'text'     => 'predictive (adjective)',
                'subtitle' => 'Used to predict future events or problems.',
                'example'  => 'Predictive AI can help forecast future risks.',
                'emoji'    => '🔮',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-3/audios/slide6/predictive.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-3/img/slide6/predictive.webp'),
            ],
            [
                'text'     => 'surveillance (noun)',
                'subtitle' => 'The act of watching people or activities closely.',
                'example'  => 'Some people worry about increased surveillance.',
                'emoji'    => '📹',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-3/audios/slide6/surveillance.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-3/img/slide6/surveillance.webp'),
            ],
            [
                'text'     => 'privacy (noun)',
                'subtitle' => 'The right to keep personal information private.',
                'example'  => 'Social media can affect our privacy.',
                'emoji'    => '🔒',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-3/audios/slide6/privacy.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-3/img/slide6/privacy.webp'),
            ],
            [
                'text'     => 'monitor (verb)',
                'subtitle' => 'To watch or check something regularly.',
                'example'  => 'AI may monitor traffic in a city.',
                'emoji'    => '🖥️',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-3/audios/slide6/monitor.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-3/img/slide6/monitor.webp'),
            ],
            [
                'text'     => 'deepfake (noun)',
                'subtitle' => 'A fake image, video, or audio created by AI.',
                'example'  => 'It can be difficult to identify a deepfake.',
                'emoji'    => '🎭',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-3/audios/slide6/deepfake.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-3/img/slide6/deepfake.webp'),
            ],
            [
                'text'     => 'manipulate (verb)',
                'subtitle' => 'To control something unfairly.',
                'example'  => "Fake information can manipulate people's opinions.",
                'emoji'    => '🧩',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-3/audios/slide6/manipulate.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-3/img/slide6/manipulate.webp'),
            ],
            [
                'text'     => 'influencer (noun)',
                'subtitle' => 'A person who influences others through social media.',
                'example'  => 'Many influencers promote products online.',
                'emoji'    => '📱',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-3/audios/slide6/influencer.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-3/img/slide6/influencer.webp'),
            ],
            [
                'text'     => 'creativity (noun)',
                'subtitle' => 'The ability to produce original ideas.',
                'example'  => 'Creativity is important in art and design.',
                'emoji'    => '💡',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-3/audios/slide6/creativity.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-3/img/slide6/creativity.webp'),
            ],
            [
                'text'     => 'AI-generated (adjective)',
                'subtitle' => 'Created by artificial intelligence.',
                'example'  => 'The image was AI-generated.',
                'emoji'    => '🤖',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-3/audios/slide6/ai-generated.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-3/img/slide6/ai-generated.webp'),
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])