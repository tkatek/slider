{{-- Canva source page 23: https://canva.link/y4h0j64e7zqgakl --}}
@php
    $content = [
        'title' => 'Invented or Discovered?',
        'subtitle' => 'What’s the difference? Decide whether each item was invented or discovered.',
        'practice_note' => 'An invention is something people create. A discovery reveals something that already exists.',
        'type' => 'image',
        'shuffle_options' => true,
        'image_aspect_ratio' => '4 / 3',
        'questions' => [
            [
                'prompt' => 'Penicillin — invented or discovered?',
                'options' => [
                    'Invented',
                    'Discovered',
                ],
                'correct' => 'Discovered',
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide23/penicillin.webp'),
            ],
            [
                'prompt' => 'Mobile phone — invented or discovered?',
                'options' => [
                    'Invented',
                    'Discovered',
                ],
                'correct' => 'Invented',
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide23/mobile-phone.webp'),
            ],
            [
                'prompt' => 'The internet — invented or discovered?',
                'options' => [
                    'Invented',
                    'Discovered',
                ],
                'correct' => 'Invented',
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide23/the-internet.webp'),
            ],
            [
                'prompt' => 'Dna — invented or discovered?',
                'options' => [
                    'Invented',
                    'Discovered',
                ],
                'correct' => 'Discovered',
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide23/dna.webp'),
            ],
            [
                'prompt' => 'Pluto — invented or discovered?',
                'options' => [
                    'Invented',
                    'Discovered',
                ],
                'correct' => 'Discovered',
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide23/pluto.webp'),
            ],
            [
                'prompt' => 'Email — invented or discovered?',
                'options' => [
                    'Invented',
                    'Discovered',
                ],
                'correct' => 'Invented',
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide23/email.webp'),
            ],
            [
                'prompt' => 'Fridge — invented or discovered?',
                'options' => [
                    'Invented',
                    'Discovered',
                ],
                'correct' => 'Invented',
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide23/fridge.webp'),
            ],
            [
                'prompt' => 'Electrons — invented or discovered?',
                'options' => [
                    'Invented',
                    'Discovered',
                ],
                'correct' => 'Discovered',
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide23/electrons.webp'),
            ],
            [
                'prompt' => 'Tv — invented or discovered?',
                'options' => [
                    'Invented',
                    'Discovered',
                ],
                'correct' => 'Invented',
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide23/tv.webp'),
            ],
            [
                'prompt' => 'Credit card — invented or discovered?',
                'options' => [
                    'Invented',
                    'Discovered',
                ],
                'correct' => 'Invented',
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide23/credit-card.webp'),
            ],
            [
                'prompt' => 'Mars — invented or discovered?',
                'options' => [
                    'Invented',
                    'Discovered',
                ],
                'correct' => 'Discovered',
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide23/mars.webp'),
            ],
            [
                'prompt' => 'The solar system — invented or discovered?',
                'options' => [
                    'Invented',
                    'Discovered',
                ],
                'correct' => 'Discovered',
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide23/the-solar-system.webp'),
            ],
            [
                'prompt' => 'Dynamite — invented or discovered?',
                'options' => [
                    'Invented',
                    'Discovered',
                ],
                'correct' => 'Invented',
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide23/dynamite.webp'),
            ],
            [
                'prompt' => 'Battery — invented or discovered?',
                'options' => [
                    'Invented',
                    'Discovered',
                ],
                'correct' => 'Invented',
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide23/battery.webp'),
            ],
        ],
        'page_title' => 'Invented or Discovered?',
    ];
@endphp

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
