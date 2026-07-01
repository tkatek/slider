<?php
$customTitle = "Writing: A Brave Moment";

$customSubtitle = "Think of a time when you or someone you know showed bravery.";

$customModelAnswer = "Last year, I witnessed a brave situation when a classmate helped a younger student who was being bullied at school. At first, my classmate felt frightened because the bullies were older and stronger. He hesitated for a moment, but then he decided to stand up for the younger student and ask the bullies to stop. As a result, the bullies walked away, and the younger student felt safe and grateful. This experience taught me that bravery is not about being fearless; it is about doing the right thing even when you are afraid.";

$customCalloutText = "
<div class='grid grid-cols-1 gap-4 text-slate-800 dark:text-slate-100 lg:grid-cols-2'>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='text-sm font-bold leading-relaxed text-slate-900 dark:text-slate-100'>
            Write 80–100 words describing:
        </p>

        <ul class='mt-3 list-disc space-y-2 pl-5 text-sm leading-relaxed text-slate-700 dark:text-slate-200'>
            <li>What happened</li>
            <li>Why the person felt afraid</li>
            <li>What brave action was taken</li>
            <li>The result of the action</li>
            <li>What lesson was learned</li>
        </ul>
    </div>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='mb-3 text-sm font-bold leading-relaxed text-slate-900 dark:text-slate-100'>
            Useful Vocabulary Box
        </p>

        <div class='flex flex-wrap gap-2 text-sm leading-relaxed'>
            <span class='rounded-full bg-emerald-100 px-3 py-1 font-bold text-emerald-800 dark:bg-emerald-950 dark:text-emerald-200'>courage</span>
            <span class='rounded-full bg-emerald-100 px-3 py-1 font-bold text-emerald-800 dark:bg-emerald-950 dark:text-emerald-200'>bravery</span>
            <span class='rounded-full bg-emerald-100 px-3 py-1 font-bold text-emerald-800 dark:bg-emerald-950 dark:text-emerald-200'>determination</span>
            <span class='rounded-full bg-emerald-100 px-3 py-1 font-bold text-emerald-800 dark:bg-emerald-950 dark:text-emerald-200'>frightened</span>
            <span class='rounded-full bg-emerald-100 px-3 py-1 font-bold text-emerald-800 dark:bg-emerald-950 dark:text-emerald-200'>hesitate</span>
            <span class='rounded-full bg-emerald-100 px-3 py-1 font-bold text-emerald-800 dark:bg-emerald-950 dark:text-emerald-200'>inspire</span>
            <span class='rounded-full bg-emerald-100 px-3 py-1 font-bold text-emerald-800 dark:bg-emerald-950 dark:text-emerald-200'>help others</span>
            <span class='rounded-full bg-emerald-100 px-3 py-1 font-bold text-emerald-800 dark:bg-emerald-950 dark:text-emerald-200'>stay calm</span>
            <span class='rounded-full bg-emerald-100 px-3 py-1 font-bold text-emerald-800 dark:bg-emerald-950 dark:text-emerald-200'>lend a hand</span>
            <span class='rounded-full bg-emerald-100 px-3 py-1 font-bold text-emerald-800 dark:bg-emerald-950 dark:text-emerald-200'>teamwork</span>
        </div>
    </div>

</div>";

$customPlaceholder = "Write about a brave moment...";

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