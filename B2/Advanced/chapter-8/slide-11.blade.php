{{-- Canva source page 11: https://canva.link/y4h0j64e7zqgakl --}}
@php
    $content = [
        'title' => 'Infinitive of Purpose',
        'subtitle' => 'We use the infinitive of purpose to explain why something is used or designed.',
        'page_title' => 'Infinitive of Purpose',
    ];
@endphp

@extends('slider.simple-layout')
@section('style')
<style>
.lesson8 { max-width:1200px; margin:auto; padding:36px 24px; color:#1e293b; font-family:"Plus Jakarta Sans",sans-serif; }
.lesson8-grid { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:22px; }
.lesson8-card { min-width:0; padding:24px; border:1px solid #cbd5e1; border-radius:20px; background:#fff; box-shadow:0 12px 30px -25px #312e8166; }
.lesson8 h2 { margin:0 0 16px; color:#3730a3; font-size:23px; line-height:1.4; font-weight:800; }
.lesson8 > h2 { margin:28px 0 16px; }
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
<div class="lesson8-grid"><section class="lesson8-card"><h2>Form</h2><div class="lesson8-form"><span>to</span> + <span>base verb</span></div><ul><li>A defibrillator is used <strong>to restore</strong> a normal heartbeat.</li><li>Insulin therapy is used <strong>to treat</strong> diabetes.</li><li>Radiation therapy is used <strong>to treat</strong> cancer.</li></ul></section><section class="lesson8-card"><h2>Meaning</h2><p><strong>to + verb = purpose</strong></p><p>It answers the question: <strong>Why is it used?</strong></p><p>Q: Why is a defibrillator used?<br>A: <strong>To restore a normal heartbeat.</strong></p><p>The infinitive phrase tells us the purpose.</p></section></div><h2 class="mt-7">Examples from the video</h2><div class="lesson8-grid"><section class="lesson8-card"><h2>Antiseptics & Anaesthesia</h2><img class="mx-auto mb-4 h-32 w-full object-contain" src="{{ materialAsset('slider/B2/Advanced/chapter-8/img/slide11/surgery.webp') }}" alt="Antiseptics & Anaesthesia"><p>They are used <strong>to make</strong> surgery safer without causing pain.</p></section><section class="lesson8-card"><h2>Defibrillator & CPR</h2><img class="mx-auto mb-4 h-32 w-full object-contain" src="{{ materialAsset('slider/B2/Advanced/chapter-8/img/slide11/emergency-care.webp') }}" alt="Defibrillator & CPR"><p>They are used <strong>to save</strong> people during cardiac emergencies.</p></section><section class="lesson8-card"><h2>Seat Belts & Airbags</h2><img class="mx-auto mb-4 h-32 w-full object-contain" src="{{ materialAsset('slider/B2/Advanced/chapter-8/img/slide11/seat-belts.webp') }}" alt="Seat Belts & Airbags"><p>They are designed <strong>to reduce</strong> the risk of serious injury or death.</p></section><section class="lesson8-card"><h2>Organ Transplants & Artificial Organs</h2><img class="mx-auto mb-4 h-32 w-full object-contain" src="{{ materialAsset('slider/B2/Advanced/chapter-8/img/slide11/organs.webp') }}" alt="Organ Transplants & Artificial Organs"><p>They are used <strong>to give</strong> patients a second chance at life.</p></section><section class="lesson8-card"><h2>Vaccines</h2><img class="mx-auto mb-4 h-32 w-full object-contain" src="{{ materialAsset('slider/B2/Advanced/chapter-8/img/slide11/vaccines.webp') }}" alt="Vaccines"><p>They are used <strong>to prevent</strong> diseases and protect communities.</p></section><section class="lesson8-card"><h2>Insulin & Medical Treatments</h2><img class="mx-auto mb-4 h-32 w-full object-contain" src="{{ materialAsset('slider/B2/Advanced/chapter-8/img/slide11/insulin.webp') }}" alt="Insulin & Medical Treatments"><p>Insulin therapy is used <strong>to treat</strong> diabetes and help people live longer.</p></section><section class="lesson8-card"><h2>Telemedicine & Sanitation</h2><img class="mx-auto mb-4 h-32 w-full object-contain" src="{{ materialAsset('slider/B2/Advanced/chapter-8/img/slide11/telemedicine.webp') }}" alt="Telemedicine & Sanitation"><p>They are used <strong>to provide</strong> healthcare and prevent diseases.</p></section></div><div class="lesson8-grid mt-6"><section class="lesson8-card"><h2>Useful extensions</h2><div class="lesson8-form"><span>in order to</span> + <span>infinitive</span></div><p>Telemedicine is used <strong>in order to provide</strong> healthcare to remote communities.</p><div class="lesson8-form mt-5"><span>so as to</span> + <span>infinitive</span></div><p>Seat belts are designed <strong>so as to reduce</strong> the risk of serious injury.</p></section><section class="lesson8-card"><h2>Other useful grammar</h2><h3>Passive voice</h3><p>Focus on the invention: The defibrillator <strong>can be used</strong> in an emergency.</p><h3>Relative clauses: who / which</h3><p>Add information: The vaccine, <strong>which</strong> was developed over many years, has saved millions of lives.</p><h3>Modal verbs: can / may</h3><p>Show ability or possibility: This treatment <strong>can</strong> help patients live longer.</p></section></div><aside class="lesson8-note"><p><strong>Think!</strong> Which life-saving invention has had the greatest impact on humanity? And what invention could save even more lives in the future?</p></aside>
</main>
@endsection
