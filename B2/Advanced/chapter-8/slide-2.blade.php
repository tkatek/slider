{{-- Canva source page 2: https://canva.link/y4h0j64e7zqgakl --}}
@php
    $content = [
        'title' => 'Learning Objectives',
        'subtitle' => 'By the end of the lesson, students will be able to:',
        'type' => 'type4',
        'objectives' => [
            'Identify key life-saving inventions and explain the problems they were developed to address.',
            'Understand and use key vocabulary related to medical innovation, disease prevention and life expectancy.',
            'Identify the purpose and impact of life-saving inventions in a spoken and written text.',
            'Use to, in order to and so as to + infinitive accurately to express purpose.',
            'Use the Present Perfect and passive voice to describe the continuing impact of inventions.',
            'Evaluate the benefits and possible drawbacks of an innovation and support an opinion with reasons and examples.',
            'Write a well-organised 180–220-word descriptive essay about a life-saving invention.',
        ],
        'page_title' => 'Learning Objectives',
    ];
@endphp

@include('slider.other.learning-objectives', ['content' => $content])
