<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class WeatherController extends Controller
{
    private function convertTemperature($temperature)
    {
        return round(($temperature - 273.15), 0);
    }

    private function sendWeatherEmailToAllUsers($subject, $message)
    {
        $users = User::all(); // Fetch all users

        foreach ($users as $user) {
            Mail::raw($message, function ($mail) use ($user, $subject) {
                $mail->to($user->email)
                    ->subject($subject);
            });
        }
    }

    public function index()
    {
        $API_KEY = env('OPENWEATHERMAP_API_KEY');
        $city = "Ilaro";
        $url = 'https://api.openweathermap.org/data/2.5/forecast?q=' . $city . '&appid=' . $API_KEY;

        $response = Http::get($url);
        if ($response->successful()) {
            $data = $response->json();
            $temp = $this->convertTemperature($data['list'][0]['main']['temp']);
            $humidity = $data['list'][0]['main']['humidity'];
            $wind = round($data['list'][0]['wind']['speed'], 2);
            $clouds = round($data['list'][0]['clouds']['all'], 2);
            $pressure = round($data['list'][0]['main']['pressure'], 2);
            $weather = $data['list'][0]['weather'][0]['main'];
            $weatherDescription = $data['list'][0]['weather'][0]['description'];
            $country = $data['city']['country'];
            $icon = $data['list'][0]['weather'][0]['icon'];
            $iconUrl = 'http://openweathermap.org/img/w/' . $icon . '.png';

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

            // Prepare hourly data for the next few hours
            $hours = [];
            for ($i = 0; $i < 6; $i++) { // Adjust the range as needed
                $hours[] = [
                    'time' => now()->addHours($i)->format('ha'), // Adjust time format as needed
                    'temp' => $this->convertTemperature($data['list'][$i]['main']['temp']),
                    'feels_like' => $this->convertTemperature($data['list'][$i]['main']['feels_like']),
                    'icon' => $data['list'][$i]['weather'][0]['icon'],
                    'description' => $data['list'][$i]['weather'][0]['description']
                ];
            }

            $days = [6, 13, 21, 29]; // Indices for the next 4 days
            for ($i = 0; $i < 4; $i++) {
                ${"day{$i}Temp"} = $this->convertTemperature($data['list'][$days[$i]]['main']['temp']);
                ${"icon{$i}"} = $data['list'][$days[$i]]['weather'][0]['icon'];
                ${"icon{$i}Url"} = 'http://openweathermap.org/img/w/' . ${"icon{$i}"} . '.png';
            }

            return view('Front.index', compact(
                'city',
                'country',
                'temp',
                'humidity',
                'wind',
                'clouds',
                'pressure',
                'weather',
                'weatherDescription',
                'iconUrl',
                'day0Temp',
                'day1Temp',
                'day2Temp',
                'day3Temp',
                'icon0Url',
                'icon1Url',
                'icon2Url',
                'icon3Url',
                'hours'
            ));

        } else {
            return redirect()->route('home')->with('error', 'Failed to fetch weather data.');
        }
    }

    public function showResults(Request $request)
    {
        $API_KEY = env('OPENWEATHERMAP_API_KEY');

        if ($request->input('city') == '') {
            return redirect('/')->with('error', 'Please enter a city name.');
        }

        $city = $request->input('city');
        $url = 'https://api.openweathermap.org/data/2.5/forecast?q=' . $city . '&appid=' . $API_KEY;

        $response = Http::get($url);

        if ($response->successful()) {
            $data = $response->json();

            $temp = $this->convertTemperature($data['list'][0]['main']['temp']);
            $humidity = $data['list'][0]['main']['humidity'];
            $wind = round($data['list'][0]['wind']['speed'], 2);
            $clouds = round($data['list'][0]['clouds']['all'], 2);
            $pressure = round($data['list'][0]['main']['pressure'], 2);
            $weather = $data['list'][0]['weather'][0]['main'];
            $weatherDescription = $data['list'][0]['weather'][0]['description'];
            $country = $data['city']['country'];
            $icon = $data['list'][0]['weather'][0]['icon'];
            $iconUrl = 'http://openweathermap.org/img/w/' . $icon . '.png';

            // Prepare hourly data for the next few hours
            $hours = [];
            for ($i = 0; $i < 6; $i++) { // Adjust the range as needed
                $hours[] = [
                    'time' => now()->addHours($i)->format('ha'), // Adjust time format as needed
                    'temp' => $this->convertTemperature($data['list'][$i]['main']['temp']),
                    'feels_like' => $this->convertTemperature($data['list'][$i]['main']['feels_like']),
                    'icon' => $data['list'][$i]['weather'][0]['icon'],
                    'description' => $data['list'][$i]['weather'][0]['description']
                ];
            }

            $days = [6, 13, 21, 29]; // Indices for the next 4 days
            for ($i = 0; $i < 4; $i++) {
                ${"day{$i}Temp"} = $this->convertTemperature($data['list'][$days[$i]]['main']['temp']);
                ${"icon{$i}"} = $data['list'][$days[$i]]['weather'][0]['icon'];
                ${"icon{$i}Url"} = 'http://openweathermap.org/img/w/' . ${"icon{$i}"} . '.png';
            }

            return view('Front.index', compact(
                'city',
                'country',
                'temp',
                'humidity',
                'wind',
                'clouds',
                'pressure',
                'weather',
                'weatherDescription',
                'iconUrl',
                'day0Temp',
                'day1Temp',
                'day2Temp',
                'day3Temp',
                'icon0Url',
                'icon1Url',
                'icon2Url',
                'icon3Url',
                'hours'
            ));
        } else {
            return redirect()->route('home')->with('error', 'Failed to fetch weather data.');
        }
    }
}
