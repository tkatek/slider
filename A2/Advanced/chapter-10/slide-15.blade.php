<?php

$customTitle = "Writing: A Complaint to a Neighbour";

$customSubtitle = "Imagine your neighbours are very noisy. Write a short note (5-6 sentences) to complain politely.";

$customCalloutText = "
<div class='grid gap-5 text-left lg:grid-cols-2'>
    <div>
        <div class='mb-2 text-base font-black text-slate-950 dark:text-slate-50'>
            Include:
        </div>

        <ul class='space-y-1.5 text-sm font-bold leading-relaxed text-slate-700 dark:text-slate-200 sm:text-base'>
            <li>&bull; what the problem is</li>
            <li>&bull; when it happens</li>
            <li>&bull; how it makes you feel</li>
            <li>&bull; a polite request</li>
        </ul>
    </div>

    <div>
        <div class='mb-2 text-base font-black underline text-slate-950 dark:text-slate-50'>
            Useful Language
        </div>

        <ul class='space-y-1.5 text-sm font-bold leading-relaxed text-slate-700 dark:text-slate-200 sm:text-base'>
            <li>&bull; The music is too loud.</li>
            <li>&bull; I cannot sleep/study.</li>
            <li>&bull; Could you please be quieter?</li>
            <li>&bull; Please lower the music.</li>
            <li>&bull; Thank you for understanding.</li>
        </ul>
    </div>
</div>
";

$customPlaceholder = "Model Answer:\nThe music is too loud every night.\nCould you turn it down?\nThe dog keeps barking every morning.\nCan you keep it inside?";

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
