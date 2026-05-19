<?php
$content = [

    'title'      => 'New Vocabulary',
    'subtitle'   => 'Explore common professions and practice their pronunciation.',
    'grid_class' => 'grid-cols-2 sm:grid-cols-4 xl:grid-cols-6',
    'hide_card_subtitle' => true,
    'popup' => 'text',
    'image_text_style' => 'overlay',


    'items' => [
        [
            'text'     => "Doctor",
            'image'    => materialAsset('slider/A1/Beginner/chapter-1/img/slide8/doctor.webp'),
            'sound'    => materialAsset('slider/A1/Beginner/chapter-1/audios/vocab/doctor.mpeg'),
            'subtitle' => "I’m a doctor. I work in a hospital. I help patients.",
        ],
        [
            'text'     => "Nurse",
            'image'    => materialAsset('slider/A1/Beginner/chapter-1/img/slide8/nurse.webp'),
            'sound'    => materialAsset('slider/A1/Beginner/chapter-1/audios/vocab/Nurse.mpeg'),
            'subtitle' => "I’m a nurse. I work in a hospital or a clinic. I help patients too.",
        ],
        [
            'text'     => "Dentist",
            'image'    => materialAsset('slider/A1/Beginner/chapter-1/img/slide8/dentist.webp'),
            'sound'    => materialAsset('slider/A1/Beginner/chapter-1/audios/vocab/Dentist.mpeg'),
            'subtitle' => "I’m a dentist. I work in a clinic. I treat decayed teeth.",
        ],
        [
            'text'     => "Pharmacist",
            'image'    => materialAsset('slider/A1/Beginner/chapter-1/img/slide8/pharmacist.webp'),
            'sound'    => materialAsset('slider/A1/Beginner/chapter-1/audios/vocab/Pharmacist.mpeg'),
            'subtitle' => "I’m a pharmacist. I give medicine.",
        ],
        [
            'text'     => "Tutor",
            'image'    => materialAsset('slider/A1/Beginner/chapter-1/img/slide8/tutor.webp'),
            'sound'    => materialAsset('slider/A1/Beginner/chapter-1/audios/vocab/Tutor.mpeg'),
            'subtitle' => "I’m a tutor. I teach online or offline.",
        ],
        [
            'text'     => "Electrician",
            'image'    => materialAsset('slider/A1/Beginner/chapter-1/img/slide8/electrician.webp'),
            'sound'    => materialAsset('slider/A1/Beginner/chapter-1/audios/vocab/Electrician.mpeg'),
            'subtitle' => "I’m an electrician. I work with electricity.",
        ],
        [
            'text'     => "Plumber",
            'image'    => materialAsset('slider/A1/Beginner/chapter-1/img/slide8/plumber.webp'),
            'sound'    => materialAsset('slider/A1/Beginner/chapter-1/audios/vocab/Plumber.mpeg'),
            'subtitle' => "I’m a plumber. I fix pipes.",
        ],
        [
            'text'     => "Carpenter",
            'image'    => materialAsset('slider/A1/Beginner/chapter-1/img/slide8/carpenter.webp'),
            'sound'    => materialAsset('slider/A1/Beginner/chapter-1/audios/vocab/Carpenter.mpeg'),
            'subtitle' => "I’m a carpenter. I make wooden furniture.",
        ],
        [
            'text'     => "Firefighter",
            'image'    => materialAsset('slider/A1/Beginner/chapter-1/img/slide8/firefighter.webp'),
            'sound'    => materialAsset('slider/A1/Beginner/chapter-1/audios/vocab/Firefighter.mpeg'),
            'subtitle' => "I’m a firefighter. I put out fires.",
        ],
        [
            'text'     => "A cook",
            'image'    => materialAsset('slider/A1/Beginner/chapter-1/img/slide8/cook.webp'),
            'sound'    => materialAsset('slider/A1/Beginner/chapter-1/audios/vocab/aCook.mp3'),
            'subtitle' => "I’m a cook. I cook delicious meals.",
        ],
        [
            'text'     => "Barber",
            'image'    => materialAsset('slider/A1/Beginner/chapter-1/img/slide8/barber.webp'),
            'sound'    => materialAsset('slider/A1/Beginner/chapter-1/audios/vocab/Barber.mpeg'),
            'subtitle' => "I’m a barber. I cut men’s hair.",
        ],
        [
            'text'     => "Hairdresser",
            'image'    => materialAsset('slider/A1/Beginner/chapter-1/img/slide8/hairdresser.webp'),
            'sound'    => materialAsset('slider/A1/Beginner/chapter-1/audios/vocab/Hairdresser.mpeg'),
            'subtitle' => "I’m a hairdresser. I comb women’s hair.",
        ],
    ],
];
?>

@include("slider.vocab.image-card", ['content' => $content])
