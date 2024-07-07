<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServcieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id' => 1,'name' => 'تصميم مواقع','desc' => 'وصف خدمة تصميم مواقع','status' => true],
            ['id' => 2,'name' => 'تطوير مواقع','desc' => 'وصف خدمة تصميم مواقع','status' => true],
            ['id' => 3,'name' => 'تصميم جيرافيك','desc' => 'وصف خدمة تصميم مواقع','status' => true],
            ['id' => 4,'name' => 'تسويق الكترونى','desc' => 'وصف خدمة تصميم مواقع','status' => true],
        ];

        foreach($data as $item){
            Service::create($item);
        }
    }
}
