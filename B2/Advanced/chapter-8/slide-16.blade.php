{{-- Canva source page 16: https://canva.link/y4h0j64e7zqgakl --}}
@php
    $content = [
        'title' => 'Innovations and Their Impact',
        'subtitle' => 'Match each innovation with its impact according to the text.',
        'activity_title' => 'Match each innovation with its impact according to the text.',
        'shuffle_right' => true,
        'pairs' => [
            [
                'id' => '1',
                'left' => [
                    'type' => 'word',
                    'text' => 'antibiotics',
                ],
                'right' => [
                    'type' => 'word',
                    'text' => 'helped control the spread of disease',
                ],
            ],
            [
                'id' => '2',
                'left' => [
                    'type' => 'word',
                    'text' => 'sanitation',
                ],
                'right' => [
                    'type' => 'word',
                    'text' => 'provided cleaner living conditions',
                ],
            ],
            [
                'id' => '3',
                'left' => [
                    'type' => 'word',
                    'text' => 'synthetic fertilisers',
                ],
                'right' => [
                    'type' => 'word',
                    'text' => 'increased crop production',
                ],
            ],
            [
                'id' => '4',
                'left' => [
                    'type' => 'word',
                    'text' => 'vaccines',
                ],
                'right' => [
                    'type' => 'word',
                    'text' => 'reduced deaths from several diseases',
                ],
            ],
            [
                'id' => '5',
                'left' => [
                    'type' => 'word',
                    'text' => 'pacemakers',
                ],
                'right' => [
                    'type' => 'word',
                    'text' => 'improved safety, healthcare and quality of life',
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
        'passage_title' => 'How Innovation Has Helped Us Live Longer',
        'page_title' => 'Innovations and Their Impact',
    ];
@endphp

@include('slider.game.matching-pairs', ['content' => $content])
