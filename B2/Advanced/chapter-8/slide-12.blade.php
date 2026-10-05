{{-- Canva source page 12: https://canva.link/y4h0j64e7zqgakl --}}
@php
    $content = [
        'title' => 'Infinitive of Purpose — Choose the Best Answer',
        'subtitle' => 'Complete each sentence with the correct expression of purpose.',
        'type' => 'questions_only',
        'shuffle_options' => true,
        'questions' => [
            [
                'prompt' => 'Antiseptics are used ____ reduce the risk of infection during surgery.',
                'options' => [
                    'to',
                    'in order',
                    'so as',
                    'for to',
                ],
                'correct' => 'to',
            ],
            [
                'prompt' => 'A defibrillator delivers an electrical shock ____ restore a normal heartbeat.',
                'options' => [
                    'in order to',
                    'in order',
                    'so as',
                    'for',
                ],
                'correct' => 'in order to',
            ],
            [
                'prompt' => 'Seat belts are designed ____ protect passengers during a collision.',
                'options' => [
                    'so as to',
                    'so as',
                    'in order',
                    'for to',
                ],
                'correct' => 'so as to',
            ],
            [
                'prompt' => 'Vaccines are developed ____ prevent serious diseases and protect communities.',
                'options' => [
                    'to',
                    'in order',
                    'so as',
                    'for',
                ],
                'correct' => 'to',
            ],
            [
                'prompt' => 'Insulin therapy is used ____ help people with diabetes manage their condition.',
                'options' => [
                    'in order to',
                    'in order',
                    'so as',
                    'for to',
                ],
                'correct' => 'in order to',
            ],
            [
                'prompt' => 'Telemedicine is used ____ provide healthcare to people in remote areas.',
                'options' => [
                    'so as to',
                    'so as',
                    'in order',
                    'for to',
                ],
                'correct' => 'so as to',
            ],
        ],
        'page_title' => 'Infinitive of Purpose — Choose the Best Answer',
    ];
@endphp

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
