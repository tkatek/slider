@php
    $content = [
        'page_title'    => 'Listen Again & Fill In The Blanks',
        'title'         => 'Listen Again & Fill In The Blanks',
        'subtitle'      => 'Complete the sentences with the correct word.',
        'audio'         => materialAsset('slider/B1/Beginner/chapter-2/audios/slide12.mp3'),

        'script'        => [
            "Sam: Hello. This is 6 Minute English . I’m Sam.",
            "Neil: And I’m Neil. Today we’re talking about kindness. Sam, when was the last time you did something kind?",
            "Sam: I gave my mum flowers last week.",
            "Neil: That was kind! How did it feel?",
            "Sam: It felt really good.",
            "Neil: Scientists say people feel happy when they are kind to others.",
            "Sam: Yes. Sometimes people do small kind things for strangers. These are called random acts of kindness.",
            "Neil: Like helping someone carry bags or giving someone a smile.",
            "Sam: Exactly. One study showed that giving a smile was the most common act of kindness.",
            "Neil: Psychologists say kindness gives us a warm glow — a happy feeling inside.",
            "Sam: Kindness and compassion can also help make society better.",
            "Neil: So remember: small acts of kindness can make a big difference.",
            "Sam: And they can make both people happy!",
        ],

        'sentences' => [
            "<span class='inline-block size-3 rounded-full bg-pink-500 mr-2 align-middle'></span> Sam gave her mum some {{1}}",
            "<span class='inline-block size-3 rounded-full bg-blue-500 mr-2 align-middle'></span> Scientists say kindness makes people feel {{2}}",
            "<span class='inline-block size-3 rounded-full bg-amber-500 mr-2 align-middle'></span> Small kind actions are called random acts of {{3}}",
            "<span class='inline-block size-3 rounded-full bg-violet-500 mr-2 align-middle'></span> A warm glow is a happy feeling {{4}}",
            "<span class='inline-block size-3 rounded-full bg-emerald-500 mr-2 align-middle'></span> Kindness can make society {{5}}",
        ],

        'answers' => [
            'flowers',
            'happy',
            'kindness',
            'inside',
            'better',
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")