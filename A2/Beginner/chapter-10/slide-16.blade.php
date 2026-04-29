<?php

 $customTitle = "Writing: Staying Fit";
 $customSubtitle = "Write a short paragraph (5–7 sentences) about how to stay fit and healthy.";

 $customCalloutText = "Include:<br>♦ At least 2 sentences with “must”<br>♦ At least 2 sentences with “need to”<br>♦ At least 1 sentence with “It’s important to”<br><br>Guiding Questions:<br>♦ What must we do to stay fit?<br>♦ What do we need to do every day?<br>♦ Why is it important to stay healthy?";

// Use \n for line breaks in the placeholder
 $customPlaceholder = "Write your paragraph here";

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
