<?php

namespace Database\Factories;

use App\Models\InspectionChecklist;
use App\Models\Job;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $job_id = Job::inRandomOrder()->first()->id;
        $inspection_checklist_id = InspectionChecklist::inRandomOrder()->first()->id;

        if (Location::where('job_id', $job_id)->where('inspection_checklist_id', $inspection_checklist_id)->exists()) {
            return $this->definition(); 
        } else {
            return [
                'job_id' => $job_id,
                'inspection_checklist_id' => $inspection_checklist_id,
            ];
        }
    }

}
