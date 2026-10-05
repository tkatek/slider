{{-- Canva source page 9: https://canva.link/y4h0j64e7zqgakl --}}
@php
    $content = [
        'title' => 'Life-Saving Innovations — Collocations',
        'subtitle' => 'Drag each word into the correct phrase.',
        'sentences' => [
            '1. medical {{1}}',
            '2. life-saving {{2}}',
            '3. suffer cardiac {{3}}',
            '4. cushion the {{4}}',
            '5. organ {{5}}',
            '6. artificial {{6}}',
            '7. improve {{7}} rates',
            '8. increase life {{8}}',
        ],
        'answers' => [
            'innovation',
            'invention',
            'arrest',
            'impact',
            'transplantation',
            'organs',
            'survival',
            'expectancy',
        ],
        'shuffle_bank' => true,
        'bank_layout' => 'all',
        'page_title' => 'Life-Saving Innovations — Collocations',
    ];
@endphp

@include('slider.game.drag-and-drop-blanks', ['content' => $content])
