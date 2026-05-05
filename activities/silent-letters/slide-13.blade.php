@php
    $content = [
        'page_title' => 'Let\'s practice!',
        'title' => 'Let\'s practice!',
        'prompt_first' => 'Make three sentences',
        'prompt_second' => 'using the new words you learned today.',
        'pill_emojis' => ['✍️', '✨', '💬'],
        'decorations' => [
            [
                'emoji' => '✍️',
                'class' => 'left-5 top-5 text-4xl -rotate-12 sm:text-5xl lg:text-6xl',
            ],
            [
                'emoji' => '💬',
                'class' => 'right-6 top-6 text-4xl rotate-12 sm:text-5xl lg:text-6xl',
            ],
            [
                'emoji' => '✨',
                'class' => 'left-8 bottom-8 text-3xl rotate-12 sm:text-4xl lg:text-5xl',
            ],
            [
                'emoji' => '📚',
                'class' => 'right-8 bottom-8 text-3xl -rotate-6 sm:text-4xl lg:text-5xl',
            ],
        ],
    ];
@endphp

@include('slider.activities.silent-letters.prompt-card', ['content' => $content])
