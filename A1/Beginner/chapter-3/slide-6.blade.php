@php
    $content = [
        'title'      => 'Questions You May Hear',
        'subtitle'   => 'Common Questions During A Job Interview',
        'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-4',

        'items' => [
            [
                'text'     => 'What is your name?',
                'subtitle' => 'This is the first question you will hear.',
                'emoji'    => '👤',
                'sound'    => materialAsset('slider/A1/Beginner/chapter-3/audio/slide6/1.mp3'),
            ],
            [
                'text'     => 'Where are you from?',
                'subtitle' => 'The interviewer wants to know your background.',
                'emoji'    => '🌍',
                'sound'    => materialAsset('slider/A1/Beginner/chapter-3/audio/slide6/2.mp3'),
            ],
            [
                'text'     => 'Do you have experience?',
                'subtitle' => 'They will ask if you have relevant skills.',
                'emoji'    => '💼',
                'sound'    => materialAsset('slider/A1/Beginner/chapter-3/audio/slide6/3.mp3'),
            ],
            [
                'text'     => 'Why do you want this job?',
                'subtitle' => 'This question helps them understand your motivation.',
                'emoji'    => '🎯',
                'sound'    => materialAsset('slider/A1/Beginner/chapter-3/audio/slide6/4.mp3'),
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])