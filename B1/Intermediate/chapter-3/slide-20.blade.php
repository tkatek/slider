<?php
$customTitle = "Writing: Future Predictions";

$customSubtitle = "Imagine you are a technology expert in the year 2026. Write a paragraph (80–100 words) about how life might change by 2050.";

$customModelAnswer = "I think life will be very different by 2050. People will probably travel in self-driving vehicles because technology is improving quickly. Schools may use virtual reality classrooms, so students can learn from anywhere. AI could help doctors diagnose illnesses faster and more accurately. Many people might work from home because advanced technology will make communication easier. I definitely believe that technology will continue to change the way we live, work, and learn.";

$customCalloutText = "
<div class='grid grid-cols-1 gap-4 text-slate-800 dark:text-slate-100 lg:grid-cols-3'>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='mb-3 text-sm font-bold uppercase tracking-wide text-slate-700 dark:text-slate-200'>
            Include
        </p>

        <ul class='list-disc space-y-2 pl-5 text-sm leading-relaxed'>
            <li>At least <strong>THREE predictions</strong> about the future.</li>
            <li>At least <strong>ONE reason</strong> for each prediction.</li>
            <li>Ideas about how life might change by <strong>2050</strong>.</li>
        </ul>
    </div>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='mb-3 text-sm font-bold uppercase tracking-wide text-slate-700 dark:text-slate-200'>
            Future Prediction Language
        </p>

        <ul class='space-y-2 text-sm leading-relaxed text-slate-700 dark:text-slate-200'>
            <li>Use <strong>will</strong></li>
            <li>Use <strong>may</strong> / <strong>might</strong></li>
            <li>Use <strong>could</strong></li>
            <li>Use <strong>probably</strong> / <strong>definitely</strong></li>
        </ul>
    </div>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='mb-3 text-sm font-bold uppercase tracking-wide text-slate-700 dark:text-slate-200'>
            Questions to Help You
        </p>

        <div class='grid grid-cols-1 gap-2 text-sm leading-relaxed text-slate-700 dark:text-slate-200'>
            <p>• How will people travel?</p>
            <p>• How might technology change schools?</p>
            <p>• What could happen to jobs?</p>
            <p>• How may AI affect daily life?</p>
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