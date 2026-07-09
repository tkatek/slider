<?php

$customTitle = "The Detective's Final Report";

$customSubtitle = "A valuable object has disappeared. Write a report of 100–120 words.";

$customModelAnswer = "Last night, a valuable painting disappeared from the city museum. The thief must have entered through the hidden passage because all the doors and windows were locked. The security cameras couldn't have recorded the thief because the lights went out for a few seconds. The muddy footprints were an important clue, so the detectives must have followed them to the tunnel. It's possible that the thief had planned the robbery for several weeks. Perhaps someone inside the museum helped them. It's probable that the police will catch the thief soon because they have collected a lot of evidence. Maybe the next clue will help them solve the mystery completely.";

$customCalloutText = "
<div class='grid grid-cols-1 gap-4 text-slate-800 dark:text-slate-100 lg:grid-cols-2'>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='mb-3 text-sm font-bold uppercase tracking-wide text-slate-700 dark:text-slate-200'>
            Write a report explaining
        </p>

        <ul class='list-disc space-y-2 pl-5 text-sm leading-relaxed'>
            <li>what happened</li>
            <li>who might have been responsible</li>
            <li>which clues helped solve the mystery</li>
            <li>what you think will happen next</li>
        </ul>
    </div>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='mb-3 text-sm font-bold uppercase tracking-wide text-slate-700 dark:text-slate-200'>
            Remember to use
        </p>

        <div class='grid grid-cols-1 gap-2 text-sm leading-relaxed text-slate-700 dark:text-slate-200'>
            <p>✔ must have, might have, could have, or can't have</p>
            <p>✔ It's possible that..., It's probable that..., Perhaps..., Maybe...</p>

        </div>
    </div>

</div>";

$customPlaceholder = "Write your detective report here...";

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