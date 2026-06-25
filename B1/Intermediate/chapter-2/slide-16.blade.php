<?php
$customTitle = "Writing Task: What Happened?";

$customSubtitle = "Look at the picture and write 80–100 words about what you think happened.";

$customModelAnswer = "When I arrived home, the front door was open. Someone must have come into the house recently. It might have been my brother because the lights were on. He could have forgotten to close the door when he left. It can't have been a stranger because nothing was missing. I think my family must have gone out in a hurry.";

$customCalloutText = "
<div class='grid grid-cols-1 gap-4 text-slate-800 dark:text-slate-100 lg:grid-cols-2'>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='mb-3 text-sm font-bold uppercase tracking-wide text-slate-700 dark:text-slate-200'>
            Situation
        </p>

        <p class='mb-3 text-sm font-bold leading-relaxed'>
            You arrive home and see:
        </p>

        <ul class='list-disc space-y-2 pl-5 text-sm leading-relaxed'>
            <li>The front door is open.</li>
            <li>The lights are on.</li>
            <li>There is a wet umbrella by the door.</li>
            <li>Nobody is at home.</li>
        </ul>
    </div>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='mb-3 text-sm font-bold uppercase tracking-wide text-slate-700 dark:text-slate-200'>
            Use at least four of these expressions
        </p>

        <div class='grid grid-cols-1 gap-2 text-sm leading-relaxed text-slate-700 dark:text-slate-200'>
            <p>• <strong>must have</strong></p>
            <p>• <strong>might have</strong></p>
            <p>• <strong>could have</strong></p>
            <p>• <strong>can't have</strong></p>
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
    'image' => materialAsset('slider/B1/Intermediate/chapter-2/img/slide9.webp'),
];
?>

@include("slider.chat.live", compact("content"))