<?php

$customTitle = "Writing Task";

$customSubtitle = "";

$customCalloutText = "
&bull; Write <span class='font-black'>3–4 sentences</span> about gadgets used at work.<br>
&bull; Choose <span class='font-black'>3 jobs</span> and describe the gadgets people use.<br>
&bull; Use <span class='font-black'>Present Simple</span> and <span class='font-black'>“to + verb”</span> for purpose.<br><br>

<span class='font-black text-blue-700 dark:text-blue-300'>Example:</span>
<span class='font-black text-blue-700 dark:text-blue-300'>A teacher uses a whiteboard to teach students.</span>
";

// Use \n for line breaks in the placeholder
$customPlaceholder = "A ....... uses a ....... to .......\nA ....... uses a ....... to .......\nI think this job is ....... because .......";

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