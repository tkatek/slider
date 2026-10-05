{{-- Canva source page 8: https://canva.link/y4h0j64e7zqgakl --}}
@php
    $content = [
        'title' => 'Key Collocations',
        'subtitle' => 'Listen and repeat. Use these phrases in your speaking and writing.',
        'items' => [
            [
                'text' => 'medical innovation',
                'script' => 'medical innovation',
                'sound' => materialAsset('slider/B2/Advanced/chapter-8/audios/slide8/medical-innovation.mp3'),
            ],
            [
                'text' => 'life-saving invention',
                'script' => 'life-saving invention',
                'sound' => materialAsset('slider/B2/Advanced/chapter-8/audios/slide8/life-saving-invention.mp3'),
            ],
            [
                'text' => 'suffer cardiac arrest',
                'script' => 'suffer cardiac arrest',
                'sound' => materialAsset('slider/B2/Advanced/chapter-8/audios/slide8/suffer-cardiac-arrest.mp3'),
            ],
            [
                'text' => 'cushion the impact',
                'script' => 'cushion the impact',
                'sound' => materialAsset('slider/B2/Advanced/chapter-8/audios/slide8/cushion-the-impact.mp3'),
            ],
            [
                'text' => 'undergo transplantation',
                'script' => 'undergo transplantation',
                'sound' => materialAsset('slider/B2/Advanced/chapter-8/audios/slide8/undergo-transplantation.mp3'),
            ],
            [
                'text' => 'organ transplantation',
                'script' => 'organ transplantation',
                'sound' => materialAsset('slider/B2/Advanced/chapter-8/audios/slide8/organ-transplantation.mp3'),
            ],
            [
                'text' => 'artificial organs',
                'script' => 'artificial organs',
                'sound' => materialAsset('slider/B2/Advanced/chapter-8/audios/slide8/artificial-organs.mp3'),
            ],
            [
                'text' => 'improve survival rates',
                'script' => 'improve survival rates',
                'sound' => materialAsset('slider/B2/Advanced/chapter-8/audios/slide8/improve-survival-rates.mp3'),
            ],
            [
                'text' => 'sanitation systems',
                'script' => 'sanitation systems',
                'sound' => materialAsset('slider/B2/Advanced/chapter-8/audios/slide8/sanitation-systems.mp3'),
            ],
            [
                'text' => 'prevent preventable diseases',
                'script' => 'prevent preventable diseases',
                'sound' => materialAsset('slider/B2/Advanced/chapter-8/audios/slide8/prevent-preventable-diseases.mp3'),
            ],
            [
                'text' => 'increase life expectancy',
                'script' => 'increase life expectancy',
                'sound' => materialAsset('slider/B2/Advanced/chapter-8/audios/slide8/increase-life-expectancy.mp3'),
            ],
            [
                'text' => 'improve quality of life',
                'script' => 'improve quality of life',
                'sound' => materialAsset('slider/B2/Advanced/chapter-8/audios/slide8/improve-quality-of-life.mp3'),
            ],
        ],
        'page_title' => 'Key Collocations',
    ];
@endphp

@include('slider.vocab.sentence-audio', ['content' => $content])
