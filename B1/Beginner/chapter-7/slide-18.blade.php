<?php
$customTitle = "Writing: My Three Wishes";

$customSubtitle = "Write a short paragraph (80–100 words).";

$customCalloutText = "
<p class='mb-3 font-black text-slate-900 dark:text-slate-100'>Include:</p>

<ul class='list-disc space-y-2 pl-6 text-slate-800 dark:text-slate-100'>
    <li>one skill you wish you could learn</li>
    <li>one language you wish you could speak</li>
    <li>one talent you wish you had</li>
</ul>";

$customPlaceholder = "I wish I could play the piano. I also wish I could speak Spanish because I would like to travel to Spain. Finally, I wish I could draw well because I enjoy art. I think learning new skills makes life more interesting and helps people communicate with others.";

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
    'page_title' => $finalTitle,
    'placeholder' => $customPlaceholder
];
?>

@include("slider.chat.live", compact("content"))