{{-- Canva source page 7: https://canva.link/y4h0j64e7zqgakl --}}
@php
    $content = [
        'title' => 'Life-Saving Innovations — Target Vocabulary',
        'subtitle' => 'Key words and phrases from the video.',
        'card_type' => 'image',
        'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4',
        'items' => [
            [
                'text' => 'innovation',
                'subtitle' => 'A new idea, method or technology that improves something.',
                'example' => 'medical innovation',
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide7/innovation.webp'),
                'sound' => materialAsset('slider/B2/Advanced/chapter-8/audios/slide7/innovation.mp3'),
            ],
            [
                'text' => 'life-saving',
                'subtitle' => 'Preventing death or helping someone survive.',
                'example' => 'life-saving invention',
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide7/life-saving.webp'),
                'sound' => materialAsset('slider/B2/Advanced/chapter-8/audios/slide7/life-saving.mp3'),
            ],
            [
                'text' => 'cardiac arrest',
                'subtitle' => 'When the heart suddenly stops functioning effectively.',
                'example' => 'suffer cardiac arrest',
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide7/cardiac-arrest.webp'),
                'sound' => materialAsset('slider/B2/Advanced/chapter-8/audios/slide7/cardiac-arrest.mp3'),
            ],
            [
                'text' => 'cushion the impact',
                'subtitle' => 'Reduce the force of a collision or blow.',
                'example' => 'cushion the impact',
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide7/cushion-the-impact.webp'),
                'sound' => materialAsset('slider/B2/Advanced/chapter-8/audios/slide7/cushion-the-impact.mp3'),
            ],
            [
                'text' => 'transplantation',
                'subtitle' => 'The medical process of replacing a damaged organ with a healthy one.',
                'example' => 'undergo transplantation',
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide7/transplantation.webp'),
                'sound' => materialAsset('slider/B2/Advanced/chapter-8/audios/slide7/transplantation.mp3'),
            ],
            [
                'text' => 'organ transplantation',
                'subtitle' => 'Replacing a damaged or failing organ with a healthy one.',
                'example' => 'organ transplantation',
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide7/organ-transplantation.webp'),
                'sound' => materialAsset('slider/B2/Advanced/chapter-8/audios/slide7/organ-transplantation.mp3'),
            ],
            [
                'text' => 'artificial organs',
                'subtitle' => 'Man-made devices or organs designed to replace or support the function of a natural organ.',
                'example' => 'artificial organs',
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide7/artificial-organs.webp'),
                'sound' => materialAsset('slider/B2/Advanced/chapter-8/audios/slide7/artificial-organs.mp3'),
            ],
            [
                'text' => 'survival rate',
                'subtitle' => 'The percentage of people who survive a disease or condition.',
                'example' => 'improve survival rates',
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide7/survival-rate.webp'),
                'sound' => materialAsset('slider/B2/Advanced/chapter-8/audios/slide7/survival-rate.mp3'),
            ],
            [
                'text' => 'sanitation',
                'subtitle' => 'Systems and practices for maintaining cleanliness and safely managing waste and sewage.',
                'example' => 'sanitation systems',
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide7/sanitation.webp'),
                'sound' => materialAsset('slider/B2/Advanced/chapter-8/audios/slide7/sanitation.mp3'),
            ],
            [
                'text' => 'preventable disease',
                'subtitle' => 'A disease that can be avoided through prevention.',
                'example' => 'prevent preventable diseases',
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide7/preventable-disease.webp'),
                'sound' => materialAsset('slider/B2/Advanced/chapter-8/audios/slide7/preventable-disease.mp3'),
            ],
            [
                'text' => 'life expectancy',
                'subtitle' => 'The average number of years a person is expected to live.',
                'example' => 'increase life expectancy',
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide7/life-expectancy.webp'),
                'sound' => materialAsset('slider/B2/Advanced/chapter-8/audios/slide7/life-expectancy.mp3'),
            ],
            [
                'text' => 'quality of life',
                'subtitle' => 'A person’s general level of health, comfort and well-being.',
                'example' => 'improve quality of life',
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide7/quality-of-life.webp'),
                'sound' => materialAsset('slider/B2/Advanced/chapter-8/audios/slide7/quality-of-life.mp3'),
            ],
        ],
        'page_title' => 'Life-Saving Innovations — Target Vocabulary',
    ];
@endphp

@extends('slider.vocab.image-card')
@section('style')
@parent
<style>.vocab-card > div:first-child { aspect-ratio:16/9; max-height:180px; }</style>
@endsection