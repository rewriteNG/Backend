<?php

namespace App\Jobs;

use App\Moduls\Character\CharTraining;
use App\Moduls\Character\CharValue;
use DateInterval;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DailyUpdate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $planTrain;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->planTrain = CharTraining::get();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->planTrain as $train) {
            $trainEnd = $train->created_at;
            $trainEnd->add(new DateInterval("P" .  $train->days . "D"));
            if ($trainEnd < today()) {
                $train->delete();
                return;
            }
            $charaValue = CharValue::where("char_id", $train->char_id)->first();
            //TODO move base values to a central place
            $baseValue = 1.35;
            $baseStamina = 7.5;
            $baseChakra = 3.75;
            $baseTrain = [
                'str' => $baseValue,
                'def' => $baseValue,
                'speed' => $baseValue,
                'chakra' => $baseChakra,
                'stamina' => $baseStamina,
            ];
            $charaValue[$train->char_value] += $baseTrain[$train->char_value];
            $charaValue->save();
        }
    }
}
