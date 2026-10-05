{{-- Canva source page 17: https://canva.link/y4h0j64e7zqgakl --}}
@php
    $content = [
        'title' => 'Reading Comprehension',
        'subtitle' => 'Choose the best answer according to the text.',
        'type' => 'reading',
        'reading_title' => 'How Innovation Has Helped Us Live Longer',
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
        'reading_text_size' => 'text-base sm:text-lg',
        'image_panel_col_class' => 'sm:col-span-7',
        'answer_panel_col_class' => 'sm:col-span-5',
        'shuffle_options' => true,
        'questions' => [
            [
                'prompt' => 'What is the main purpose of the text?',
                'options' => [
                    'To explain why modern technology is dangerous',
                    'To describe how innovation has helped people live longer and healthier lives',
                    'To compare different types of medical treatment',
                    'To explain how the Industrial Revolution changed agriculture',
                ],
                'correct' => 'To describe how innovation has helped people live longer and healthier lives',
            ],
            [
                'prompt' => 'Why were sanitation systems important?',
                'options' => [
                    'They increased food production.',
                    'They improved transportation.',
                    'They helped control disease and provided cleaner living conditions.',
                    'They made medical treatment more affordable.',
                ],
                'correct' => 'They helped control disease and provided cleaner living conditions.',
            ],
            [
                'prompt' => 'What did synthetic fertilisers contribute to?',
                'options' => [
                    'The development of vaccines',
                    'The Green Revolution',
                    'The development of pacemakers',
                    'The improvement of car safety',
                ],
                'correct' => 'The Green Revolution',
            ],
            [
                'prompt' => 'Why is it difficult to predict the effects of some modern technologies?',
                'options' => [
                    'They are no longer being developed.',
                    'They have already changed healthcare.',
                    'They are still developing.',
                    'Scientists do not study them.',
                ],
                'correct' => 'They are still developing.',
            ],
        ],
        'page_title' => 'Reading Comprehension',
    ];
@endphp

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
