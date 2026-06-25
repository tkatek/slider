<?php
$customTitle = "Writing: A Brand You Know";

$customSubtitle = "Think of a brand you use or know well (for example: Nike, Samsung, Apple, Coca-Cola, or another brand)";

$customModelAnswer = "Apple is one of the most famous technology brands in the world. Today, it sells smartphones, computers, and other electronic products. Many people trust Apple because its products are easy to use and high quality. The brand also influences customers through its design and advertising. Apple started in 1976 when Steve Jobs and Steve Wozniak created the company. It became successful because it introduced innovative products. Today, Apple continues to attract millions of customers around the world.";

$customCalloutText = "
<div class='grid grid-cols-1 gap-4 text-slate-800 dark:text-slate-100 lg:grid-cols-2'>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='text-sm font-bold leading-relaxed text-slate-900 dark:text-slate-100'>
            Write 80–100 words about the brand. Include:
        </p>

        <ul class='mt-3 list-disc space-y-2 pl-5 text-sm leading-relaxed text-slate-700 dark:text-slate-200'>
            <li>What the brand sells today.</li>
            <li>Why people trust or like the brand.</li>
            <li>How the brand influences customers.</li>
            <li>Something about the brand's history or how it started.</li>
        </ul>

        <p class='mt-3 text-sm font-bold leading-relaxed text-slate-900 dark:text-slate-100'>
            Use both the Present Simple and the Past Simple.
        </p>
    </div>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='mb-3 text-sm font-bold leading-relaxed text-slate-900 dark:text-slate-100'>
            Helpful phrases:
        </p>

        <div class='grid grid-cols-1 gap-2 text-sm leading-relaxed text-slate-700 dark:text-slate-200'>
            <p>Today, the brand sells ...</p>
            <p>People trust the brand because ...</p>
            <p>The company started in ...</p>
            <p>It became popular because ...</p>
            <p>Now, it ...</p>
        </div>
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