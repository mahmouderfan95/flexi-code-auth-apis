<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id' => 1,'name' => 'تصميم مواقع','desc' => 'تصميم مواقع','status' => true],
            ['id' => 2,'name' => 'تطوير مواقع','desc' => 'تطوير مواقع','status' => true],
            ['id' => 3,'name' => 'تصميم جيرافيك','desc' => 'تصميم جيرافيك','status' => true],
            ['id' => 4,'name' => 'تسويق الكترونى','desc' => 'تسويق الكترونى','status' => true],
        ];

        foreach($data as $item)
        {
            Service::create($item);
        }
    }
}
