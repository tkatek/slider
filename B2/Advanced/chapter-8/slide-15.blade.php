{{-- Canva source page 15: https://canva.link/y4h0j64e7zqgakl --}}
@php
    $content = [
        'title' => 'How Innovation Has Helped Us Live Longer',
        'subtitle' => 'Reading — Innovation and Human Life Expectancy',
        'page_title' => 'How Innovation Has Helped Us Live Longer',
    ];
@endphp

@extends('slider.simple-layout')
@section('style')
<style>
.lesson8 { max-width:1200px; margin:auto; padding:36px 24px; color:#1e293b; font-family:"Plus Jakarta Sans",sans-serif; }
.lesson8-grid { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:22px; }
.lesson8-card { min-width:0; padding:24px; border:1px solid #cbd5e1; border-radius:20px; background:#fff; box-shadow:0 12px 30px -25px #312e8166; }
.lesson8 h2 { margin:0 0 16px; color:#3730a3; font-size:23px; line-height:1.4; font-weight:800; }
.lesson8 h3 { margin:16px 0 8px; font-size:19px; font-weight:800; }
.lesson8 p,.lesson8 li,.lesson8 td,.lesson8 th { font-size:18px; line-height:1.7; }
.lesson8 p + p { margin-top:12px; }
.lesson8 ul { list-style:disc; padding-left:22px; }
.lesson8 li + li { margin-top:8px; }
.lesson8 strong,.lesson8 mark { color:#4338ca; font-weight:800; }
.lesson8 mark { background:#eef2ff; border-radius:4px; padding:2px 4px; }
.lesson8-form { display:flex; align-items:center; flex-wrap:wrap; justify-content:center; gap:12px; padding:20px; background:#eff6ff; border:1px solid #bfdbfe; border-radius:14px; font-size:21px; font-weight:800; margin-bottom:18px; }
.lesson8-form span { padding:10px 16px; border-radius:10px; background:white; color:#4338ca; }
.lesson8-note { padding:20px 24px; margin-top:22px; background:#fffbeb; border:1px solid #f6dfa0; border-radius:16px; }
.lesson8-table { width:100%; border-collapse:collapse; }
.lesson8-table th,.lesson8-table td { padding:12px; text-align:left; border-bottom:1px solid #cbd5e1; vertical-align:top; }
.lesson8-table th { color:#3730a3; }
.lesson8-wide { grid-column:1/-1; }
.lesson8-tabs { display:flex; flex-wrap:wrap; gap:10px; margin-bottom:22px; }
.lesson8-tabs button { padding:12px 16px; border:1px solid #c7d2fe; border-radius:12px; background:white; color:#334155; font-size:17px; font-weight:800; }
.lesson8-tabs button[aria-selected="true"] { background:#eef2ff; border-color:#4f46e5; color:#4338ca; }
.lesson8-tabs button:focus-visible { outline:3px solid #818cf8; outline-offset:3px; }
.lesson8 [hidden] { display:none; }
.lesson8-reading p { text-align:justify; }
.dark .lesson8 { color:#e2e8f0; }
.dark .lesson8-card { background:#141f30; border-color:#334155; }
.dark .lesson8 h2,.dark .lesson8 strong,.dark .lesson8-table th { color:#a5b4fc; }
.dark .lesson8 mark { background:#253451; color:#c7d2fe; }
.dark .lesson8-form { background:#1d3049; border-color:#334e70; }
.dark .lesson8-form span { background:#111e32; color:#c7d2fe; }
.dark .lesson8-note { background:#292419; border-color:#65532d; }
.dark .lesson8-table td,.dark .lesson8-table th { border-color:#334155; }
.dark .lesson8-tabs button { background:#141f30; border-color:#334155; color:#e2e8f0; }
.dark .lesson8-tabs button[aria-selected="true"] { background:#29365a; color:#c7d2fe; border-color:#818cf8; }
@media(max-width:800px) { .lesson8-grid { grid-template-columns:1fr; } }
@media(max-width:480px) { .lesson8 { padding:28px 16px; } .lesson8-card { padding:18px; } .lesson8 p,.lesson8 li,.lesson8 td,.lesson8 th { font-size:17px; } .lesson8-form { font-size:18px; gap:8px; padding:12px; } .lesson8-form span { padding:8px; } }
</style>
@endsection
@section('content')
<main class="lesson8">
@include('slider.components.title-subtitle')
<section class="lesson8-card"><h2>Innovation and Human Life Expectancy</h2><div class="lesson8-reading"><p>For much of human history, infection and contamination were major threats to people&#x27;s health. However, the period following the Industrial Revolution brought important innovations that improved people&#x27;s chances of surviving disease.</p><p>Developments such as blood transfusions, pasteurisation, antibiotics and sanitation helped control the spread of disease and reduce deaths. Better sanitation also provided cleaner living conditions and improved public health.</p><p>Innovation transformed food production too. Synthetic fertilisers, developed in 1909, increased crop production and contributed to the Green Revolution of the 1940s. This helped produce more food for a growing population.</p><p>Another major breakthrough was the development of vaccines. By the mid-twentieth century, vaccines were widely available and had helped reduce deaths from diseases such as measles, tuberculosis, smallpox and rubella.</p><p>The second half of the twentieth century brought further advances, including air-conditioning, car-safety technology, radiology and pacemakers. These innovations have improved safety, healthcare and quality of life.</p><p>Today, new technologies such as artificial intelligence, nanotechnology, genetic mapping and renewable energy could have an even greater impact. However, because many of them are still developing, their long-term effects are difficult to predict.</p><p>Innovation does not always have only positive consequences. For example, synthetic fertilisers have increased food production but have also contributed to environmental problems. An invention can therefore solve one problem while creating another.</p><p>Despite these challenges, humans will continue to innovate. As long as there are barriers to living longer and healthier lives, scientists and inventors will continue searching for solutions.</p></div></section>
</main>
@endsection
