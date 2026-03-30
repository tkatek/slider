<?php
$content = [
    'page_title'    => 'Practice 3',
    'title'         => 'Practice 3: Listening',
    'subtitle'      => 'Match each speaker (1-4) with two sports and hobbies',

    'audio_src'     => materialAsset('slider/A1/Intermediate/chapter-1/audio/slide-8.mpeg'),
    'script'        => [
        'Speaker 1: I really enjoy ball games. My favourite is basketball. I play that every weekend with a big group of friends in the park. And a few months ago, I started a new sport: table tennis. Now I play it at the sports centre every Wednesday.',
        "Speaker 2: I love sport, but I'm not keen on ball games. I prefer individual activities. I do gymnastics twice a week at the local sports centre. And I do yoga at home, with my mum. We've got a DVD. We do it in the living room, in front of the TV!",
        "Speaker 3: I'm not a big fan of sport, but we have to do it at school. Last year, I chose climbing. I'm good at that, because I sometimes go with my dad at weekends. This year, I'm doing karate. I don't really enjoy it, but I'm good at it - because I'm strong!",
        "Speaker 4: I was born in Canada. Maybe that's why I like winter sports. I'm really good at skiing, because we go every year. And when I was five, I started ice skating. I really want to go to the Winter Olympics one year - just to watch. I'm not good enough to take part!",
    ],

    'desktop_game_width' => 68,
    'desktop_pool_width' => 32,

    'speaker_sport_placeholder' => 'sports',
    'speaker_hobby_placeholder' => 'hobby',

    'speakers' => [
        ['label' => 'Speaker 1:', 'sport_id' => 'speaker1Sport', 'hobby_id' => 'speaker1Hobby'],
        ['label' => 'Speaker 2:', 'sport_id' => 'speaker2Sport', 'hobby_id' => 'speaker2Hobby'],
        ['label' => 'Speaker 3:', 'sport_id' => 'speaker3Sport', 'hobby_id' => 'speaker3Hobby'],
        ['label' => 'Speaker 4:', 'sport_id' => 'speaker4Sport', 'hobby_id' => 'speaker4Hobby'],
    ],

    'bank' => [
        ['answer' => 'basketball',   'type' => 'sport'],
        ['answer' => 'table tennis', 'type' => 'sport'],
        ['answer' => 'gymnastics',   'type' => 'sport'],
        ['answer' => 'yoga',         'type' => 'hobby'],
        ['answer' => 'climbing',     'type' => 'sport'],
        ['answer' => 'karate',       'type' => 'hobby'],
        ['answer' => 'skiing',       'type' => 'sport'],
        ['answer' => 'ice skating',  'type' => 'hobby'],
    ],

    'speaker_answers' => [
        'speaker1' => ['basketball', 'table tennis'],
        'speaker2' => ['gymnastics', 'yoga'],
        'speaker3' => ['climbing', 'karate'],
        'speaker4' => ['skiing', 'ice skating'],
    ],
];
?>
@include("slider.game.drag-and-drop-blanks")
