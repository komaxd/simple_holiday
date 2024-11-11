<?php

namespace Koma\SimpleHongKongHoliday\app\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Koma\SimpleHongKongHoliday\app\Models\Holiday;

class FetchHolidays extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:holiday';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetching holiday';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function model(){
        return app(config('simple_holiday.model_class'));
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $langs = ['en','sc','tc'];

        foreach ($langs as $lang){
            //English
            $response = self::get_content(config("simple_holiday.${lang}_url"));

            $response = preg_replace('/[^\x{4e00}-\x{9fff}\x{0000}-\x{007F}\s]+/u', '', $response); // Keeps Chinese characters and ASCII
            $holidays = json_decode( ($response) ,true);


            foreach ($holidays['vcalendar'][0]['vevent'] as $holiday) {
                $date = Carbon::createFromFormat('Ymd', $holiday['dtstart'][0])->format('Y-m-d');
                $this->model()::updateOrCreate(
                    ['date' => $date],
                    [
                        "name_{$lang}" => $holiday['summary'],
                        'date' => $date,
                    ]
                );
            }
        }
    }

    function get_content($URL){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $URL);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
}
