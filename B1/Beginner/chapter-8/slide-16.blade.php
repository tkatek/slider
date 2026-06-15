<?php
// 1. MODIFY THESE TO CHANGE THE TEXT
$customTitle = "Writing Activity: If I Won the Lottery";

$customSubtitle = "Write 80–100 words about what you would do if you won the lottery.";

$customCalloutText = "
<div class='grid grid-cols-1 sm:grid-cols-2 gap-4 text-slate-800 dark:text-slate-100'>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='mb-3 text-sm font-bold uppercase tracking-wide text-emerald-600 dark:text-emerald-400'>
            Include
        </p>

        <ul class='list-disc space-y-2 pl-5 text-sm leading-relaxed'>
            <li>3 things you would buy</li>
            <li>1 person or group you would help</li>
            <li>1 thing you would save money for</li>
            <li>1 thing you would not do</li>
        </ul>

        <div class='mt-4 border-t border-slate-200 pt-3 dark:border-slate-700'>
            <p class='mb-1 text-sm font-semibold text-slate-900 dark:text-white'>
                Use the Second Conditional
            </p>
            <p class='text-sm text-slate-600 dark:text-slate-300'>
                If I won..., I would...
            </p>
        </div>
    </div>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='mb-3 text-sm font-bold uppercase tracking-wide text-emerald-600 dark:text-emerald-400'>
            Useful Language
        </p>

        <ul class='space-y-2 text-sm leading-relaxed text-slate-700 dark:text-slate-200'>
            <li>If I won the lottery, I would...</li>
            <li>I would buy...</li>
            <li>I would help...</li>
            <li>I would save some money for...</li>
            <li>I would not...</li>
            <li>I think it would be...</li>
        </ul>
    </div>

</div>";

$customPlaceholder = "If I won the lottery, I would buy a large house and a new car. I would also travel to different countries with my family. I would help poor children by giving money to charities. I would save some money in the bank for the future. I would not spend all my money at once because I would want to be careful with it.";

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