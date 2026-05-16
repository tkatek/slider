<?php
// 1. MODIFY THESE TO CHANGE THE TEXT
$customTitle = "Writing";

$customSubtitle = "Complaining About a Roommate";

$customCalloutText = "

<span class='font-black text-yellow-500 dark:text-yellow-300'>Write 5–6 sentences about an annoying roommate, friend, or family member.</span><br><br>

<div class='grid grid-cols-1 sm:grid-cols-2 gap-6'>
    <div>
        <span class='font-black text-yellow-500 dark:text-yellow-300'>Use:</span><br>
        &bull; always + present continuous<br>
        &bull; complaint adjectives<br>
        &bull; vocabulary from the lesson<br>
    </div>

    <div>
        <span class='font-black text-yellow-500 dark:text-yellow-300'>Example:</span><br>
        My roommate is always leaving dirty dishes in the kitchen.<br>
        She’s very messy and inconsiderate.<br>
        She’s always making noise at night.<br>
        It really annoys me.<br>
    </div>
</div>";

$customPlaceholder = ".....";

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
