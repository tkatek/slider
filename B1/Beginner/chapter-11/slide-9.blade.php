@php
    $content = [
        'title'      => 'Language Focus',
        'subtitle'   => '',
        'grid_class' => 'grid-cols-1 sm:grid-cols-4 ',

        'items' => [
            [
                'text'     => 'Third Conditional',
                'example'  => 'Example: If I <span class="text-red-500 italic font-black">hadn’t gone </span> to sleep so late, I <span class="text-red-500 italic font-black">would have woken up</span> on time.',
                'subtitle' => 'Talking about an unreal past situation and its result',
                'emoji'    => '⏰',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-11/audios/slide9/third-conditional-1.mp3'),
            ],
            [
                'text'     => 'Third Conditional',
                'example'  => 'Example: If I <span class="text-red-500 italic font-black">had started </span> studying earlier, I <span class="text-red-500 italic font-black">wouldn’t have stayed</span> at the library so long.',
                'subtitle' => 'Expressing regret about the past',
                'emoji'    => '😔',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-11/audios/slide9/third-conditional-2.mp3'),
            ],
            [
                'text'     => 'Third Conditional',
                'example'  => 'Example: If it <span class="text-red-500 italic font-black">hadn’t rained </span>, there <span class="text-red-500 italic font-black">would have been</span> less traffic.',
                'subtitle' => 'Imagining a different past result',
                'emoji'    => '🌧️',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-11/audios/slide9/third-conditional-3.mp3'),
            ],
            [
                'text'     => 'Talking about consequences',
                'example'  => 'Example: There <span class="text-red-500 italic font-black">would have been </span> less traffic.',
                'subtitle' => 'Describing a different possible result',
                'emoji'    => '➡️',
                'sound'    => materialAsset('slider/B1/Beginner/chapter-11/audios/slide9/talking-about-consequences.mp3'),
            ],
        ],
    ];
@endphp

@include('slider.vocab.image-card', ['content' => $content])