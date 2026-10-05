{{-- Canva source page 10: https://canva.link/y4h0j64e7zqgakl --}}
@php
    $content = [
        'title' => 'Life-Saving Innovations — Choose the Best Answer',
        'subtitle' => 'Choose the best option to complete each situation.',
        'type' => 'image',
        'shuffle_options' => true,
        'image_aspect_ratio' => '4 / 3',
        'image_panel_col_class' => 'sm:col-span-4',
        'answer_panel_col_class' => 'sm:col-span-8',
        'questions' => [
            [
                'prompt' => 'A group of scientists has developed a new vaccine that could prevent a serious disease. This is an example of a ____.',
                'options' => [
                    'medical innovation',
                    'cardiac arrest',
                    'sanitation system',
                    'artificial organ',
                ],
                'correct' => 'medical innovation',
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide10/situation-1.webp'),
            ],
            [
                'prompt' => 'A man suddenly collapses at the gym. His heart has stopped beating and he needs immediate help. He is suffering from ____.',
                'options' => [
                    'life expectancy',
                    'cardiac arrest',
                    'preventable disease',
                    'organ transplantation',
                ],
                'correct' => 'cardiac arrest',
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide10/situation-2.webp'),
            ],
            [
                'prompt' => 'The airbags in the car helped to ____ the impact of the collision and saved the driver’s life.',
                'options' => [
                    'cushion',
                    'improve',
                    'increase',
                    'undergo',
                ],
                'correct' => 'cushion',
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide10/situation-3.webp'),
            ],
            [
                'prompt' => 'A young woman received a kidney ____ last year, and now she is back at school and living a normal life.',
                'options' => [
                    'transplantation',
                    'innovation',
                    'survival rate',
                    'sanitation system',
                ],
                'correct' => 'transplantation',
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide10/situation-4.webp'),
            ],
            [
                'prompt' => 'Some people with severe heart conditions need ____ to help their heart function properly.',
                'options' => [
                    'artificial organs',
                    'life expectancy',
                    'quality of life',
                    'preventable diseases',
                ],
                'correct' => 'artificial organs',
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide10/situation-5.webp'),
            ],
            [
                'prompt' => 'Clean water and proper waste management are part of good ____, which help prevent the spread of disease.',
                'options' => [
                    'sanitation systems',
                    'transplantation',
                    'cardiac arrest',
                    'life expectancy',
                ],
                'correct' => 'sanitation systems',
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide10/situation-6.webp'),
            ],
            [
                'prompt' => 'Thanks to vaccination programmes, many diseases are now classified as ____.',
                'options' => [
                    'preventable diseases',
                    'medical innovations',
                    'artificial organs',
                    'survival rates',
                ],
                'correct' => 'preventable diseases',
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide10/situation-7.webp'),
            ],
            [
                'prompt' => 'The new treatment has significantly increased people’s ____, giving them more years to enjoy with their families.',
                'options' => [
                    'quality of life',
                    'life expectancy',
                    'survival rate',
                    'organ transplantation',
                ],
                'correct' => 'life expectancy',
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide10/situation-8.webp'),
            ],
        ],
        'page_title' => 'Life-Saving Innovations — Choose the Best Answer',
    ];
@endphp

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
