<?php
$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => '',

    'image'      => materialAsset('slider/A2/Intermediate/chapter-5/img/slide7.webp'),
    'image_alt'  => 'What were you doing when the lights went out?',



    'items'      => [
        [
            'emoji' => '❓',
            'text'  => 'What <span class="text-red-500 font-black">were</span> you <span class="text-red-500 font-black">doing</span> when the lights <span class="text-red-500 font-black">went</span> out?',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-3/audios/slideX/1.mp3'),
        ],
        [
            'emoji' => '🍽️',
            'text'  => 'I <span class="bg-gradient-to-br from-orange-500 via-amber-500 to-yellow-400 bg-clip-text text-transparent font-black">was washing</span> the dishes, and my wife <span class="bg-gradient-to-br from-sky-500 via-cyan-500 to-blue-500 bg-clip-text text-transparent font-black">was giving</span> the baby a bath.',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-3/audios/slideX/2.mp3'),
        ],
        [
            'emoji' => '📺',
            'text'  => 'We <span class="bg-gradient-to-br from-fuchsia-500 via-violet-500 to-purple-500 bg-clip-text text-transparent font-black">were watching</span> TV, and our children <span class="bg-gradient-to-br from-emerald-500 via-teal-500 to-cyan-500 bg-clip-text text-transparent font-black">were doing</span> homework.',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-3/audios/slideX/3.mp3'),
        ],
        [
            'emoji' => '🏢',
            'text'  => 'I <span class="bg-gradient-to-br from-rose-500 via-pink-500 to-fuchsia-500 bg-clip-text text-transparent font-black">was working</span> in the building.',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-3/audios/slideX/4.mp3'),
        ],
        [
            'emoji' => '👫',
            'text'  => 'I <span class="bg-gradient-to-br from-indigo-500 via-blue-500 to-sky-500 bg-clip-text text-transparent font-black">was visiting</span> a friend.',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-3/audios/slideX/5.mp3'),
        ],
        [
            'emoji' => '🧺',
            'text'  => 'We <span class="bg-gradient-to-br from-amber-500 via-orange-500 to-red-500 bg-clip-text text-transparent font-black">were having</span> a picnic.',
            'sound' => materialAsset('slider/A2/Intermediate/chapter-3/audios/slideX/6.mp3'),
        ],
    ],
];
?>
@include('slider.other.new-language-emoji', ['content' => $content])
