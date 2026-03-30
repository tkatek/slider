<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'Travel Vocabulary',
    'subtitle'   => 'Travel Agency & Booking',

    'grid_class' => 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-5',

    'items' => [

        ['text'=>'Travel agent','subtitle'=>'a person who books trips','emoji'=>'🧳',
            'sound'=>materialAsset('slider/A1/Intermediate/chapter-8/audios/slide5/travel-agent.mp3'),
            'image'=>materialAsset('slider/A1/Intermediate/chapter-8/img/slide5/travel-agent.webp')],

        ['text'=>'Destination','subtitle'=>'a place you go on holiday','emoji'=>'🌍',
            'sound'=>materialAsset('slider/A1/Intermediate/chapter-8/audios/slide5/destination.mp3'),
            'image'=>materialAsset('slider/A1/Intermediate/chapter-8/img/slide5/destination.webp')],

        ['text'=>'Vacation / Holiday','subtitle'=>'a trip for fun','emoji'=>'🏝️',
            'sound'=>materialAsset('slider/A1/Intermediate/chapter-8/audios/slide5/vacation-holiday.mp3'),
            'image'=>materialAsset('slider/A1/Intermediate/chapter-8/img/slide5/vacation-holiday.webp')],

        ['text'=>'Book','subtitle'=>'to reserve something ahead of time','emoji'=>'📅',
            'sound'=>materialAsset('slider/A1/Intermediate/chapter-8/audios/slide5/book.mp3'),
            'image'=>materialAsset('slider/A1/Intermediate/chapter-8/img/slide5/book.webp')],

        ['text'=>'Ticket','subtitle'=>'document to travel (plane/train)','emoji'=>'🎫',
            'sound'=>materialAsset('slider/A1/Intermediate/chapter-8/audios/slide5/ticket.mp3'),
            'image'=>materialAsset('slider/A1/Intermediate/chapter-8/img/slide5/ticket.webp')],

        ['text'=>'Price / Cost','subtitle'=>'how much something is','emoji'=>'💰',
            'sound'=>materialAsset('slider/A1/Intermediate/chapter-8/audios/slide5/price-cost.mp3'),
            'image'=>materialAsset('slider/A1/Intermediate/chapter-8/img/slide5/price-cost.webp')],

        ['text'=>'Flight','subtitle'=>'the plane journey','emoji'=>'✈️',
            'sound'=>materialAsset('slider/A1/Intermediate/chapter-8/audios/slide5/flight.mp3'),
            'image'=>materialAsset('slider/A1/Intermediate/chapter-8/img/slide5/flight.webp')],

        ['text'=>'Departure / Return date','subtitle'=>'when you go / come back','emoji'=>'🗓️',
            'sound'=>materialAsset('slider/A1/Intermediate/chapter-8/audios/slide5/departure-return.mp3'),
            'image'=>materialAsset('slider/A1/Intermediate/chapter-8/img/slide5/departure-return.webp')],

        ['text'=>'Reservation','subtitle'=>'booking for travel or hotel','emoji'=>'📖',
            'sound'=>materialAsset('slider/A1/Intermediate/chapter-8/audios/slide5/reservation.mp3'),
            'image'=>materialAsset('slider/A1/Intermediate/chapter-8/img/slide5/reservation.webp')],

        ['text'=>'Package holiday','subtitle'=>'a set trip with several services together','emoji'=>'🏖️',
            'sound'=>materialAsset('slider/A1/Intermediate/chapter-8/audios/slide5/package-holiday.mp3'),
            'image'=>materialAsset('slider/A1/Intermediate/chapter-8/img/slide5/package-holiday.webp')],

        ['text'=>'Transfer','subtitle'=>'to move from one place to another','emoji'=>'🚐',
            'sound'=>materialAsset('slider/A1/Intermediate/chapter-8/audios/slide5/transfer.mp3'),
            'image'=>materialAsset('slider/A1/Intermediate/chapter-8/img/slide5/transfer.webp')],

        ['text'=>'Offer / Deal','subtitle'=>'price or option offered by travel agent','emoji'=>'🏷️',
            'sound'=>materialAsset('slider/A1/Intermediate/chapter-8/audios/slide5/offer-deal.mp3'),
            'image'=>materialAsset('slider/A1/Intermediate/chapter-8/img/slide5/offer-deal.webp')],

        ['text'=>'Excursion','subtitle'=>'a short trip for fun during a holiday','emoji'=>'🗺️',
            'sound'=>materialAsset('slider/A1/Intermediate/chapter-8/audios/slide5/excursion.mp3'),
            'image'=>materialAsset('slider/A1/Intermediate/chapter-8/img/slide5/excursion.webp')],

        ['text'=>'Per person','subtitle'=>'for each person','emoji'=>'👤',
            'sound'=>materialAsset('slider/A1/Intermediate/chapter-8/audios/slide5/per-person.mp3'),
            'image'=>materialAsset('slider/A1/Intermediate/chapter-8/img/slide5/per-person.webp')],

        ['text'=>'Accommodation','subtitle'=>'a place to stay on holiday','emoji'=>'🏨',
            'sound'=>materialAsset('slider/A1/Intermediate/chapter-8/audios/slide5/accommodation.mp3'),
            'image'=>materialAsset('slider/A1/Intermediate/chapter-8/img/slide5/accommodation.webp')],
    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])