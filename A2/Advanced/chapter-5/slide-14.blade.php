<?php
$content = [
    'page_title' => 'Listening',
    'title'      => 'Listening',
    'subtitle'   => 'Listen again and fill in the missing words, then act out the dialogue',
    'type'       => 'reading',

    'audio' => materialAsset('slider/A2/Advanced/chapter-5/audios/slide13/slide13.mp3'),

    'sentences' => [
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-blue-500 px-3 py-1 text-sm font-black text-white">A</span> Matt, have you {{1}} sung in a karaoke club?',
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 px-3 py-1 text-sm font-black text-white">B</span> No, but I&apos;ve {{2}} at a party. It was last year sometime. No, two years ago. At a birthday party.',
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-blue-500 px-3 py-1 text-sm font-black text-white">A</span> What did you sing?',
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 px-3 py-1 text-sm font-black text-white">B</span> I can&apos;t remember... Oh, yes - I did it my way. It was fun. I can&apos;t sing, but it was a {{3}} laugh. Why are you asking?',
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-blue-500 px-3 py-1 text-sm font-black text-white">A</span> I&apos;m going to a karaoke club tonight, and I&apos;m feeling very {{4}} about it.',
        '<span class="mr-2 inline-flex items-center rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 px-3 py-1 text-sm font-black text-white">B</span> You&apos;ll be all right. Just {{5}} and enjoy it!',
    ],

    'answers' => [
        'ever',
        'sung',
        'good',
        'nervous',
        'relax',
    ],

    'script' => [
        'Conversation 1',
        'A: Have you ever flown in a helicopter?',
        "B: No, I haven't. Have you?",
        'A: Yes, I have. Just once, when I went helicopter skiing - five years ago.',
        "B: That sounds interesting. What's helicopter skiing?",
        'A: A helicopter takes you up the mountain, and you ski from there.',
        'B: And how was it?',
        'A: It was fun. I enjoyed it.',
        '',
        'Conversation 2',
        'A: Matt, have you ever sung in a karaoke club?',
        "B: No, but I've sung at a party. It was last year sometime. No, two years ago. At a birthday party.",
        'A: What did you sing?',
        "B: I can't remember... Oh, yes - I did it my way. It was fun. I can't sing, but it was a good laugh. Why are you asking?",
        "A: I'm going to a karaoke club tonight, and I'm feeling very nervous about it.",
        "B: You'll be all right. Just relax and enjoy it!",
    ],
];
?>

@include('slider.game.drag-and-drop-blanks-v2', ['content' => $content])
