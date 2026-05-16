<?php

$customTitle = "Writing: My English Learning Plan";

$customSubtitle = "Write 6–8 sentences about how you want to improve your English.";

$customCalloutText = "
<div class='grid gap-5 text-left lg:grid-cols-2'>
    <div>
        <div class='mb-2 text-base font-black text-slate-950 dark:text-slate-50'>
            Include:
        </div>

        <ul class='space-y-1.5 text-sm font-bold leading-relaxed text-slate-700 dark:text-slate-200 sm:text-base'>
            <li>&bull; the skills you want to improve</li>
            <li>&bull; daily habits you can do</li>
            <li>&bull; advice for yourself</li>
            <li>&bull; your future goal</li>
        </ul>
    </div>

    <div>
        <div class='mb-2 text-base font-black underline text-slate-950 dark:text-slate-50'>
            Useful Ideas
        </div>

        <ul class='space-y-1.5 text-sm font-bold leading-relaxed text-slate-700 dark:text-slate-200 sm:text-base'>
            <li>&bull; Speak English every day.</li>
            <li>&bull; Listen to podcasts.</li>
            <li>&bull; Read simple stories.</li>
            <li>&bull; Keep a journal.</li>
            <li>&bull; Don’t be afraid of mistakes.</li>
            <li>&bull; Practise pronunciation.</li>
            <li>&bull; Watch English videos.</li>
            <li>&bull; Stay consistent.</li>
        </ul>
    </div>
</div>
";

$customPlaceholder = "Model Answer

I want to improve my English speaking skills.
I will practise English every day.
I will listen to podcasts and watch English videos.
I will keep a small journal in English.
I will not be afraid of mistakes.
Step by step, I want to become more confident.
My goal is to speak English fluently in the future.";

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
    $userAvatar = "https://ui-avatars.com/api/?name=" . urlencode($user->name) . "&background=6366f1&color=fff&bold=true";
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