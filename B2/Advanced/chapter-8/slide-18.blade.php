{{-- Canva source page 18: https://canva.link/y4h0j64e7zqgakl --}}
@php
    $content = [
        'title' => 'Find It in the Text',
        'subtitle' => 'Find the word or phrase in the passage that matches each definition.',
        'inline_answers' => true,
        'hide_hints' => true,
        'storage_version' => 'life-expectancy-v1',
        'questions' => [
            [
                'prompt' => 'a serious danger or risk',
                'prefix' => '',
                'suffix' => '',
                'answers' => [
                    'threats',
                ],
            ],
            [
                'prompt' => 'improvements or developments',
                'prefix' => '',
                'suffix' => '',
                'answers' => [
                    'advances',
                ],
            ],
            [
                'prompt' => 'the number of people living in a place',
                'prefix' => '',
                'suffix' => '',
                'answers' => [
                    'population',
                ],
            ],
            [
                'prompt' => 'not yet fully developed or established',
                'prefix' => '',
                'suffix' => '',
                'answers' => [
                    'still developing',
                ],
            ],
            [
                'prompt' => 'to say what you think will happen in the future',
                'prefix' => '',
                'suffix' => '',
                'answers' => [
                    'predict',
                ],
            ],
            [
                'prompt' => 'things that prevent progress or achievement',
                'prefix' => '',
                'suffix' => '',
                'answers' => [
                    'barriers',
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
        'page_title' => 'Find It in the Text',
    ];
@endphp

@extends('slider.game.type-correct-format')

@section('style')
@parent
<style>#typeCorrectReadingPassage p { text-align:justify; font-size:17px; line-height:1.75; }</style>
@endsection
