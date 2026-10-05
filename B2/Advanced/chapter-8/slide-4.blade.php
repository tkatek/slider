{{-- Canva source page 4: https://canva.link/y4h0j64e7zqgakl --}}
@php
    $content = [
        'title' => 'Eureka! Discussion Questions',
        'subtitle' => 'Inventions That Have Transformed Life Expectancy',
        'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide4.webp'),
        'image_alt' => 'Life-saving innovations, from vaccines to clean water.',
        'numbered' => true,
        'cards' => [
            [
                'label' => 'Think & Identify',
                'text' => 'Which invention or medical innovation has helped people live longer? Why has it been important?',
            ],
            [
                'label' => 'Compare & Evaluate',
                'text' => 'Which has had the greatest impact on life expectancy: vaccines, antibiotics, clean water or medical technology? Why?',
            ],
            [
                'label' => 'Imagine the Past',
                'text' => 'What would have happened if antibiotics had never been discovered? How might life be different today?',
            ],
            [
                'label' => 'Consider the Consequences',
                'text' => 'Have medical inventions always had positive effects? Can you think of any possible unintended consequences?',
            ],
            [
                'label' => 'Look at Today',
                'text' => 'What health or medical problems do people still face today? What kind of invention could help solve one of them?',
            ],
            [
                'label' => 'Eureka Challenge',
                'text' => 'If you could invent one thing to help people live longer and healthier lives, what would you invent? What problem would it solve?',
            ],
        ],
        'page_title' => 'Eureka! Discussion Questions',
    ];
@endphp

@include('slider.other.discussion', ['content' => $content])
