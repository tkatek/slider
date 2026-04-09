<?php
$content = [
    'type'       => 'image',
    'page_title' => 'Practice 4',
    'title'      => 'Practice 4',
    'subtitle'   => 'Look, listen & choose the right word',

    'enable_image_zoom'      => false,
    'image_plain'            => true,
    'image_scale'            => 0.58,
    'image_extra_scale'      => 1.12,
    'image_radius'           => 'rounded-[28px]',
    'image_panel_col_class'  => 'sm:col-span-6',
    'answer_panel_col_class' => 'sm:col-span-6',
    'image_panel_inner_class'=> 'h-full p-5 sm:p-6',
    'answer_panel_inner_class' => 'h-full p-5 sm:p-6 text-left',
    'question_prompt_label'  => 'Listen and choose the correct word:',

    'game_card_width' => 'max-w-5xl',
    'tiles_grid_class'   => 'grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2',
    'tile_min_w_desktop' => 260,
    'tiles_gap_class'    => 'gap-2 sm:gap-3 lg:gap-3',

    'tiny_cols'   => 2,
    'game_type'   => 'quiz',
    'prompt_alt'  => 'Train travel vocabulary',
    'win_title'   => 'Great job!',
    'win_message' => 'You finished all questions.',

    'sfx' => [
        'enabled' => true,
        'sources' => [
            'correct' => materialAsset('slider/sounds/correct.wav'),
            'wrong'   => materialAsset('slider/sounds/wrong.wav'),
            'success' => materialAsset('slider/sounds/success.wav'),
        ],
        'volume' => [
            'correct' => 1,
            'wrong'   => 1,
            'success' => 1,
        ],
    ],

    'questions' => [
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-6/img/slide7/tickets.webp'),
            'alt'     => 'Ticket machine',
            'prompt'  => 'A machine used to purchase travel tickets.',
            'audio'   => materialAsset('slider/A1/Advanced/chapter-6/audios/slide12/ticket-machine.mp3'),
            'correct' => 'Ticket machine',
            'options' => ['Ticket machine', 'Sleeping car', 'Luggage rack', 'Timetable'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-6/img/slide7/platform.webp'),
            'alt'     => 'Platform',
            'prompt'  => 'The area at a train station where passengers get on and off trains.',
            'audio'   => materialAsset('slider/A1/Advanced/chapter-6/audios/slide12/platform.mp3'),
            'correct' => 'Platform',
            'options' => ['Seats', 'Platform', 'Buffet car', 'Bunk beds'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-6/img/slide7/sleeping-car.webp'),
            'alt'     => 'Sleeping car',
            'prompt'  => 'A railway carriage with beds for passengers to sleep in.',
            'audio'   => materialAsset('slider/A1/Advanced/chapter-6/audios/slide12/sleeping-car.mp3'),
            'correct' => 'Sleeping car',
            'options' => ['Sleeping car', 'Platform', 'Timetable', 'Seats'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-6/img/slide7/seats.webp'),
            'alt'     => 'Seats',
            'prompt'  => 'Places to sit.',
            'audio'   => materialAsset('slider/A1/Advanced/chapter-6/audios/slide12/seats.mp3'),
            'correct' => 'Seats',
            'options' => ['Luggage rack', 'Seats', 'Ticket machine', 'Buffet car'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-6/img/slide7/luggage-rack.webp'),
            'alt'     => 'Luggage rack',
            'prompt'  => 'A shelf above the seats for putting bags.',
            'audio'   => materialAsset('slider/A1/Advanced/chapter-6/audios/slide12/luggage-rack.mp3'),
            'correct' => 'Luggage rack',
            'options' => ['Bunk beds', 'Luggage rack', 'Platform', 'Sleeping car'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-6/img/slide7/bunk-beds.webp'),
            'alt'     => 'Bunk beds',
            'prompt'  => 'Two beds, one on top of the other.',
            'audio'   => materialAsset('slider/A1/Advanced/chapter-6/audios/slide12/bunk-beds.mp3'),
            'correct' => 'Bunk beds',
            'options' => ['Timetable', 'Bunk beds', 'Seats', 'Ticket machine'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-6/img/slide7/buffet-car.webp'),
            'alt'     => 'Buffet car',
            'prompt'  => 'A carriage on a train where you can buy food and drinks.',
            'audio'   => materialAsset('slider/A1/Advanced/chapter-6/audios/slide12/buffet-car.mp3'),
            'correct' => 'Buffet car',
            'options' => ['Buffet car', 'Luggage rack', 'Platform', 'Sleeping car'],
        ],
        [
            'image'   => materialAsset('slider/A1/Advanced/chapter-6/img/slide7/timetable.webp'),
            'alt'     => 'Timetable',
            'prompt'  => 'A list of times when trains, buses, etc., arrive and depart.',
            'audio'   => materialAsset('slider/A1/Advanced/chapter-6/audios/slide12/timetable.mp3'),
            'correct' => 'Timetable',
            'options' => ['Seats', 'Buffet car', 'Timetable', 'Bunk beds'],
        ],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])
