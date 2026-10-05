{{-- Canva source page 14: https://canva.link/y4h0j64e7zqgakl --}}
@php
    $content = [
        'title' => 'Predict the Impact',
        'subtitle' => 'Which innovations have had the greatest impact on human life expectancy? Drag the innovations into the four categories.',
        'type' => 'image',
        'pool_item_type' => 'text',
        'show_category_labels' => true,
        'initial_visible_slots' => 3,
        'category_columns_xl' => 4,
        'categories' => [
            'Disease' => [
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide14/disease.webp'),
                'items' => [
                    'vaccines',
                    'antibiotics',
                    'sanitation',
                ],
            ],
            'Food' => [
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide14/food.webp'),
                'items' => [
                    'synthetic fertilisers',
                    'crop production',
                ],
            ],
            'Medicine' => [
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide14/medicine.webp'),
                'items' => [
                    'blood transfusions',
                    'pacemakers',
                    'radiology',
                ],
            ],
            'Future Technology' => [
                'image' => materialAsset('slider/B2/Advanced/chapter-8/img/slide14/future-technology.webp'),
                'items' => [
                    'AI',
                    'nanotechnology',
                    'renewable energy',
                ],
            ],
        ],
        'page_title' => 'Predict the Impact',
    ];
@endphp

@extends('slider.game.drag-and-drop')

@section('content')
@parent
<aside class="mx-auto grid max-w-6xl gap-4 px-4 pb-8 sm:grid-cols-2 lg:grid-cols-4" aria-label="About the categories">
    <p class="rounded-xl border border-rose-200 bg-rose-50 p-4 text-base text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200"><strong class="block mb-2">Disease</strong>Preventing and treating illness, keeping communities healthy.</p>
    <p class="rounded-xl border border-green-200 bg-green-50 p-4 text-base text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200"><strong class="block mb-2">Food</strong>Improving food production and availability.</p>
    <p class="rounded-xl border border-sky-200 bg-sky-50 p-4 text-base text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200"><strong class="block mb-2">Medicine</strong>Diagnosing, treating and managing health conditions.</p>
    <p class="rounded-xl border border-violet-200 bg-violet-50 p-4 text-base text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200"><strong class="block mb-2">Future Technology</strong>New ideas and technologies for a healthier tomorrow.</p>
</aside>
@endsection
