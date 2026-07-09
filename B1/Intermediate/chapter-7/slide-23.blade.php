<?php
$customTitle = "Writing";

$customSubtitle = "Write a short paragraph (6–8 sentences) about your birth order and personality.";

$customModelAnswer = "I am the youngest child in my family. Youngest children usually grow up with less strict rules. I often get on well with my brothers and sisters. I can be social and funny, and I like meeting new people. I may sometimes depend on my older siblings, but I also learn from them. I usually try new things and enjoy taking small risks. I think my personality is friendly and open.";

$customCalloutText = "
<div class='grid grid-cols-1 gap-4 text-slate-800 dark:text-slate-100 lg:grid-cols-2'>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='text-sm font-bold leading-relaxed text-slate-900 dark:text-slate-100'>
            Include:
        </p>

        <ul class='mt-3 list-disc space-y-2 pl-5 text-sm leading-relaxed text-slate-700 dark:text-slate-200'>
            <li>Your position in the family (firstborn / middle / youngest / only child)</li>
            <li>Personality adjectives</li>
            <li>Present Simple</li>
            <li><strong>may</strong> / <strong>can</strong></li>
            <li>Words like: <strong>usually</strong>, <strong>often</strong>, <strong>sometimes</strong></li>
        </ul>
    </div>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='mb-3 text-sm font-bold leading-relaxed text-slate-900 dark:text-slate-100'>
            Help Box
        </p>

        <div class='grid grid-cols-1 gap-2 text-sm leading-relaxed text-slate-700 dark:text-slate-200'>
            <p>You can use:</p>
            <p>responsible, independent, creative, social, organized, confident</p>
            <p>get on well with</p>
            <p>may feel / can become / usually / often / sometimes</p>
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