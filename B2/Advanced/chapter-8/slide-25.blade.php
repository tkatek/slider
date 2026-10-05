{{-- Canva source page 25: https://canva.link/y4h0j64e7zqgakl --}}
@php
    $content = [
        'title' => 'Model Answer',
        'subtitle' => 'A Small Invention, a Huge Impact',
        'page_title' => 'Model Answer',
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
<section class="lesson8-card"><h2>The Defibrillator</h2><div class="lesson8-reading"><p>Few medical inventions have had such a profound impact on human life as the defibrillator. Although it may look like a simple electronic device, it has become an essential tool in emergency medicine and can mean the difference between life and death.</p><p>A defibrillator is a portable machine with a screen, cables and two pads that are placed on a patient&#x27;s chest. It is designed to deliver a controlled electrical shock to the heart when someone suffers cardiac arrest. The device is used in order to restore a normal heartbeat as quickly as possible. In emergency situations, it can be operated by trained medical professionals so as to give the patient the best possible chance of survival.</p><p>The defibrillator has significantly changed emergency healthcare. It has enabled doctors and emergency responders to treat cardiac arrest immediately rather than waiting for the patient to reach hospital. As a result, many lives have been saved and survival rates have improved.</p><p>In my view, the defibrillator is one of the most valuable life-saving inventions ever developed. Without it, many people experiencing sudden cardiac arrest would have far fewer chances of survival. Its ability to provide immediate treatment makes it an essential invention that continues to save lives today.</p></div></section>
</main>
@endsection
