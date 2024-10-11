<?php

namespace Database\Seeders;

use App\Models\Bid;
use App\Models\ChecklistItem;
use App\Models\Customer;
use App\Models\Estimate;
use App\Models\EstimateRequest;
use App\Models\InspectionChecklist;
use App\Models\Job;
use App\Models\Location;
use App\Models\WorkOrders;
use Database\Factories\ChecklistItemFactory;
use Database\Factories\CustomerFactory;
use Database\Factories\InspectionChecklistFactory;
use Database\Factories\JobFactory;
use Database\Factories\WorkOrdersFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class CreateAdminUserSeeder extends Seeder
{
    public function run()
    {
        User::factory()->count(5)->admin()->create();
        User::factory()->count(5)->user()->create();
        User::factory()->count(5)->manager()->create();
        User::factory()->count(5)->vendor()->create();

        Job::factory(10)->create();
        WorkOrders::factory(10)->create();
        Customer::factory(10)->create();
        InspectionChecklist::factory(10)->create();
        ChecklistItem::factory(20)->create();
        Location::factory(20)->create();
        Estimate::factory(20)->create();
        EstimateRequest::factory(20)->create();
        Bid::factory(20)->create();
    }
}
