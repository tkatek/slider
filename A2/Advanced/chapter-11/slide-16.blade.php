<?php
// 1. MODIFY THESE TO CHANGE THE TEXT
$customTitle = "Writing";

$customSubtitle = "You had a problem at a restaurant last weekend. Write a short complaint email to the restaurant manager.";

$customCalloutText = "

<div class='grid grid-cols-1 sm:grid-cols-2 gap-6'>
    <div>
        <span class='font-black text-yellow-500 dark:text-yellow-300'>Include:</span><br>
        &bull; where you went<br>
        &bull; what the problem was<br>
        &bull; what the waiter did<br>
        &bull; what you want the restaurant to do<br>
    </div>

    <div>
        <span class='font-black text-yellow-500 dark:text-yellow-300'>You can use these expressions:</span><br>
        &bull; I visited your restaurant on…<br>
        &bull; There was a problem with…<br>
        &bull; The food was…<br>
        &bull; The waiter…<br>
        &bull; I would like…<br>
    </div>
</div>

<br>

<span class='font-black text-yellow-500 dark:text-yellow-300'>Use 40–60 words.</span><br>";

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
