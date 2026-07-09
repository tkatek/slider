<?php
$customTitle = "Writing Activity: The Missing Backpack";

$customSubtitle = "Write 80–100 words explaining what might have happened.";

$customModelAnswer = "Yesterday, a student left a backpack in the classroom. When they returned, it was missing. The student must have forgotten where they put it. A teacher could have moved it to the school office for safety. Another student might have picked it up by mistake because many bags look similar. However, it can’t have disappeared by itself. I think the most likely explanation is that someone found the backpack and took it to a safe place.";

$customCalloutText = "
<div class='grid grid-cols-1 gap-4 text-slate-800 dark:text-slate-100 lg:grid-cols-3'>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='text-sm font-black leading-relaxed text-slate-900 dark:text-slate-100'>
            Situation
        </p>

        <p class='mt-3 text-sm leading-relaxed text-slate-700 dark:text-slate-200'>
            A student left their backpack in the classroom. When they came back, it was gone.
        </p>
    </div>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='text-sm font-black leading-relaxed text-slate-900 dark:text-slate-100'>
            You must include
        </p>

        <ul class='mt-3 list-disc space-y-2 pl-5 text-sm leading-relaxed text-slate-700 dark:text-slate-200'>
            <li>80–100 words</li>
            <li>At least four past modals of deduction</li>
            <li><span class='font-black text-emerald-600 dark:text-emerald-300'>must have</span></li>
            <li><span class='font-black text-emerald-600 dark:text-emerald-300'>might have</span></li>
            <li><span class='font-black text-emerald-600 dark:text-emerald-300'>could have</span></li>
            <li><span class='font-black text-emerald-600 dark:text-emerald-300'>can’t have</span></li>
        </ul>
    </div>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='text-sm font-black leading-relaxed text-slate-900 dark:text-slate-100'>
            Sentence Starters
        </p>

        <div class='mt-3 grid grid-cols-1 gap-2 text-sm leading-relaxed text-slate-700 dark:text-slate-200'>
            <p>The backpack might have...</p>
            <p>Someone could have...</p>
            <p>The student must have...</p>
            <p>It can’t have...</p>
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
];
?>

@include("slider.chat.live", compact("content"))