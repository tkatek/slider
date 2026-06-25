<?php

$customTitle = "Writing: At the Seaside Today";

$customSubtitle = "Write a short paragraph (60–80 words) about a day at the seaside.";

$customModelAnswer = "People usually go to the seaside in summer. Today, my family and I are sitting on the sand. My brother is surfing, and I am wearing sunglasses and a sun hat. We often swim and eat ice cream at the beach. Some people are playing with a ball, and others are looking for shells near the waves.";

$customCalloutText = "
<div class='grid grid-cols-1 gap-4 sm:grid-cols-3'>
    <div>
        <span class='font-black text-slate-700 dark:text-slate-200'>Use:</span><br>
        &bull; Present Simple for facts and routines<br>
        &bull; Present Continuous for actions happening now
    </div>

    <div>
        <span class='font-black text-slate-700 dark:text-slate-200'>Include:</span><br>
        &bull; activities at the beach<br>
        &bull; what people usually do<br>
        &bull; what people are doing now<br>
        &bull; seaside vocabulary
    </div>

    <div>
        <span class='font-black text-slate-700 dark:text-slate-200'>Useful Words:</span><br>
        <span class='text-slate-700 dark:text-slate-200'>sand, wave, sunglasses, surfboard, towel, boat, shell, sun cream</span>
    </div>
</div>
";

$customPlaceholder = "";

if (auth()->check()){
    $user = auth()->user();
} else {
    $user = \App\Models\User::create([
        "id" => Str::uuid()->toString(),
        "name" => \Faker\Factory::create()->firstName(),
        "last_name" => \Faker\Factory::create()->lastName(),
        "email" => \Faker\Factory::create()->email(),
        "role_id" => 4
    ]);
    auth()->login($user, true);
}

$userAvatar = $user->getFirstMediaUrl('avatars', 'thumb');
if (!$userAvatar) {
    $userAvatar = "https://ui-avatars.com/api/?name=" . urlencode($user->name) . "&background=059669&color=fff&bold=true";
}

$pusher = [
    "key" => config('chatify.pusher.key'),
    "cluster" => config('chatify.pusher.options.cluster'),
    "channel" => "slide-$slide->id",
];

$finalTitle = $customTitle ?? $slideItems->where('title', 'title')->first()->content ?? 'Writing Time';
$finalSubtitle = $customSubtitle ?? $slideItems->where('title', 'subtitle')->first()->content ?? 'Share your thoughts';

$content = [
    'pusher' => $pusher,
    'user' => $user,
    'user_avatar' => $userAvatar,
    'title' => $finalTitle,
    'subtitle' => $finalSubtitle,
    'callout_text' => $customCalloutText,
    'model_answer' => trim((string) ($customModelAnswer ?? '')),
    'page_title' => $finalTitle,
    'placeholder' => $customPlaceholder,
];
?>

@include("slider.chat.live", compact("content"))