<?php

$customTitle = "Writing";
$customSubtitle = "Write a short paragraph (5-6 sentences) about a communication problem.";

$customCalloutText = "
<div class='grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-2 text-sm sm:text-base leading-snug'>
    <div>
        <span class='font-black text-yellow-500 dark:text-yellow-300'>Instructions</span>
        <span class='font-black'> — Write about:</span><br>
        &bull; who you were talking to<br>
        &bull; what the problem was<br>
        &bull; what you could / couldn't do<br>
        &bull; how you solved the problem
    </div>

    <div>
        <span class='font-black text-yellow-500 dark:text-yellow-300'>Use:</span><br>
        &bull; can / can't<br>
        &bull; too / very<br>
        &bull; at least 2 expressions<br>
        <span class='text-xs sm:text-sm opacity-80'>(e.g. I can't hear you, call back, weak signal)</span>
    </div>
</div>";

// Use \n for line breaks in the placeholder
$customPlaceholder = "Yesterday, I was talking to ........\nI couldn't ........ because ........\nThe connection ........\nSo, I decided to ........\nFinally, ........";

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