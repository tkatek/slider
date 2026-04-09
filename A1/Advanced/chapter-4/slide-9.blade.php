<?php
$content = [
    'page_title' => 'Listening',
    'title' => 'Practice 3',
    'subtitle' => 'People are talking about transportation. Listen and number the pictures.',
    'type' => 'audio',
    'option_type' => 'image',
    'audio' => materialAsset('slider/A1/Advanced/chapter-4/audios/slide9.mp3'),
    'shuffle_options' => false,
    'show_image_option_label' => false,
    'game_card_width' => 'max-w-6xl',
    'answer_panel_inner_class' => 'h-full w-full p-4 sm:p-5 lg:p-6 text-left',
    'image_option_tile_class' => 'mx-auto max-w-[10.5rem] sm:max-w-[11.25rem] lg:max-w-[12rem] aspect-[1.08]',
    'options_grid_class' => 'mt-4 grid grid-cols-2 gap-2 sm:mt-5 sm:grid-cols-3 sm:gap-4',
    'question_prompt_label' => 'Choose the correct picture:',
    'transport_options' => [
        [
            'value' => 'a',
            'label' => 'Bus',
            'image' => materialAsset('slider/A1/Advanced/chapter-4/img/slide9/bus.webp'),
            'alt'   => 'Bus',
        ],
        [
            'value' => 'b',
            'label' => 'Subway',
            'image' => materialAsset('slider/A1/Advanced/chapter-4/img/slide9/subway.webp'),
            'alt'   => 'Subway',
        ],
        [
            'value' => 'c',
            'label' => 'Train',
            'image' => materialAsset('slider/A1/Advanced/chapter-4/img/slide9/train.webp'),
            'alt'   => 'Train',
        ],
        [
            'value' => 'd',
            'label' => 'Plane',
            'image' => materialAsset('slider/A1/Advanced/chapter-4/img/slide9/plane.webp'),
            'alt'   => 'Plane',
        ],
        [
            'value' => 'e',
            'label' => 'Ferry',
            'image' => materialAsset('slider/A1/Advanced/chapter-4/img/slide9/ferry.webp'),
            'alt'   => 'Ferry',
        ],
        [
            'value' => 'f',
            'label' => 'Taxi',
            'image' => materialAsset('slider/A1/Advanced/chapter-4/img/slide9/taxi.webp'),
            'alt'   => 'Taxi',
        ],
    ],
    'script' => [

        '1',
        'A: Are all your subways this nice?',
        'B: Yeah. The city replaced all the subway cars last year.',
        'A: Wow!',
        '2',
        'A: How much is the fare?',
        'B: It\'s $2.50. Just put your money in the box right there.',
        'A: Oh, do you have change?',
        'B: No, you need the exact change.',
        '3',
        'A: Are you free?',
        'B: Sure. Hop in. Where to?',
        'A: The Central Hotel. Do you know where that is?',
        'B: Yeah. It\'s not far from here. About a 10-minute ride.',
        'A: Okay.',
        '4',
        'A: One ticket to Chicago, please.',
        'B: Yeah. Okay. That\'s $120.',
        'A: Does this one have a dining car?',
        'B: Yeah, there\'s a dining car and a snack bar. Here\'s your change.',
        'A: Thanks.',
        '5',
        'A: What time is the next shuttle flight to Boston?',
        'B: It leaves in 30 minutes.',
        'A: Is it too late to get a ticket?',
        'B: No, you still have plenty of time to make it.',
        'A: Great. And how long is the flight?',
        'B: It\'s about 45 minutes.',
        '6',
        'A: Is that our ferry?',
        'B: I think so.',
        'A: Wow! I didn\'t think it would be so big.',
        'B: Neither did I.',
    ],
    'questions' => [
        [
            'prompt' => 'Which picture matches dialogue 1?',
            'correct' => 'b',
        ],
        [
            'prompt' => 'Which picture matches dialogue 2?',
            'correct' => 'a',
        ],
        [
            'prompt' => 'Which picture matches dialogue 3?',
            'correct' => 'f',
        ],
        [
            'prompt' => 'Which picture matches dialogue 4?',
            'correct' => 'c',
        ],
        [
            'prompt' => 'Which picture matches dialogue 5?',
            'correct' => 'd',
        ],
        [
            'prompt' => 'Which picture matches dialogue 6?',
            'correct' => 'e',
        ],
    ],
];

$content['questions'] = array_map(
    static function (array $question) use ($content) {
        $question['options'] = $content['transport_options'];
        return $question;
    },
    $content['questions']
);

unset($content['transport_options']);
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])
