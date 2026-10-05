{{-- Canva source page 13: https://canva.link/y4h0j64e7zqgakl --}}
@php
    $content = [
        'title' => 'Rewrite the Sentences',
        'subtitle' => 'Use the phrase in brackets. Do not change the meaning of the original sentence.',
        'inline_answers' => true,
        'hide_hints' => true,
        'storage_version' => 'life-expectancy-v1',
        'questions' => [
            [
                'prompt' => 'The hospital introduced telemedicine because it wanted to provide medical care to patients in remote communities. (IN ORDER TO)',
                'prefix' => 'The hospital introduced telemedicine',
                'suffix' => '.',
                'answers' => [
                    'in order to provide medical care to patients in remote communities',
                ],
            ],
            [
                'prompt' => 'Scientists developed more effective vaccines because they wanted to prevent the spread of infectious diseases. (SO AS TO)',
                'prefix' => 'Scientists developed more effective vaccines',
                'suffix' => '.',
                'answers' => [
                    'so as to prevent the spread of infectious diseases',
                ],
            ],
            [
                'prompt' => 'The government invested in clean-water systems because it wanted to reduce the risk of waterborne diseases. (TO)',
                'prefix' => 'The government invested in clean-water systems',
                'suffix' => '.',
                'answers' => [
                    'to reduce the risk of waterborne diseases',
                ],
            ],
            [
                'prompt' => 'Engineers redesigned the vehicle\'s safety system because they wanted to protect passengers in serious collisions. (IN ORDER TO)',
                'prefix' => 'Engineers redesigned the vehicle\'s safety system',
                'suffix' => '.',
                'answers' => [
                    'in order to protect passengers in serious collisions',
                ],
            ],
            [
                'prompt' => 'Doctors use radiation therapy because they want to destroy cancer cells while limiting damage to surrounding tissue. (SO AS TO)',
                'prefix' => 'Doctors use radiation therapy',
                'suffix' => '.',
                'answers' => [
                    'so as to destroy cancer cells while limiting damage to surrounding tissue',
                ],
            ],
            [
                'prompt' => 'Researchers developed artificial organs because they wanted to give patients with organ failure another chance at life. (TO)',
                'prefix' => 'Researchers developed artificial organs',
                'suffix' => '.',
                'answers' => [
                    'to give patients with organ failure another chance at life',
                ],
            ],
        ],
        'page_title' => 'Rewrite the Sentences',
    ];
@endphp

@include('slider.game.type-correct-format', ['content' => $content])
