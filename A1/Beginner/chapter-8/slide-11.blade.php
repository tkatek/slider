<?php
$content = [
    'title'    => 'Practice Time!',
    'subtitle' => 'Choose the correct answer',
    'type' => 'audio',
    'audio' => materialAsset("slider/A1/Beginner/chapter-8/audios/slide-11.mp3"),

    'script' => [

        "Lena: I live in the city center. My office is very near my flat, so I walk to work. It only takes five minutes. I can walk to the shops too. But there isn't a supermarket in the city center, so I take the subway there. It's very convenient. I never use the bus. It's a little cheaper, but it's so slow. When I travel to other towns and cities, I use the train. I don't have a car, and I don't like buses and coaches.",

        "Paul: I live in a town about 15 miles from the city. My work is about 10 miles from my home. I go to work on my scooter. It's cheap and easy to park, but it's sometimes cold and wet, and that's not nice. I use my scooter to go to the shops in the supermarket and to visit friends. But for a night out, I take the train. Then I can enjoy some drinks. I never drink and ride. I don't have a car, but when I travel to other parts of the country, I often hire one.",

        "Holly: My college is about two miles from my house, so I go there by bike. I cycle to bars too, and I use my bike when I visit friends. But when I go to the supermarket, I take the bus. Then I don't have to carry lots of heavy bags a long way. When I visit friends in other towns and cities, I take the bus or a coach. It's slow, but it's really cheap, and I don't have much money. I never drive a car. I can't drive, and I never take taxis. They are too expensive for me.",
    ],

    'questions' => [
        ['prompt' => 'Who walks to work?', 'correct' => 'Lena',  'options' => ['Lena','Paul','Holly']],
        ['prompt' => 'Who rides a scooter to work?', 'correct' => 'Paul',  'options' => ['Lena','Paul','Holly']],
        ['prompt' => 'Who takes a bus or coach to buy food and visit friends?', 'correct' => 'Holly', 'options' => ['Lena','Paul','Holly']],
        ['prompt' => 'Who cycles to college?', 'correct' => 'Holly', 'options' => ['Lena','Paul','Holly']],
        ['prompt' => 'Who uses the subway to buy food?', 'correct' => 'Lena', 'options' => ['Lena','Paul','Holly']],
        ['prompt' => 'Who hires a car to visit other cities?', 'correct' => 'Paul', 'options' => ['Lena','Paul','Holly']],
        ['prompt' => 'Who takes the train when he goes out at night?', 'correct' => 'Paul', 'options' => ['Lena','Paul','Holly']],
    ],
];
?>
@include('slider.game.multi-choice-all-in-one', ['content' => $content])
