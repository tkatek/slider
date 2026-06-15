<?php
// 1. MODIFY THESE TO CHANGE THE TEXT
$customTitle = "Writing: Before It Happened...";

$customSubtitle = "Think About An Important Day";

$customCalloutText = "
<div class='grid grid-cols-1 gap-4 text-slate-800 dark:text-slate-100 lg:grid-cols-3'>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
                <p class='mb-3 text-sm font-bold uppercase tracking-wide text-emerald-600 dark:text-emerald-400'>
            Examples
        </p>

        <ul class='list-disc space-y-2 pl-5 text-sm leading-relaxed'>
            <li>a birthday party</li>
            <li>a school trip</li>
            <li>an exam day</li>
            <li>a family celebration</li>
        </ul>
    </div>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='mb-3 text-sm font-bold uppercase tracking-wide text-emerald-600 dark:text-emerald-400'>
            Writing Task
        </p>

        <ul class='space-y-2 text-sm leading-relaxed text-slate-700 dark:text-slate-200'>
            <li>✓ Write 80–100 words about what happened.</li>
            <li>✓ Use at least 3 Past Perfect sentences.</li>
            <li>✓ Use one of these words: <strong>before</strong>, <strong>after</strong>, <strong>by the time</strong>.</li>
        </ul>
    </div>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='mb-3 text-sm font-bold uppercase tracking-wide text-emerald-600 dark:text-emerald-400'>
            Useful Starters
        </p>

        <div class='grid grid-cols-1 gap-2 text-sm leading-relaxed text-slate-700 dark:text-slate-200'>
            <p>• Before I arrived, ...</p>
            <p>• By the time I..., ...</p>
            <p>• I had already...</p>
            <p>• I had never...</p>
            <p>• After I had..., ...</p>
        </div>
    </div>

</div>";

$customPlaceholder = "Last month, I had an important English exam. Before I arrived at school, I had reviewed my notes. I had also eaten breakfast and prepared my bag. By the time the exam started, I had finished all my revision. After I had completed the test, I felt relaxed and happy.";

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