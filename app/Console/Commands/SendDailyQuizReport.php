<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendDailyQuizReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-daily-quiz-report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    // app/Console/Commands/SendDailyQuizReport.php
public function handle()
{
    $authors = User::has('quizzes')->get();

    foreach ($authors as $author) {
        $quizzes = $author->quizzes;
        $report = [];

        foreach ($quizzes as $quiz) {
            $attempts = $quiz->attempts()->whereDate('created_at', Carbon::yesterday())->get();
            $report[] = [
                'quiz' => $quiz->title,
                'attempts' => $attempts->count(),
                'average_score' => $attempts->avg('score'),
            ];
        }

        Mail::to($author->email)->send(new DailyQuizReport($report));
    }
}

}
