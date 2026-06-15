@php
    $content = [
        'page_title' => 'Listening Again',
        'title'      => 'Listening Again',
        'subtitle'   => 'Complete the sentences.',
        'audio'      => materialAsset('slider/B1/Beginner/chapter-6/audios/slide14.mp3'),

        'script' => [
            "Paul / England: I wish I was able to play the guitar to a high standard. I have recently bought a guitar; however, I'm not yet able to play. It's something I feel that is also kind of a social thing, where you can play music, which people will always respond to and enjoy.",

            "Tim / United States: I wish that I could sing. I can't sing very well, I feel, but there are a lot of people who think I would have a good singing voice. But since I'm not very confident with singing and never really try, I don't know how to get better. So, I wish I was just better at it automatically.",

            "Warren / Canada: I really wish I could speak some other languages. I studied French when I was a kid, and I actually have forgotten most of it now, so I would like to go back and learn that again. But I'd also be interested in learning some other languages as well.",
        ],

        'sentences' => [
            "<span class='inline-flex size-6 items-center justify-center rounded-full bg-blue-500 text-xs font-black text-white mr-2 align-middle'>1</span> Paul recently bought a {{1}}.",
            "<span class='inline-flex size-6 items-center justify-center rounded-full bg-pink-500 text-xs font-black text-white mr-2 align-middle'>2</span> People usually respond to and enjoy {{2}}.",
            "<span class='inline-flex size-6 items-center justify-center rounded-full bg-amber-500 text-xs font-black text-white mr-2 align-middle'>3</span> Tim thinks he might have a good {{3}} voice.",
            "<span class='inline-flex size-6 items-center justify-center rounded-full bg-emerald-500 text-xs font-black text-white mr-2 align-middle'>4</span> Tim never really tries to {{4}}.",
            "<span class='inline-flex size-6 items-center justify-center rounded-full bg-purple-500 text-xs font-black text-white mr-2 align-middle'>5</span> Warren studied {{5}} when he was a kid.",
            "<span class='inline-flex size-6 items-center justify-center rounded-full bg-rose-500 text-xs font-black text-white mr-2 align-middle'>6</span> Warren has forgotten most of it {{6}}.",
        ],

        'answers' => [
            'guitar',
            'music',
            'singing',
            'sing',
            'French',
            'now',
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")