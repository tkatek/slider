<?php
// 1. MODIFY THESE TO CHANGE THE TEXT
$customTitle = "Writing";

$customSubtitle = "Write 80–100 words about something you would have done differently in the past.";

$customCalloutText = "
<div class='rounded-xl border border-slate-200 bg-white/70 p-4 text-slate-800 dark:border-slate-700 dark:bg-slate-900/40 dark:text-slate-100'>
    <p class='mb-3 text-sm font-bold uppercase tracking-wide text-emerald-600 dark:text-emerald-400'>
        Example
    </p>

    <p class='text-sm leading-relaxed text-slate-700 dark:text-slate-200'>
        When I was younger, I didn't spend enough time learning English. If I had studied English more seriously, I would have become more confident speaking it. I also didn't read many books in English. If I had read more, I would have improved my vocabulary faster. Sometimes I regret not practicing every day, but I have learned from my mistakes. If I had started earlier, I would have reached my goals sooner. Now I try to study regularly and make better decisions.
    </p>
</div>";

$customPlaceholder = ". . . . . . . . . ";

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

$finalTitle = $customTitle ?? $slideItems->where('title', 'title')->first()->content ?? '';
$finalSubtitle = $customSubtitle ?? $slideItems->where('title', 'subtitle')->first()->content ?? '';

$content = [
    'pusher' => $pusher,
    'user' => $user,
    'user_avatar' => $userAvatar,
    'title' => $finalTitle,
    'subtitle' => $finalSubtitle,
    'callout_text' => $customCalloutText,
    'page_title' => $finalTitle,
    'placeholder' => $customPlaceholder
];
?>

@include("slider.chat.live", compact("content"))