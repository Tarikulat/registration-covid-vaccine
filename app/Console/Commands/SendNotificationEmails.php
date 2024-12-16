<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Models\Registration;
use App\Mail\VaccineNotification;

class SendNotificationEmails extends Command
{
    protected $signature = 'app:send-notification-emails';

    protected $description = 'Send notification emails to users scheduled for vaccination tomorrow.';

    public function handle()
    {
        $registrations = Registration::whereDate('scheduled_date', now()->addDay()->toDateString())
            ->where('status', 'Scheduled')
            ->with('user')
            ->get();

        foreach ($registrations as $registration) {
            if ($registration->user && $registration->user->email) {
                // Send the email
                Mail::to($registration->user->email)->send(new VaccineNotification($registration));

                // Log the successful notification
                $this->info("Notification sent to: " . $registration->user->email);
            } else {
                // Log missing email
                $this->warn("User with ID {$registration->user_id} has no email.");
            }
        }

        $this->info("Notifications processed successfully.");
    }
}
