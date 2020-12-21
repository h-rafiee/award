<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AwardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Event::factory(3)->create()->each(function ($event) {
            \App\Models\EventCode::factory(1)->create([
                'event_id' => $event->id
            ]);
        });
    }
}
