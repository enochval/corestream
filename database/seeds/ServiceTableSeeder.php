<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            ['name' => 'HD Live Streaming'],
            ['name' => 'Automatic Archiving'],
            ['name' => 'Ad Free Playback'],
            ['name' => '100 Simultaneous Viewers'],
            ['name' => '500 Simultaneous Viewers'],
            ['name' => 'Unlimited Simultaneous Viewers'],
            ['name' => 'Custom Branded Players'],
            ['name' => 'Real-time Analytics'],
            ['name' => 'Technical Support'],
            ['name' => 'Tons of Features'],
            ['name' => 'Large viewing audiences (5,000+ live viewers)'],
            ['name' => 'High-Throughput Encoding (10Mbps + )'],
            ['name' => '1 Camera + Decoder'],
            ['name' => '4 Cameras + Decoder'],
            ['name' => 'Decoder without Camera'],
            ['name' => 'Full Equipment'],
            ['name' => 'Customized Package'],
        ];

        foreach ($services as $key => $service)
        {
            Service::create($service);
        }
    }
}
