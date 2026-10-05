{{-- Canva source page 21: https://canva.link/y4h0j64e7zqgakl --}}
@php
    $content = [
        'title' => 'Listening — True or False',
        'subtitle' => 'Listen again. Are the sentences true or false?',
        'type' => 'questions_only',
        'shuffle_options' => true,
        'questions' => [
            [
                'prompt' => 'Wingsuits allow people to fly or glide.',
                'options' => [
                    'True',
                    'False',
                ],
                'correct' => 'True',
            ],
            [
                'prompt' => 'Wingsuits are becoming more expensive.',
                'options' => [
                    'True',
                    'False',
                ],
                'correct' => 'False',
            ],
            [
                'prompt' => 'The solar water distiller uses sunlight to produce clean water.',
                'options' => [
                    'True',
                    'False',
                ],
                'correct' => 'True',
            ],
            [
                'prompt' => 'The Enable Talk gloves were designed to help people communicate using sign language.',
                'options' => [
                    'True',
                    'False',
                ],
                'correct' => 'True',
            ],
            [
                'prompt' => 'James Cameron invented the Deepsea Challenger submarine by himself.',
                'options' => [
                    'True',
                    'False',
                ],
                'correct' => 'False',
            ],
            [
                'prompt' => 'MIT students developed a special coating for bottles.',
                'options' => [
                    'True',
                    'False',
                ],
                'correct' => 'True',
            ],
            [
                'prompt' => 'The indoor-cloud invention was designed to produce clouds outdoors.',
                'options' => [
                    'True',
                    'False',
                ],
                'correct' => 'False',
            ],
            [
                'prompt' => 'The science correspondent describes the indoor-cloud invention as fascinating.',
                'options' => [
                    'True',
                    'False',
                ],
                'correct' => 'True',
            ],
        ],
        'audio' => materialAsset('slider/B2/Advanced/chapter-8/audios/tech-today-new-inventions.mp3'),
        'script' => [
            'Presenter: Welcome to Tech Today! This week is National Science and Engineering Week, so we’ve asked Jed, our science correspondent, to give us a round-up of some interesting inventions.',
            'Jed: Hi! Let’s start with something fun: wingsuits. They look like bats and allow people to fly, or at least glide. They’re certainly the ultimate in cool.',
            'Presenter: But they’re not very new, are they?',
            'Jed: No, but modern wingsuits are better than ever. Last October saw the first world championship in China, and prices are gradually coming down.',
            'Presenter: OK. What about some useful inventions?',
            'Jed: There are plenty. One is a solar water distiller designed by Gabriele Diamanti. It’s aimed at areas where people have difficulty getting clean drinking water. You put salty water into the device and let the sun do the work. A few hours later, you have clean water. It’s simple and relatively cheap to produce, although the designers still need investment to start full production.',
            'Presenter: That could make a real difference.',
            'Jed: Absolutely. Another useful invention is the Enable Talk glove, created by Ukrainian students. It helps people with speech and hearing impairments communicate with people who don’t understand sign language. Sensors translate sign language into text and then into spoken language using a smartphone.',
            'Presenter: A brilliant idea!',
            'Jed: Definitely. Another fascinating invention is the Deepsea Challenger submarine, designed by a team including engineer Ron Allum and film director James Cameron. It can descend around 10 kilometres to the deepest parts of the ocean. Cameron was the first person to make a solo dive there.',
            'Presenter: That sounds impressive.',
            'Jed: It is. We still know surprisingly little about the deep ocean.',
            'Presenter: And do you have one more invention for us?',
            'Jed: Yes — and this one solves a much smaller problem. Students at MIT developed a special coating for bottles. It makes things like ketchup, mustard and hair gel come out much more easily.',
            'Presenter: So, no more shaking the bottle for ten minutes!',
            'Jed: Exactly! Finally, there’s one of my favourites: a way of creating clouds indoors. A Dutch artist developed a method for forming small, white clouds inside buildings. It may not be very practical, but it certainly is fascinating.',
            'Presenter: Thanks, Jed. We’ll see you again next week!',
        ],
        'page_title' => 'Listening — True or False',
    ];
@endphp

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
