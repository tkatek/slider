<?php

$customTitle = "Writing";

$customSubtitle = "Write a short review of a movie, show, concert, or game.";

$customCalloutText = "
<span class='font-black text-yellow-500 dark:text-yellow-300'>Include:</span><br>
&bull; what it was<br>
&bull; what happened<br>
&bull; your opinion<br>
&bull; Why you prefer it<br><br>

<span class='font-black text-yellow-500 dark:text-yellow-300'>Use:</span><br>
&bull; 60–80 words<br>
&bull; the provided model as a guide
";

$customPlaceholder = "I recently watched a comedy movie called Night at the Museum. The story was about a security guard who discovered that the museum characters came alive at night. Many funny and exciting events happened during the movie. I really enjoyed the film because it was entertaining and full of adventure. The actors were also very good. I would definitely recommend this movie to anyone who enjoys comedy and family-friendly entertainment.";

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