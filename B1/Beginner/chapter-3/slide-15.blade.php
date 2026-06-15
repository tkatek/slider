<?php

$customTitle = "Writing";

$customSubtitle = "You borrowed something from your friend and accidentally damaged it. Write a short apology message.";

$customCalloutText = "
<span class='font-black text-yellow-500 dark:text-yellow-300'>Include:</span><br>
&bull; what happened<br>
&bull; your apology<br>
&bull; how you feel<br>
&bull; your solution<br><br>

<span class='font-black text-yellow-500 dark:text-yellow-300'>Use:</span><br>
&bull; 50–70 words
";

$customPlaceholder = "Hi Omar,

I’m really sorry, but I accidentally dropped your headphones yesterday, and now
one side isn’t working properly. I feel terrible about it. I’d like to buy you a new pair
or pay for the repair.

Sorry again,

Ali";

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
    $userAvatar = "https://ui-avatars.com/api/?name=" . urlencode($user->name) . "&background=f97316&color=fff&bold=true";
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