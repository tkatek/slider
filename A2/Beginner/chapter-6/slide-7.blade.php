<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title' => 'New Vocabulary',
    'subtitle' => 'Life Events',
    'grid_class' => 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4',
    'groups' => [
        [
            'key' => 'early_years',
            'title' => 'Early Years',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-4',
            'items' => [
                ['text' => 'be born', 'emoji' => '👶', 'description' => 'come into the world', 'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/be-born.mp3')],
                ['text' => 'to walk', 'emoji' => '🚶', 'description' => 'learn to move on your feet', 'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/to-walk.mp3')],
                ['text' => 'start school', 'emoji' => '🏫', 'description' => 'begin going to school', 'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/start-school.mp3')],
                ['text' => 'emigrate', 'emoji' => '🌍', 'description' => 'move to live in another country', 'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/emigrate.mp3')],
            ],
        ],
        [
            'key' => 'education_career',
            'title' => 'Education & Career',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-4',
            'items' => [
                ['text' => 'graduate from high school', 'emoji' => '🎓', 'description' => 'finish high school', 'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/graduate-from-high-school.mp3')],
                ['text' => 'go to college', 'emoji' => '📚', 'description' => 'study at college or university', 'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/go-to-college.mp3')],
                ['text' => 'rent an apartment', 'emoji' => '🏢', 'description' => 'pay to live in an apartment', 'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/rent-an-apartment.mp3')],
                ['text' => 'get a job', 'emoji' => '💼', 'description' => 'start working', 'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/get-a-job.mp3')],
            ],
        ],
        [
            'key' => 'stages_of_life',
            'title' => 'Stages of Life',
            'grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-6',
            'items' => [
                ['text' => 'infant', 'emoji' => '👶', 'description' => 'a very young baby', 'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/infant.mp3')],
                ['text' => 'baby', 'emoji' => '🍼', 'description' => 'a very young child', 'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/baby.mp3')],
                ['text' => 'child', 'emoji' => '🧒', 'description' => 'a young person', 'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/child.mp3')],
                ['text' => 'teenager', 'emoji' => '🧑', 'description' => 'a person aged 13 to 19', 'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/teenager.mp3')],
                ['text' => 'adult', 'emoji' => '🧑‍💼', 'description' => 'a fully grown person', 'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/adult.mp3')],
                ['text' => 'senior citizen', 'emoji' => '👵', 'description' => 'an older person', 'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/senior-citizen.mp3')],
            ],
        ],
    ],
];
?>

@include('slider.vocab.sentence-audio', ['content' => $content])