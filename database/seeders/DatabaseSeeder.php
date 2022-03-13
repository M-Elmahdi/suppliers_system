<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\SupplierRating;
use App\Models\UserType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user_types = [
            'Admin'
        ];

        foreach($user_types as $type){
            UserType::create([
                'type_name' => $type
            ]);
        }

        $ratings = [
            'ممتاز','جيد', 'سئ', 'لم يتم التعامل'
        ];
        
        foreach($ratings as $rating){
            SupplierRating::create([
                'rating_name' => $rating
            ]);
        }
    }
}
