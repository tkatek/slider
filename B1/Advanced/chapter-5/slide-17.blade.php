@extends('slider.simple-layout')

@php
    $content = [
        'title'      => 'Reading Comprehension',
        'subtitle'   => 'Protecting the environment',

        'reading_title' => 'Our Responsibility',

        'passage' => [
            'The environment is essential for all living beings. However, human activities such as deforestation, pollution, and excessive waste production are harming the planet. If we do not take action, future generations will face serious problems, including climate change, water shortages, and loss of biodiversity.',
            'One of the most effective ways to protect the environment is by reducing waste. People should practice the three Rs: Reduce, Reuse, and Recycle. By using fewer plastic products, reusing items, and recycling materials, we can decrease pollution and conserve natural resources.',
            'Another important step is conserving energy. Simple actions like turning off lights when not in use, using public transportation, and choosing renewable energy sources can help reduce carbon emissions. Planting trees is also a great way to improve air quality and provide shelter for wildlife.',
            'Additionally, protecting water sources is crucial. People should avoid wasting water and prevent water pollution by properly disposing of harmful chemicals. Factories and industries must follow environmental regulations to keep rivers and oceans clean.',
            'Finally, spreading awareness is key. Students can participate in environmental campaigns, educate others, and make sustainable choices in their daily lives. Every small action matters, and together, we can create a healthier and greener planet.',
            'Taking care of the environment is not just a responsibility—it is a necessity. If we work together, we can ensure a sustainable future for ourselves and future generations.',
        ],
    ];
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full items-center justify-center overflow-x-hidden px-4 py-6 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="mx-auto w-full max-w-6xl">
            @include('slider.components.title-subtitle')

            <div class="mx-auto mt-6 w-full max-w-5xl rounded-[1.5rem] border border-slate-200 bg-white p-5 shadow-xl shadow-slate-200/70 dark:border-slate-700 dark:bg-slate-900 dark:shadow-slate-950/20 sm:p-7 lg:p-8">
                <h2 class="mb-4 text-center text-2xl font-black text-orange-400 dark:text-orange-300 sm:text-3xl">
                    {{ $content['reading_title'] }}
                </h2>

                <div class="space-y-3 text-left text-base font-black leading-relaxed text-slate-900 dark:text-slate-100 sm:text-lg lg:text-xl">
                    @foreach($content['passage'] as $paragraph)
                        <p>{!! $paragraph !!}</p>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection