<?php

$customTitle = "Writing Task";

$customSubtitle = "Write about a job";

$customCalloutText = "
<span class='font-black text-yellow-500 dark:text-yellow-300'>Instructions:</span><br>
Write 4–5 sentences about a job you like or an unusual job.<br><br>

<span class='font-black text-yellow-500 dark:text-yellow-300'>Include:</span><br>
&bull; what the job is<br>
&bull; what people do<br>
&bull; why you like it<br><br>

<span class='font-black text-yellow-500 dark:text-yellow-300'>Use the model provided as a guide:</span>";

$customPlaceholder = "This job is ..........\nPeople ..........\nThey work to ..........\nThey also ..........\nI like / don’t like this job because ..........";

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