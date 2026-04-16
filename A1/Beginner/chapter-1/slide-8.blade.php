<?php
$content=[
    'title'=>'New Vocabulary',
    'subtitle'=>'Explore common professions and practice their pronunciation.',
];
$content['professions'] = [
    [
        'label' => "Doctor",
        'image' => materialAsset('slider/A1/Beginner/chapter-1/img/slide8/doctor.webp'),
        'sound' => materialAsset('slider/A1/Beginner/chapter-1/audios/vocab/doctor.mpeg'),
        'script' => "I’m a doctor. I work in a hospital. I help patients."
    ],
    [
        'label' => "Nurse",
        'image' => materialAsset('slider/A1/Beginner/chapter-1/img/slide8/nurse.webp'),
        'sound' => materialAsset('slider/A1/Beginner/chapter-1/audios/vocab/Nurse.mpeg'),
        'script' => "I’m a nurse. I work in a hospital or a clinic. I help patients too."
    ],
    [
        'label' => "Dentist",
        'image' => materialAsset('slider/A1/Beginner/chapter-1/img/slide8/dentist.webp'),
        'sound' => materialAsset('slider/A1/Beginner/chapter-1/audios/vocab/Dentist.mpeg'),
        'script' => "I’m a dentist. I work in a clinic. I treat decayed teeth."
    ],
    [
        'label' => "Pharmacist",
        'image' => materialAsset('slider/A1/Beginner/chapter-1/img/slide8/pharmacist.webp'),
        'sound' => materialAsset('slider/A1/Beginner/chapter-1/audios/vocab/Pharmacist.mpeg'),
        'script' => "I’m a pharmacist. I give medicine."
    ],
    [
        'label' => "Tutor",
        'image' => materialAsset('slider/A1/Beginner/chapter-1/img/slide8/tutor.webp'),
        'sound' => materialAsset('slider/A1/Beginner/chapter-1/audios/vocab/Tutor.mpeg'),
        'script' => "I’m a tutor. I teach online or offline."
    ],
    [
        'label' => "Electrician",
        'image' => materialAsset('slider/A1/Beginner/chapter-1/img/slide8/electrician.webp'),
        'sound' => materialAsset('slider/A1/Beginner/chapter-1/audios/vocab/Electrician.mpeg'),
        'script' => "I’m an electrician. I work with electricity."
    ],
    [
        'label' => "Plumber",
        'image' => materialAsset('slider/A1/Beginner/chapter-1/img/slide8/plumber.webp'),
        'sound' => materialAsset('slider/A1/Beginner/chapter-1/audios/vocab/Plumber.mpeg'),
        'script' => "I’m a plumber. I fix pipes."
    ],
    [
        'label' => "Carpenter",
        'image' => materialAsset('slider/A1/Beginner/chapter-1/img/slide8/carpenter.webp'),
        'sound' => materialAsset('slider/A1/Beginner/chapter-1/audios/vocab/Carpenter.mpeg'),
        'script' => "I’m a carpenter. I make wooden furniture."
    ],
    [
        'label' => "Firefighter",
        'image' => materialAsset('slider/A1/Beginner/chapter-1/img/slide8/firefighter.webp'),
        'sound' => materialAsset('slider/A1/Beginner/chapter-1/audios/vocab/Firefighter.mpeg'),
        'script' => "I’m a firefighter. I put out fires."
    ],
    [
        'label' => "A cook",
        'image' => materialAsset('slider/A1/Beginner/chapter-1/img/slide8/cook.webp'),
        'sound' => materialAsset('slider/A1/Beginner/chapter-1/audios/vocab/aCook.mp3'),
        'script' => "I’m a cook. I cook delicious meals."
    ],
    [
        'label' => "Barber",
        'image' => materialAsset('slider/A1/Beginner/chapter-1/img/slide8/barber.webp'),
        'sound' => materialAsset('slider/A1/Beginner/chapter-1/audios/vocab/Barber.mpeg'),
        'script' => "I’m a barber. I cut men’s hair."
    ],
    [
        'label' => "Hairdresser",
        'image' => materialAsset('slider/A1/Beginner/chapter-1/img/slide8/hairdresser.webp'),
        'sound' => materialAsset('slider/A1/Beginner/chapter-1/audios/vocab/Hairdresser.mpeg'),
        'script' => "I’m a hairdresser. I comb women’s hair."
    ]
];
?>
@include("slider.vocab.image-audio",['content'=>$content])