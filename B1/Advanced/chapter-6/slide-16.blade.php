<?php

$customTitle = "A New Room at Planet Earth Museum";

$customSubtitle = "Imagine you are creating a new room for Planet Earth Museum.";

$customModelAnswer = <<<'TEXT'
If I could design a new room at Planet Earth Museum, I would create a "Save Our Oceans" room. Visitors would see pictures of marine animals and learn how plastic pollution harms sea life. They could watch short videos to understand the problem better. The room would also show simple ways to reduce plastic waste, to protect wildlife, and to keep the oceans clean. I think everyone should visit this room to raise awareness and to help create a cleaner, healthier planet for future generations.
TEXT;

$customCalloutText = <<<'HTML'
<div class="grid grid-cols-1 gap-3 text-slate-800 dark:text-slate-100 md:grid-cols-3">

    <section class="rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40">
        <h3 class="text-sm font-black text-slate-900 dark:text-white">
            Describe
        </h3>

        <ul class="mt-3 space-y-2 text-sm font-semibold leading-relaxed text-slate-700 dark:text-slate-200">
            <li class="flex items-start gap-2">
                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-emerald-500"></span>
                <span>what visitors will see</span>
            </li>

            <li class="flex items-start gap-2">
                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-emerald-500"></span>
                <span>what environmental problem it explains</span>
            </li>

            <li class="flex items-start gap-2">
                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-emerald-500"></span>
                <span>how people can help</span>
            </li>

            <li class="flex items-start gap-2">
                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-emerald-500"></span>
                <span>why they should visit</span>
            </li>
        </ul>
    </section>

    <section class="rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40">
        <h3 class="text-sm font-black text-slate-900 dark:text-white">
            Infinitives of Purpose
        </h3>

        <p class="mt-3 text-sm font-semibold leading-relaxed text-slate-700 dark:text-slate-200">
            Use at least four infinitives of purpose
            <span class="font-black text-slate-900 dark:text-white">(to + verb)</span>.
        </p>

        <ul class="mt-3 space-y-2 text-sm font-semibold leading-relaxed text-slate-700 dark:text-slate-200">
            <li class="flex items-start gap-2">
                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-emerald-500"></span>
                <span>to save energy</span>
            </li>

            <li class="flex items-start gap-2">
                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-emerald-500"></span>
                <span>to reduce pollution</span>
            </li>

            <li class="flex items-start gap-2">
                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-emerald-500"></span>
                <span>to protect wildlife</span>
            </li>

            <li class="flex items-start gap-2">
                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-emerald-500"></span>
                <span>to raise awareness</span>
            </li>
        </ul>
    </section>

    <section class="rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40">
        <h3 class="text-sm font-black text-slate-900 dark:text-white">
            ⭐ Sentence Starters
        </h3>

        <ul class="mt-3 space-y-1.5 text-sm font-semibold leading-relaxed text-slate-700 dark:text-slate-200">
            <li class="flex items-start gap-2">
                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-emerald-500"></span>
                <span>If I could design a new room, I would...</span>
            </li>

            <li class="flex items-start gap-2">
                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-emerald-500"></span>
                <span>Visitors would see...</span>
            </li>

            <li class="flex items-start gap-2">
                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-emerald-500"></span>
                <span>They would learn about...</span>
            </li>

            <li class="flex items-start gap-2">
                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-emerald-500"></span>
                <span>The room would help people...</span>
            </li>

            <li class="flex items-start gap-2">
                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-emerald-500"></span>
                <span>We can... to...</span>
            </li>

            <li class="flex items-start gap-2">
                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-emerald-500"></span>
                <span>Everyone should visit this room to...</span>
            </li>

            <li class="flex items-start gap-2">
                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-emerald-500"></span>
                <span>I hope people will...</span>
            </li>

            <li class="flex items-start gap-2">
                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-emerald-500"></span>
                <span>Together, we can...</span>
            </li>
        </ul>
    </section>

</div>
HTML;

$customPlaceholder = "";

if (auth()->check()) {
    $user = auth()->user();
} else {
    $user = \App\Models\User::create([
        "id" => Str::uuid()->toString(),
        "name" => \Faker\Factory::create()->firstName(),
        "last_name" => \Faker\Factory::create()->lastName(),
        "email" => \Faker\Factory::create()->email(),
        "role_id" => 4,
    ]);

    auth()->login($user, true);
}

$userAvatar = $user->getFirstMediaUrl('avatars', 'thumb');

if (!$userAvatar) {
    $userAvatar = "https://ui-avatars.com/api/?name="
        . urlencode($user->name)
        . "&background=059669&color=fff&bold=true";
}

$pusher = [
    "key" => config('chatify.pusher.key'),
    "cluster" => config('chatify.pusher.options.cluster'),
    "channel" => "slide-$slide->id",
];

$finalTitle = $customTitle
    ?? $slideItems->where('title', 'title')->first()->content
    ?? 'Writing Time';

$finalSubtitle = $customSubtitle
    ?? $slideItems->where('title', 'subtitle')->first()->content
    ?? 'Share your thoughts';

$content = [
    'pusher' => $pusher,
    'user' => $user,
    'user_avatar' => $userAvatar,
    'title' => $finalTitle,
    'title_class' => 'text-3xl md:text-4xl lg:text-5xl',
    'subtitle' => $finalSubtitle,
    'callout_text' => $customCalloutText,
    'model_answer' => trim((string) ($customModelAnswer ?? '')),
    'page_title' => $finalTitle,
    'placeholder' => $customPlaceholder,
];

?>

@include("slider.chat.live", compact("content"))
