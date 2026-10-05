{{-- Canva source page 19: https://canva.link/y4h0j64e7zqgakl --}}
@php
    $content = [
        'title' => 'Innovation Timeline',
        'subtitle' => 'Use the passage to complete the dates, periods and innovations.',
        'inline_answers' => true,
        'hide_hints' => true,
        'storage_version' => 'life-expectancy-v1',
        'questions' => [
            [
                'prefix' => '',
                'suffix' => '— Important innovations improved people’s chances of surviving disease.',
                'answers' => [
                    'After the Industrial Revolution',
                    'The period following the Industrial Revolution',
                ],
            ],
            [
                'prefix' => '1909 —',
                'suffix' => 'were developed, helping to increase crop production.',
                'answers' => [
                    'Synthetic fertilisers',
                    'synthetic fertilizers',
                ],
            ],
            [
                'prefix' => '',
                'suffix' => '— The Green Revolution transformed agriculture and greatly increased food production.',
                'answers' => [
                    'The 1940s',
                    '1940s',
                ],
            ],
            [
                'prefix' => 'Mid-20th century —',
                'suffix' => 'became widely available and helped reduce deaths from several serious diseases.',
                'answers' => [
                    'Vaccines',
                ],
            ],
            [
                'prefix' => '1950–2000 —',
                'suffix' => 'made significant contributions to human health and safety.',
                'answers' => [
                    'Air-conditioning, car-safety technology, radiology and pacemakers',
                    'Air conditioning, car-safety technology, radiology and pacemakers',
                ],
            ],
        ],
        'passage' => [
            'For much of human history, infection and contamination were major threats to people\'s health. However, the period following the Industrial Revolution brought important innovations that improved people\'s chances of surviving disease.',
            'Developments such as blood transfusions, pasteurisation, antibiotics and sanitation helped control the spread of disease and reduce deaths. Better sanitation also provided cleaner living conditions and improved public health.',
            'Innovation transformed food production too. Synthetic fertilisers, developed in 1909, increased crop production and contributed to the Green Revolution of the 1940s. This helped produce more food for a growing population.',
            'Another major breakthrough was the development of vaccines. By the mid-twentieth century, vaccines were widely available and had helped reduce deaths from diseases such as measles, tuberculosis, smallpox and rubella.',
            'The second half of the twentieth century brought further advances, including air-conditioning, car-safety technology, radiology and pacemakers. These innovations have improved safety, healthcare and quality of life.',
            'Today, new technologies such as artificial intelligence, nanotechnology, genetic mapping and renewable energy could have an even greater impact. However, because many of them are still developing, their long-term effects are difficult to predict.',
            'Innovation does not always have only positive consequences. For example, synthetic fertilisers have increased food production but have also contributed to environmental problems. An invention can therefore solve one problem while creating another.',
            'Despite these challenges, humans will continue to innovate. As long as there are barriers to living longer and healthier lives, scientists and inventors will continue searching for solutions.',
        ],
        'reading_title' => 'How Innovation Has Helped Us Live Longer',
        'page_title' => 'Innovation Timeline',
    ];
@endphp

@extends('slider.game.type-correct-format')

@section('style')
@parent
<style>#typeCorrectReadingPassage p { text-align:justify; font-size:17px; line-height:1.75; }</style>
@endsection
