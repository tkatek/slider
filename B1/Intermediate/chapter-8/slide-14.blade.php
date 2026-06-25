<?php
$content = [
    'title'    => "Listening",
    'subtitle' => 'People are describing their friends.<br>What qualities are they talking about? Listen and choose the correct answer.',
    'type' => 'questions_only',

    'questions' => [
        [
            'prompt'  => '',
            'correct' => 'sense of humor',
            'options' => [
                'sense of humor',
                'sensitivity',
            ],
            'audio'   => materialAsset('slider/B1/Intermediate/chapter-8/audios/slide14/1.mp3'),
            'script'  => [
                'I really like Allison. She’s such fun to be with. She always makes me laugh. Did she tell you the story about her first date? I don’t think I’ve laughed so hard in my whole life!',
            ],
        ],
        [
            'prompt'  => '',
            'correct' => 'career goals',
            'options' => [
                'family background',
                'career goals',
            ],
            'audio'   => materialAsset('slider/B1/Intermediate/chapter-8/audios/slide14/2.mp3'),
            'script'  => [
                'I went out with this guy a couple of times, Ted Roberts. Maybe you know him. He’s okay, I guess, but the guy’s got no future. I think he just wants to spend the rest of his life surfing.',
            ],
        ],
        [
            'prompt'  => '',
            'correct' => 'social skills',
            'options' => [
                'social skills',
                'sense of humor',
            ],
            'audio'   => materialAsset('slider/B1/Intermediate/chapter-8/audios/slide14/3.mp3'),
            'script'  => [
                'Tony Lee asked me out the other night, and I said no. You know, he is really embarrassing to be with. Last time I went out to a party with him, he nearly got into a fight with someone. Then later on, he ended up spilling his drink all over me.',
            ],
        ],
        [
            'prompt'  => '',
            'correct' => 'family background',
            'options' => [
                'education',
                'family background',
            ],
            'audio'   => materialAsset('slider/B1/Intermediate/chapter-8/audios/slide14/4.mp3'),
            'script'  => [
                'I’ve been out with Sandra Bronstein a few times. She’s really an interesting person. I didn’t realize her father is a pretty well-known artist and her mother is a successful stockbroker. I’d like to meet her parents sometime. But I don’t think she’s too serious about me. She hasn’t invited me to meet them yet!',
            ],
        ],
        [
            'prompt'  => '',
            'correct' => 'appearance',
            'options' => [
                'appearance',
                'intelligence',
            ],
            'audio'   => materialAsset('slider/B1/Intermediate/chapter-8/audios/slide14/5.mp3'),
            'script'  => [
                'Do you know Rod, the guy in our Spanish class? Anyway, he’s invited me out on a date. You know the one I mean - he’s kind of thin, very tall, with long curly hair. Just my type!',
            ],
        ],
        [
            'prompt'  => '',
            'correct' => 'sense of humor',
            'options' => [
                'sense of humor',
                'appearance',
            ],
            'audio'   => materialAsset('slider/B1/Intermediate/chapter-8/audios/slide14/6.mp3'),
            'script'  => [
                'I was stuck with Martha at a dinner party the other day. No matter what I said, I couldn’t get her to smile. I wonder what her problem is.',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])