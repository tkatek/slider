{{-- Canva source page 20: https://canva.link/y4h0j64e7zqgakl --}}
@php
    $content = [
        'title' => 'Tech Today — New Inventions',
        'subtitle' => 'Listen to the radio programme and do the exercises.',
        'audio' => materialAsset('slider/B2/Advanced/chapter-8/audios/tech-today-new-inventions.mp3'),
        'script' => [
            'Presenter: Welcome to Tech Today! This week is National Science and Engineering Week, so we’ve asked Jed, our science correspondent, to give us a round-up of some interesting inventions.',
            'Jed: Hi! Let’s start with something fun: wingsuits. They look like bats and allow people to fly, or at least glide. They’re certainly the ultimate in cool.',
            'Presenter: But they’re not very new, are they?',
            'Jed: No, but modern wingsuits are better than ever. Last October saw the first world championship in China, and prices are gradually coming down.',
            'Presenter: OK. What about some useful inventions?',
            'Jed: There are plenty. One is a solar water distiller designed by Gabriele Diamanti. It’s aimed at areas where people have difficulty getting clean drinking water. You put salty water into the device and let the sun do the work. A few hours later, you have clean water. It’s simple and relatively cheap to produce, although the designers still need investment to start full production.',
            'Presenter: That could make a real difference.',
            'Jed: Absolutely. Another useful invention is the Enable Talk glove, created by Ukrainian students. It helps people with speech and hearing impairments communicate with people who don’t understand sign language. Sensors translate sign language into text and then into spoken language using a smartphone.',
            'Presenter: A brilliant idea!',
            'Jed: Definitely. Another fascinating invention is the Deepsea Challenger submarine, designed by a team including engineer Ron Allum and film director James Cameron. It can descend around 10 kilometres to the deepest parts of the ocean. Cameron was the first person to make a solo dive there.',
            'Presenter: That sounds impressive.',
            'Jed: It is. We still know surprisingly little about the deep ocean.',
            'Presenter: And do you have one more invention for us?',
            'Jed: Yes — and this one solves a much smaller problem. Students at MIT developed a special coating for bottles. It makes things like ketchup, mustard and hair gel come out much more easily.',
            'Presenter: So, no more shaking the bottle for ten minutes!',
            'Jed: Exactly! Finally, there’s one of my favourites: a way of creating clouds indoors. A Dutch artist developed a method for forming small, white clouds inside buildings. It may not be very practical, but it certainly is fascinating.',
            'Presenter: Thanks, Jed. We’ll see you again next week!',
        ],
        'focus_note' => 'Which inventions solve practical problems, and which are mainly fun or fascinating?',
        'page_title' => 'Tech Today — New Inventions',
    ];
@endphp

@extends('slider.simple-layout')


@php
    $playerAudio = $content['audio'];
    $scriptLines = $content['script'];
    $hasScript = true;
@endphp
@section('style')
<style>
.inventions-listening { max-width:1200px; margin:auto; padding:36px 24px; color:#1e293b; }
.inventions-listening-card { margin-top:24px; padding:24px; background:white; border:1px solid #cbd5e1; border-radius:20px; }
.inventions-listening h2 { font-size:23px; line-height:1.4; font-weight:800; color:#3730a3; }
.inventions-listening p { font-size:18px; line-height:1.75; }
.inventions-notes { width:100%; margin-top:16px; padding:12px; border:1px solid #94a3b8; border-radius:12px; color:#0f172a; background:white; font-size:18px; }
.dark .inventions-listening { color:#e2e8f0; }
.dark .inventions-listening-card,.dark .inventions-notes { background:#141f30; color:#e2e8f0; border-color:#334155; }
.dark .inventions-listening h2 { color:#a5b4fc; }
@media(max-width:640px) { .inventions-listening { padding:28px 16px; } .inventions-listening-card { padding:18px; } }
</style>
@endsection
@section('content')
<main class="inventions-listening">
@include('slider.components.title-subtitle')
<section class="inventions-listening-card">@include('slider.components.audio-player')</section>
<section class="inventions-listening-card"><h2>Listen for the main ideas</h2><p class="mt-3">{{ $content['focus_note'] }}</p>
<label for="inventions-listening-notes" class="mt-5 block text-lg font-bold">What ideas did you hear?</label>
<textarea id="inventions-listening-notes" rows="5" class="inventions-notes" placeholder="Write a few notes…"></textarea></section>
</main>
@endsection
@section('script')
<script>
window.stopSlideAudio = () => {
 document.querySelectorAll('[data-audio-player-media]').forEach(audio => audio.pause());
 window.syncAudioPlayerUI?.();
};
window.addEventListener('pagehide', window.stopSlideAudio);
window.addEventListener('beforeunload', window.stopSlideAudio);
</script>
@endsection
