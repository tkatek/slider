@php
    $content = [
        'page_title' => 'Writing',
        'title' => 'Writing',
        'subtitle' => 'Drag & Drop the suitable phrase from the list in the box to fill in the spaces',

        'sentences' => [
            "<span class='mr-1 inline-block font-extrabold bg-gradient-to-r from-violet-700 via-fuchsia-500 to-yellow-400 bg-clip-text text-transparent'>A:</span> Where do you get the bus {{1}}?",
            "<span class='mr-1 inline-block font-extrabold bg-gradient-to-r from-violet-700 via-indigo-500 to-blue-400 bg-clip-text text-transparent'>B:</span> I don’t take the bus.",
            "<span class='mr-1 inline-block font-extrabold bg-gradient-to-r from-violet-700 via-fuchsia-500 to-yellow-400 bg-clip-text text-transparent'>A:</span> Oh. How do you {{2}}?",
            "<span class='mr-1 inline-block font-extrabold bg-gradient-to-r from-violet-700 via-indigo-500 to-blue-400 bg-clip-text text-transparent'>B:</span> I take the subway.",
            "<span class='mr-1 inline-block font-extrabold bg-gradient-to-r from-violet-700 via-fuchsia-500 to-yellow-400 bg-clip-text text-transparent'>A:</span> How often do you {{3}}?",
            "<span class='mr-1 inline-block font-extrabold bg-gradient-to-r from-violet-700 via-indigo-500 to-blue-400 bg-clip-text text-transparent'>B:</span> I take it every day.",
            "<span class='mr-1 inline-block font-extrabold bg-gradient-to-r from-violet-700 via-fuchsia-500 to-yellow-400 bg-clip-text text-transparent'>A:</span> How much {{4}}?",
            "<span class='mr-1 inline-block font-extrabold bg-gradient-to-r from-violet-700 via-indigo-500 to-blue-400 bg-clip-text text-transparent'>B:</span> It costs about \$50 a month.",
        ],
        'answers' => [
            'to school',
            'get to school',
            'take it',
            'does it cost',
        ],
    ];
@endphp

@include('slider.game.drag-and-drop-blanks', ['content' => $content])
