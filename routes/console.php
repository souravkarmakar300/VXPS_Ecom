<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');



Schedule::call(function () {
    DB::table('chatbot_messages')
        ->where('created_at', '<=', now()->subMinutes(5))
        ->delete();
})
->name('delete-expired-chatbot-messages')
->everyMinute();
