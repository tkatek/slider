<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title' => 'New Vocabulary',
    'subtitle' => 'Life Events',
    'grid_class' => 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4',
    'groups' => [
        [
            'key' => 'relationships_family',
            'title' => 'Relationships & Family',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-4',
            'items' => [
                ['text' => 'date', 'emoji' => '💑', 'description' => 'go out with someone romantically', 'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/date.mp3')],
                ['text' => 'fall in love', 'emoji' => '❤️', 'description' => 'begin to love someone deeply', 'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/fall-in-love.mp3')],
                ['text' => 'get engaged', 'emoji' => '💍', 'description' => 'promise to marry someone', 'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/get-engaged.mp3')],
                ['text' => 'get married', 'emoji' => '👰', 'description' => 'become husband and wife / spouses', 'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/get-married.mp3')],
                ['text' => 'be pregnant', 'emoji' => '🤰', 'description' => 'have a baby growing inside', 'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/be-pregnant.mp3')],
                ['text' => 'have a baby', 'emoji' => '🍼', 'description' => 'give birth to a baby', 'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/have-a-baby.mp3')],
                ['text' => 'raise a family', 'emoji' => '👨‍👩‍👧‍👦', 'description' => 'take care of children as they grow', 'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/raise-a-family.mp3')],
            ],
        ],
        [
            'key' => 'milestones_lifestyle',
            'title' => 'Milestones & Lifestyle',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-4',
            'items' => [
                ['text' => 'buy a house', 'emoji' => '🏠', 'description' => 'purchase a home', 'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/buy-a-house.mp3')],
                ['text' => 'move', 'emoji' => '📦', 'description' => 'go to live in a new place', 'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/move.mp3')],
                ['text' => 'get sick', 'emoji' => '🤒', 'description' => 'become ill', 'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/get-sick.mp3')],
                ['text' => 'take a vacation', 'emoji' => '🏖️', 'description' => 'go on a holiday', 'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/take-a-vacation.mp3')],
                ['text' => 'celebrate a birthday', 'emoji' => '🎂', 'description' => 'have a birthday celebration', 'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/celebrate-a-birthday.mp3')],
                ['text' => 'become a grandparent', 'emoji' => '👴', 'description' => 'have a grandchild for the first time', 'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/become-a-grandparent.mp3')],
                ['text' => 'retire', 'emoji' => '🪑', 'description' => 'stop working because of age', 'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/retire.mp3')],
                ['text' => 'travel', 'emoji' => '✈️', 'description' => 'go to different places', 'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/travel.mp3')],
            ],
        ],
        [
            'key' => 'end_of_life',
            'title' => 'End of Life',
            'grid_class' => 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-2',
            'items' => [
                ['text' => 'died', 'emoji' => '🕊️', 'description' => 'stopped living', 'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/died.mp3')],
                ['text' => 'pass away', 'emoji' => '🤍', 'description' => 'a softer way to say die', 'sound' => materialAsset('slider/A2/Beginner/chapter-6/audios/slide7/pass-away.mp3')],
            ],
        ],
    ],
];
?>

@include('slider.vocab.sentence-audio', ['content' => $content])