<?php
$content = [
    'title'      => 'New Vocabulary',
    'subtitle'   => '',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-5',

    'items' => [

        [
            'text' => 'Seaside Town',
            'subtitle' => 'a town near the sea',
            'emoji' => '🏖️',
            'sound' => materialAsset('slider/B1/Beginner/chapter-5/audios/slide7/seaside-town.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide7/seaside-town.webp'),
        ],

        [
            'text' => 'Pier',
            'subtitle' => 'a long walkway over the sea',
            'emoji' => '🌉',
            'sound' => materialAsset('slider/B1/Beginner/chapter-5/audios/slide7/pier.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide7/pier.webp'),
        ],

        [
            'text' => 'Pleasure Pier',
            'subtitle' => 'a pier for entertainment and fun',
            'emoji' => '🎡',
            'sound' => materialAsset('slider/B1/Beginner/chapter-5/audios/slide7/pleasure-pier.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide7/pleasure-pier.webp'),
        ],

        [
            'text' => 'Puppet Show',
            'subtitle' => 'a show using puppets',
            'emoji' => '🎭',
            'sound' => materialAsset('slider/B1/Beginner/chapter-5/audios/slide7/puppet-show.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide7/puppet-show.webp'),
        ],

        [
            'text' => 'Naughty',
            'subtitle' => 'badly behaved in a funny way',
            'emoji' => '😜',
            'sound' => materialAsset('slider/B1/Beginner/chapter-5/audios/slide7/naughty.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide7/naughty.webp'),
        ],

        [
            'text' => 'Crocodile',
            'subtitle' => 'a large reptile animal',
            'emoji' => '🐊',
            'sound' => materialAsset('slider/B1/Beginner/chapter-5/audios/slide7/crocodile.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide7/crocodile.webp'),
        ],

        [
            'text' => 'Arcades',
            'subtitle' => 'places with video games and machines',
            'emoji' => '🕹️',
            'sound' => materialAsset('slider/B1/Beginner/chapter-5/audios/slide7/arcades.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide7/arcades.webp'),
        ],

        [
            'text' => 'Virtual Entertainment',
            'subtitle' => 'computer-based entertainment',
            'emoji' => '🥽',
            'sound' => materialAsset('slider/B1/Beginner/chapter-5/audios/slide7/virtual-entertainment.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide7/virtual-entertainment.webp'),
        ],

        [
            'text' => 'Simulator',
            'subtitle' => 'a computer program that copies real situations',
            'emoji' => '🖥️',
            'sound' => materialAsset('slider/B1/Beginner/chapter-5/audios/slide7/simulator.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide7/simulator.webp'),
        ],

        [
            'text' => 'Sports Scientist',
            'subtitle' => 'a person who studies sports and exercise',
            'emoji' => '🧑‍🔬',
            'sound' => materialAsset('slider/B1/Beginner/chapter-5/audios/slide7/sports-scientist.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide7/sports-scientist.webp'),
        ],

        [
            'text' => 'Fitness',
            'subtitle' => 'being healthy and physically strong',
            'emoji' => '💪',
            'sound' => materialAsset('slider/B1/Beginner/chapter-5/audios/slide7/fitness.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide7/fitness.webp'),
        ],

        [
            'text' => 'Replacement',
            'subtitle' => 'something used instead of another thing',
            'emoji' => '🔁',
            'sound' => materialAsset('slider/B1/Beginner/chapter-5/audios/slide7/replacement.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide7/replacement.webp'),
        ],

        [
            'text' => 'Stick Of Rock',
            'subtitle' => 'a traditional hard seaside candy in Britain',
            'emoji' => '🍬',
            'sound' => materialAsset('slider/B1/Beginner/chapter-5/audios/slide7/stick-of-rock.mp3'),
            'image' => materialAsset('slider/B1/Beginner/chapter-5/img/slide7/stick-of-rock.webp'),
        ],

    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])