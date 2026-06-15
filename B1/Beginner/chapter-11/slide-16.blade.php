@php
    $content = [
        'title'      => 'New Vocabulary',
        'subtitle'   => '',
        'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-3 xl:grid-cols-6',

        'items' => [
            [
                'text'     => 'opportunity',
                'subtitle' => 'a chance to do something new or better',
                'emoji'    => '🚪',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-11/audios/slide16/opportunity.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-11/img/slide16/opportunity.webp'),
            ],
            [
                'text'     => 'adventurous',
                'subtitle' => 'willing to try exciting or unusual things',
                'emoji'    => '🧗',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-11/audios/slide16/adventurous.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-11/img/slide16/adventurous.webp'),
            ],
            [
                'text'     => 'savings',
                'subtitle' => 'money set aside for future use',
                'emoji'    => '💰',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-11/audios/slide16/savings.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-11/img/slide16/savings.webp'),
            ],
            [
                'text'     => 'realize',
                'subtitle' => 'to understand something clearly',
                'emoji'    => '💡',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-11/audios/slide16/realize.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-11/img/slide16/realize.webp'),
            ],
            [
                'text'     => 'teenager',
                'subtitle' => 'a person between thirteen and nineteen years old',
                'emoji'    => '🧑',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-11/audios/slide16/teenager.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-11/img/slide16/teenager.webp'),
            ],
            [
                'text'     => 'health problems',
                'subtitle' => 'issues that affect the body or mind',
                'emoji'    => '🩺',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-11/audios/slide16/health-problems.mp3'),
                'image'    => materialAsset('slider/B1/Beginner/chapter-11/img/slide16/health-problems.webp'),
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])