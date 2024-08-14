<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class CheckWeather extends Command
{
    protected $signature = 'weather:check';
    protected $description = 'Check the weather and send notifications if it\'s raining or sunny';

    private function convertTemperature($temperature)
    {
        return round(($temperature - 273.15), 0);
    }

    private function sendWeatherEmailToAllUsers($subject, $message)
    {
        $users = User::all();

        foreach ($users as $user) {
            Mail::raw($message, function ($mail) use ($user, $subject) {
                $mail->to($user->email)
                    ->subject($subject);
            });
        }
    }

    public function handle()
    {
        $API_KEY = env('OPENWEATHERMAP_API_KEY');
        $city = "Ilaro";
        $url = 'https://api.openweathermap.org/data/2.5/forecast?q=' . $city . '&appid=' . $API_KEY;

        $response = Http::get($url);
        if ($response->successful()) {
            $data = $response->json();
            $weather = $data['list'][0]['weather'][0]['main'];
            $weatherDescription = $data['list'][0]['weather'][0]['description'];

            // Send email based on weather conditions
            if (strtolower($weather) == 'rain') {
                $subject = 'Weather Alert: It\'s Raining!';
                $message = 'It is currently raining in ' . $city . '. Stay dry!';
            } else if (strtolower($weather) == 'clear') {
                $subject = 'Weather Alert: It\'s Sunny!';
                $message = 'It is currently sunny in ' . $city . '. Enjoy the sunshine!';
            } else {
                $subject = 'Weather Update';
                $message = 'The current weather in ' . $city . ' is ' . $weatherDescription . '.';
            }

            $this->sendWeatherEmailToAllUsers($subject, $message);
        }
    }
}
