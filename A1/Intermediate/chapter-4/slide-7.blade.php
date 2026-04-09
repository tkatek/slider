<?php
$content = [
    'page_title'    => 'New Vocabulary',
    'title'         => 'New Vocabulary',
    'subtitle'      => 'Common Symptoms',
    'default_tone'  => 'play',
    'default_group' => 'violet',
    'use_objectives_typography' => true,
    'show_sentence_pill' => false,
    'show_item_group_badge' => false,
    'extra_css' => '
        .tile-emoji {
            display: none;
        }
    ',

    'sentences' => [
        [
            'text'  => "How are you feeling",
            'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/symptoms/how-feeling.mp3'),
        ],
        [
            'text'  => 'What’s the matter?',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/symptoms/what-matter.mp3'),
        ],
        [
            'text'  => 'What’s the problem?',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/symptoms/what-problem.mp3'),
        ],

    ],

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-4 xl:grid-cols-6',

    'items' => [
        [
            'mode'  => 'image',
            'text'  => 'I have <span class="hot">a fever / a temperature</span>.',
            'emoji' => '🤒',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/symptoms/i-have-a-fever.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/slide7/fever.webp'),
        ],
        [
            'mode'  => 'image',
            'text'  => 'I have <span class="hot">a cold</span>.',
            'emoji' => '🤧',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/symptoms/i-have-a-cold.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/slide7/cold.webp'),
        ],
        [
            'mode'  => 'image',
            'text'  => 'I have <span class="hot">a cough</span>.',
            'emoji' => '😷',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/symptoms/i-have-a-cough.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/slide7/cough.webp'),
        ],
        [
            'mode'  => 'image',
            'text'  => 'I have <span class="hot">a headache</span>.',
            'emoji' => '🤕',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/symptoms/i-have-a-headache.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/slide7/headache.webp'),
        ],
        [
            'mode'  => 'image',
            'text'  => 'I have the flu.',
            'emoji' => '🛌',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/symptoms/i-have-the-flu.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/slide7/flu.webp'),
        ],
        [
            'mode'  => 'image',
            'text'  => 'I have <span class="hot">a backache</span>.',
            'emoji' => '🧍',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/symptoms/i-have-a-backache.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/slide7/backache.webp'),
        ],
        [
            'mode'  => 'image',
            'text'  => 'I have <span class="hot">a stomach ache</span> / an <span class="hot">upset stomach</span>.',
            'emoji' => '🤢',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/symptoms/i-have-a-stomach.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/slide7/stomach.webp'),
        ],
        [
            'mode'  => 'image',
            'text'  => 'I have <span class="hot">a sore throat</span>.',
            'emoji' => '🗣️',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/symptoms/i-have-a-sore-throat.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/slide7/sore-throat.webp'),
        ],
        [
            'mode'  => 'image',
            'text'  => 'I have an <span class="hot">earache</span>.',
            'emoji' => '👂',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/symptoms/i-have-an-earache.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/slide7/earache.webp'),
        ],
        [
            'mode'  => 'image',
            'text'  => 'I have a <span class="hot">broken arm</span>.',
            'emoji' => '🦴',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/symptoms/i-have-a-broken-arm.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/slide7/broken-arm.webp'),
        ],
        [
            'mode'  => 'image',
            'text'  => 'I have a <span class="hot">cut</span>.',
            'emoji' => '🩹',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/symptoms/i-have-a-cut.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/slide7/cut.webp'),
        ],
        [
            'mode'  => 'image',
            'text'  => 'I have an <span class="hot">allergy</span>.',
            'emoji' => '🌿',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/symptoms/i-have-an-allergy.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/slide7/allergy.webp'),
        ],
        [
            'mode'  => 'image',
            'text'  => 'I <span class="hot">broke</span> my arm',
            'emoji' => '🦴',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/slide5/i-broke-my-arm.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/slide7/broke-arm.webp'),
        ],
        [
            'mode'  => 'image',
            'text'  => 'I <span class="hot">sprained</span> my ankle',
            'emoji' => '🦶',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/slide5/i-sprained-my-ankle.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/slide7/sprained-ankle.webp'),
        ],
        [
            'mode'  => 'image',
            'text'  => 'I <span class="hot">cut</span> my finger',
            'emoji' => '☝️',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/slide5/i-cut-my-finger.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/slide7/cut-finger.webp'),
        ],
        [
            'mode'  => 'image',
            'text'  => 'I <span class="hot">hurt</span> my back',
            'emoji' => '🧍',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/slide5/i-hurt-my-back.mp3'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/slide7/hurt-back.webp'),
        ],
        [
            'mode'  => 'image',
            'text'  => 'I <span class="hot">feel</span> terrible',
            'emoji' => '😖',
            'sound' => materialAsset('slider/A1/Intermediate/chapter-4/audios/slide5/i-feel-terrible.mpeg'),
            'image' => materialAsset('slider/A1/Intermediate/chapter-4/img/slide7/feel-terrible.webp'),
        ],
    ],
];
?>

@include('slider.vocab.vocabulary-grid', ['content' => $content])
