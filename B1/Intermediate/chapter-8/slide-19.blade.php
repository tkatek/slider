@php
    $content = [
        'title'      => 'Phrasal Verbs: Out',
        'subtitle'   => 'A phrasal verb is a verb paired with a preposition like “out,” “up,” or “in” that creates a new meaning.',

        'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-4',

        'items' => [
            [
                'text_html' => '<span class="text-purple-700 dark:text-purple-300">hang out</span>',
                'text'     => 'hang out',
                'subtitle' => 'spend time together socially',
                'example'  => 'We used to <span class="font-black text-purple-700 dark:text-purple-300">hang out</span> all the time.',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-8/audios/slide19/hang-out.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-8/img/slide19/hang-out.webp'),
            ],
            [
                'text_html' => '<span class="text-emerald-700 dark:text-emerald-300">worked out</span>',
                'text'     => 'worked out',
                'subtitle' => 'found a solution',
                'example'  => 'We <span class="font-black text-emerald-700 dark:text-emerald-300">worked out</span> a way to stay in touch.',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-8/audios/slide19/worked-out.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-8/img/slide19/worked-out.webp'),
            ],
            [
                'text_html' => '<span class="text-blue-700 dark:text-blue-300">came out</span>',
                'text'     => 'came out',
                'subtitle' => 'became available',
                'example'  => 'A new film <span class="font-black text-blue-700 dark:text-blue-300">came out</span> last week.',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-8/audios/slide19/came-out.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-8/img/slide19/came-out.webp'),
            ],
            [
                'text_html' => '<span class="text-orange-600 dark:text-orange-300">check out</span>',
                'text'     => 'check out',
                'subtitle' => 'visit or explore a place',
                'example'  => 'He likes to <span class="font-black text-orange-600 dark:text-orange-300">check out</span> new places in the city.',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-8/audios/slide19/check-out.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-8/img/slide19/check-out.webp'),
            ],
            [
                'text_html' => '<span class="text-pink-600 dark:text-pink-300">ate out</span>',
                'text'     => 'ate out',
                'subtitle' => 'went out to have a meal',
                'example'  => 'We <span class="font-black text-pink-600 dark:text-pink-300">ate out</span> at a great restaurant.',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-8/audios/slide19/ate-out.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-8/img/slide19/ate-out.webp'),
            ],
            [
                'text_html' => '<span class="text-cyan-700 dark:text-cyan-300">turned out</span>',
                'text'     => 'turned out',
                'subtitle' => 'happened / proved to be',
                'example'  => 'Everything <span class="font-black text-cyan-700 dark:text-cyan-300">turned out</span> better than I expected.',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-8/audios/slide19/turned-out.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-8/img/slide19/turned-out.webp'),
            ],
            [
                'text_html' => '<span class="text-violet-700 dark:text-violet-300">left out</span>',
                'text'     => 'left out',
                'subtitle' => 'not included',
                'example'  => 'I felt <span class="font-black text-violet-700 dark:text-violet-300">left out</span> because they didn’t invite me.',
                'emoji'    => '',
                'sound'    => materialAsset('slider/B1/Intermediate/chapter-8/audios/slide19/left-out.mp3'),
                'image'    => materialAsset('slider/B1/Intermediate/chapter-8/img/slide19/left-out.webp'),
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])