<?php

namespace App\Console\Commands;

use App\Mail\DailyMail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::firstOrNew(['email' => 'test@mail.com']);
        Mail::to($user)->send(new DailyMail());
        return Command::SUCCESS;
    }
}
