<?php
// 1. MODIFY THESE TO CHANGE THE TEXT
$customTitle = "Writing: A Mistake I Learned From";

$customSubtitle = "Write 80–100 words about a mistake you made in the past.";

$customCalloutText = "
<div class='grid grid-cols-1 gap-4 text-slate-800 dark:text-slate-100 lg:grid-cols-3'>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='mb-3 text-sm font-bold uppercase tracking-wide text-emerald-600 dark:text-emerald-400'>
            Include
        </p>

        <ul class='list-disc space-y-2 pl-5 text-sm leading-relaxed'>
            <li>What happened</li>
            <li>Why it happened</li>
            <li>What you should have done differently</li>
            <li>What you learned from the experience</li>
        </ul>
    </div>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='mb-3 text-sm font-bold uppercase tracking-wide text-emerald-600 dark:text-emerald-400'>
            Writing Task
        </p>

        <ul class='space-y-2 text-sm leading-relaxed text-slate-700 dark:text-slate-200'>
            <li>✓ Write 80–100 words.</li>
            <li>✓ Use at least 2 examples of <strong>should have</strong>.</li>
            <li>✓ Use at least 1 example of <strong>shouldn't have</strong>.</li>
        </ul>
    </div>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='mb-3 text-sm font-bold uppercase tracking-wide text-emerald-600 dark:text-emerald-400'>
            Example Starters
        </p>

        <div class='grid grid-cols-1 gap-2 text-sm leading-relaxed text-slate-700 dark:text-slate-200'>
            <p>• I made a mistake when...</p>
            <p>• I should have...</p>
            <p>• I shouldn't have...</p>
            <p>• Looking back,...</p>
            <p>• I learned that...</p>
        </div>
    </div>

</div>";

$customPlaceholder = ". . . . . . .";

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
    'page_title' => $finalTitle,
    'placeholder' => $customPlaceholder
];
?>

@include("slider.chat.live", compact("content"))