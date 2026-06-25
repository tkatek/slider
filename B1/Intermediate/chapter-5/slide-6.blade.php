<?php
$content = [
    'title'      => 'New Vocabulary',
    'subtitle'   => '',

    'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6',

    'items' => [
        [
            'text'     => 'Influencer',
            'subtitle' => "a person who affects other people's opinions or choices",
            'emoji'    => '📱',
            'sound'    => materialAsset('slider/B1/Intermediate/chapter-5/audios/slide6/influencer.mp3'),
            'image'    => materialAsset('slider/B1/Intermediate/chapter-5/img/slide6/influencer.webp'),
        ],
        [
            'text'     => 'Followers',
            'subtitle' => 'people who follow an account on social media',
            'emoji'    => '👥',
            'sound'    => materialAsset('slider/B1/Intermediate/chapter-5/audios/slide6/followers.mp3'),
            'image'    => materialAsset('slider/B1/Intermediate/chapter-5/img/slide6/followers.webp'),
        ],
        [
            'text'     => 'Content',
            'subtitle' => 'videos, photos, posts, and other online material',
            'emoji'    => '🎬',
            'sound'    => materialAsset('slider/B1/Intermediate/chapter-5/audios/slide6/content.mp3'),
            'image'    => materialAsset('slider/B1/Intermediate/chapter-5/img/slide6/content.webp'),
        ],
        [
            'text'     => 'Audience',
            'subtitle' => 'the people who watch or follow someone',
            'emoji'    => '👀',
            'sound'    => materialAsset('slider/B1/Intermediate/chapter-5/audios/slide6/audience.mp3'),
            'image'    => materialAsset('slider/B1/Intermediate/chapter-5/img/slide6/audience.webp'),
        ],
        [
            'text'     => 'Platform',
            'subtitle' => 'a social media website or app',
            'emoji'    => '🌐',
            'sound'    => materialAsset('slider/B1/Intermediate/chapter-5/audios/slide6/platform.mp3'),
            'image'    => materialAsset('slider/B1/Intermediate/chapter-5/img/slide6/platform.webp'),
        ],
        [
            'text'     => 'Niche',
            'subtitle' => 'a special area of interest',
            'emoji'    => '🎯',
            'sound'    => materialAsset('slider/B1/Intermediate/chapter-5/audios/slide6/niche.mp3'),
            'image'    => materialAsset('slider/B1/Intermediate/chapter-5/img/slide6/niche.webp'),
        ],
        [
            'text'     => 'Engaged',
            'subtitle' => 'interested and actively involved',
            'emoji'    => '🙋',
            'sound'    => materialAsset('slider/B1/Intermediate/chapter-5/audios/slide6/engaged.mp3'),
            'image'    => materialAsset('slider/B1/Intermediate/chapter-5/img/slide6/engaged.webp'),
        ],
        [
            'text'     => 'Trend',
            'subtitle' => 'something that becomes popular',
            'emoji'    => '📈',
            'sound'    => materialAsset('slider/B1/Intermediate/chapter-5/audios/slide6/trend.mp3'),
            'image'    => materialAsset('slider/B1/Intermediate/chapter-5/img/slide6/trend.webp'),
        ],
        [
            'text'     => 'Promote',
            'subtitle' => 'to advertise or support something',
            'emoji'    => '📢',
            'sound'    => materialAsset('slider/B1/Intermediate/chapter-5/audios/slide6/promote.mp3'),
            'image'    => materialAsset('slider/B1/Intermediate/chapter-5/img/slide6/promote.webp'),
        ],
        [
            'text'     => 'Creator',
            'subtitle' => 'a person who makes online content',
            'emoji'    => '🎨',
            'sound'    => materialAsset('slider/B1/Intermediate/chapter-5/audios/slide6/creator.mp3'),
            'image'    => materialAsset('slider/B1/Intermediate/chapter-5/img/slide6/creator.webp'),
        ],
        [
            'text'     => 'Recognition',
            'subtitle' => 'being known by many people',
            'emoji'    => '🏆',
            'sound'    => materialAsset('slider/B1/Intermediate/chapter-5/audios/slide6/recognition.mp3'),
            'image'    => materialAsset('slider/B1/Intermediate/chapter-5/img/slide6/recognition.webp'),
        ],
        [
            'text'     => 'Expert',
            'subtitle' => 'a person with a lot of knowledge about a subject',
            'emoji'    => '🧠',
            'sound'    => materialAsset('slider/B1/Intermediate/chapter-5/audios/slide6/expert.mp3'),
            'image'    => materialAsset('slider/B1/Intermediate/chapter-5/img/slide6/expert.webp'),
        ],
    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])