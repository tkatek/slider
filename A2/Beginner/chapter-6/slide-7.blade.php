<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title' => 'New Vocabulary',
    'subtitle' => 'Life Events',
    'groups' => [
        [
            'key' => 'early_years',
            'title' => '👶 Early Years:',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-5',
            'items' => [
                [
                    'text' => 'be born',
                    'emoji' => '👶',
                    'description' => 'come into the world',
                    'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/be-born.mp3'),
                    'image' => materialAsset('slider/A2/Beginner/chapter-6/img/slide7/be-born.webp'),
                ],
                [
                    'text' => 'to walk',
                    'emoji' => '🚶',
                    'description' => 'learn to move on your feet',
                    'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/to-walk.mp3'),
                    'image' => materialAsset('slider/A2/Beginner/chapter-6/img/slide7/to-walk.webp'),
                ],
                [
                    'text' => 'start school',
                    'emoji' => '🏫',
                    'description' => 'begin going to school',
                    'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/start-school.mp3'),
                    'image' => materialAsset('slider/A2/Beginner/chapter-6/img/slide7/start-school.webp'),
                ],
                [
                    'text' => 'emigrate',
                    'emoji' => '🌍',
                    'description' => 'move to live in another country',
                    'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/emigrate.mp3'),
                    'image' => materialAsset('slider/A2/Beginner/chapter-6/img/slide7/emigrate.webp'),
                ],
            ],
        ],
        [
            'key' => 'education_career',
            'title' => '🎓 Education & Career:',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-5',
            'items' => [
                [
                    'text' => 'graduate from high school',
                    'emoji' => '🎓',
                    'description' => 'finish high school',
                    'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/graduate-from-high-school.mp3'),
                    'image' => materialAsset('slider/A2/Beginner/chapter-6/img/slide7/graduate-from-high-school.webp'),
                ],
                [
                    'text' => 'go to college',
                    'emoji' => '📚',
                    'description' => 'study at college or university',
                    'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/go-to-college.mp3'),
                    'image' => materialAsset('slider/A2/Beginner/chapter-6/img/slide7/go-to-college.webp'),
                ],
                [
                    'text' => 'rent an apartment',
                    'emoji' => '🏢',
                    'description' => 'pay to live in an apartment',
                    'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/rent-an-apartment.mp3'),
                    'image' => materialAsset('slider/A2/Beginner/chapter-6/img/slide7/rent-an-apartment.webp'),
                ],
                [
                    'text' => 'get a job',
                    'emoji' => '💼',
                    'description' => 'start working',
                    'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/get-a-job.mp3'),
                    'image' => materialAsset('slider/A2/Beginner/chapter-6/img/slide7/get-a-job.webp'),
                ],
            ],
        ],
        [
            'key' => 'stages_of_life',
            'title' => '🌱 Stages of Life:',
            'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-6',
            'items' => [
                [
                    'text' => 'infant',
                    'emoji' => '👶',
                    'description' => 'a very young baby',
                    'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/infant.mp3'),
                    'image' => materialAsset('slider/A2/Beginner/chapter-6/img/slide7/infant.webp'),
                ],
                [
                    'text' => 'baby',
                    'emoji' => '🍼',
                    'description' => 'a very young child',
                    'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/baby.mp3'),
                    'image' => materialAsset('slider/A2/Beginner/chapter-6/img/slide7/baby.webp'),
                ],
                [
                    'text' => 'child',
                    'emoji' => '🧒',
                    'description' => 'a young person',
                    'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/child.mp3'),
                    'image' => materialAsset('slider/A2/Beginner/chapter-6/img/slide7/child.webp'),
                ],
                [
                    'text' => 'teenager',
                    'emoji' => '🧑',
                    'description' => 'a person aged 13 to 19',
                    'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/teenager.mp3'),
                    'image' => materialAsset('slider/A2/Beginner/chapter-6/img/slide7/teenager.webp'),
                ],
                [
                    'text' => 'adult',
                    'emoji' => '🧑‍💼',
                    'description' => 'a fully grown person',
                    'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/adult.mp3'),
                    'image' => materialAsset('slider/A2/Beginner/chapter-6/img/slide7/adult.webp'),
                ],
                [
                    'text' => 'senior citizen',
                    'emoji' => '👵',
                    'description' => 'an older person',
                    'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/senior-citizen.mp3'),
                    'image' => materialAsset('slider/A2/Beginner/chapter-6/img/slide7/senior-citizen.webp'),
                ],
            ],
        ],
    ],
];
?>

@include('slider.vocab.image-card', ['content' => $content])