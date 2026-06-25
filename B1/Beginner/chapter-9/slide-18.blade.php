<?php
$customTitle = "Writing: Advice Corner";

$customSubtitle = "A friend wrote to you about a problem. Choose ONE problem and write 80–100 words giving advice.";

$customModelAnswer = "If I were you, I would make a study plan and review your lessons every day. I would also get enough sleep before the exam. If I were you, I wouldn't spend too much time on social media. You could ask your teacher for help if you have questions. Good luck! I'm sure you will do well.";

$customCalloutText = "
<div class='grid grid-cols-1 sm:grid-cols-2 gap-4 text-slate-800 dark:text-slate-100'>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='mb-3 text-sm font-bold uppercase tracking-wide text-slate-700 dark:text-slate-200'>
            Choose ONE Problem
        </p>

        <ul class='list-disc space-y-2 pl-5 text-sm leading-relaxed'>
            <li>I always arrive late to school.</li>
            <li>I spend too much time on my phone.</li>
            <li>I have an important exam next week.</li>
            <li>I want to make new friends.</li>
        </ul>
    </div>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='mb-3 text-sm font-bold uppercase tracking-wide text-slate-700 dark:text-slate-200'>
            Include
        </p>

        <ul class='space-y-2 text-sm leading-relaxed text-slate-700 dark:text-slate-200'>
            <li>At least 3 pieces of advice</li>
            <li>At least 2 sentences using \"If I were you...\"</li>
            <li>A friendly closing sentence</li>
        </ul>
    </div>

</div>";

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