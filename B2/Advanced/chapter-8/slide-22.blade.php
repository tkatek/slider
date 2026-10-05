{{-- Canva source page 22: https://canva.link/y4h0j64e7zqgakl --}}
@php
    $content = [
        'title' => 'Listening — Complete the Gaps',
        'subtitle' => 'Listen and write the missing word or words.',
        'inline_answers' => true,
        'hide_hints' => true,
        'storage_version' => 'life-expectancy-v1',
        'questions' => [
            [
                'prefix' => 'Wingsuits allow people to fly, or at least',
                'suffix' => '.',
                'answers' => [
                    'glide',
                ],
            ],
            [
                'prefix' => 'Modern wingsuits are better than ever, and their prices are gradually coming',
                'suffix' => '.',
                'answers' => [
                    'down',
                ],
            ],
            [
                'prefix' => 'The solar water distiller helps people get clean',
                'suffix' => 'water.',
                'answers' => [
                    'drinking',
                ],
            ],
            [
                'prefix' => 'The designers still need',
                'suffix' => 'to start full production.',
                'answers' => [
                    'investment',
                ],
            ],
            [
                'prefix' => 'The Enable Talk gloves were created by Ukrainian',
                'suffix' => '.',
                'answers' => [
                    'students',
                ],
            ],
            [
                'prefix' => 'The gloves use sensors to translate sign language into',
                'suffix' => 'and then into spoken language.',
                'answers' => [
                    'text',
                ],
            ],
            [
                'prefix' => 'The Deepsea Challenger can descend around',
                'suffix' => 'kilometres to the deepest parts of the ocean.',
                'answers' => [
                    '10',
                    'ten',
                ],
            ],
            [
                'prefix' => 'James Cameron was the first person to make a solo',
                'suffix' => 'there.',
                'answers' => [
                    'dive',
                ],
            ],
            [
                'prefix' => 'MIT students developed a special',
                'suffix' => 'for bottles.',
                'answers' => [
                    'coating',
                ],
            ],
            [
                'prefix' => 'The coating makes ketchup, mustard and other liquids come out more',
                'suffix' => '.',
                'answers' => [
                    'easily',
                ],
            ],
            [
                'prefix' => 'A Dutch',
                'suffix' => 'developed a method for creating clouds indoors.',
                'answers' => [
                    'artist',
                ],
            ],
            [
                'prefix' => 'The indoor-cloud invention may not be very',
                'suffix' => ', but it is fascinating.',
                'answers' => [
                    'practical',
                ],
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
        'page_title' => 'Listening — Complete the Gaps',
    ];
@endphp

@include('slider.game.type-correct-format', ['content' => $content])
