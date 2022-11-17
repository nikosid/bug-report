<?php

namespace Tests\Feature;

use App\Mail\DailyMail;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class DailyMailTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_mail_subject_translated()
    {
        Mail::fake();

        $this->artisan('mail:send')->assertExitCode(0);

        Mail::assertSent(DailyMail::class);

        Mail::assertSent(DailyMail::class, function (DailyMail $mail) {
            return $mail->hasSubject('Сьогодні понеділок');
        });
    }
}
