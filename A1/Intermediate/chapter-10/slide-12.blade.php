<?php
$content = [
    'page_title'    => 'Practice 4',
    'title'         => 'Practice 4',
    'subtitle'      => 'Match the pictures with the right airport vocabulary',
    'type' => 'image',
    'items_per_line' => 5,
    'items_per_line_mobile' => 1,
    'categories' => [
        'Boarding pass' => [
            'image' => materialAsset('slider/A1/Intermediate/chapter-11/img/slide7/boarding-pass.webp'),
            'items' => ['Boarding pass'],
        ],
        'Check-in desk' => [
            'image' => materialAsset('slider/A1/Intermediate/chapter-10/img/slide7/check-in.webp'),
            'items' => ['Check-in desk'],
        ],
        'Security check' => [
            'image' => materialAsset('slider/A1/Intermediate/chapter-11/img/slide7/step-forward.webp'),
            'items' => ['Security check'],
        ],
        'Departure gate' => [
            'image' => materialAsset('slider/A1/Intermediate/chapter-11/img/slide13/departure-gate.webp'),
            'items' => ['Departure gate'],
        ],
        'Boarding the plane' => [
            'image' => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/flight.webp'),
            'items' => ['Boarding the plane'],
        ],
        'Passenger' => [
            'image' => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/passenger.webp'),
            'items' => ['Passenger'],
        ],
        'Flight attendant' => [
            'image' => materialAsset('slider/A1/Intermediate/chapter-12/img/flight-attendant.webp'),
            'items' => ['Flight attendant'],
        ],
        'Suitcase' => [
            'image' => materialAsset('slider/A1/Intermediate/chapter-10/img/slide7/suitcase.webp'),
            'items' => ['Suitcase'],
        ],
        'Baggage claim' => [
            'image' => materialAsset('slider/A1/Intermediate/chapter-12/img/slide6/baggage-claim-reclaim.webp'),
            'items' => ['Baggage claim'],
        ],
    ],
];

?>
@include('slider.game.drag-and-drop', ['content' => $content])