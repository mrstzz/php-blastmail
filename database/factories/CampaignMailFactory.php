<?php

namespace Database\Factories;

use App\Models\Campaign;
use App\Models\CampaignMail;
use App\Models\Subscriber;
use Database\Seeders\CampaignMailSeeder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CampaignMail>
 */
class CampaignMailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'campaign_id' => Campaign::factory(),
            'subscriber_id' => Subscriber::factory(),
            'sent_at' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'clicks' => $this->faker->numberBetween(0, 10),
            'openings' => $this->faker->numberBetween(0, 10),
        ];
    }
}
