<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use App\Models\Role;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::create([
          "name" =>  "Minuman"
        ]);
        
        Category::create([
          "name" =>  "Makanan"
        ]);

        
        Category::create([
          "name" =>  "Stationary"
        ]);

        Role::create([
          "name" => "siswa",
        ]);

        
        Role::create([
            "name" => "bank",
        ]);

        
        Role::create([
            "name" => "admin",
        ]);

        
        Role::create([
            "name" => "kantin",
        ]);


        User::create([
            "name" => "siswa",
            "role_id" => 1,
            "password" => bcrypt("siswa123")
        ]);

        
        User::create([
            "name" => "bank",
            "role_id" => 2,
            "password" => bcrypt("bank123")
        ]);

        
        User::create([
            "name" => "admin",
            "role_id" => 3,
            "password" => bcrypt("admin123")
        ]);

        
        User::create([
            "name" => "kantin",
            "role_id" => 4,
            "password" => bcrypt("kantin123")
        ]);

        Wallet::create([
            "user_id" => 1,
            "credit" => 500000,
            "debit" => 0
        ]); 


        Product::create([
            "name" => "AK47-0Z4N",
            "category_id" => 1,
            "price" => 5000,
            "stock" => 30,
            "description" => "Buat nembak jarak sedang",
            "thumbnail" => "https://pict.sindonews.net/dyn/600/pena/sindo-article/original/2020/12/20/sains%20nyesel%20AK-47.jpg"
        ]);

        Product::create([
            "name" => "Grenade",
            "category_id" => 2,
            "price" => 15000,
            "stock" => 50,
            "description" => "Bombing",
            "thumbnail" => "https://kubrick.htvapps.com/htv-prod-media.s3.amazonaws.com/images/grenade-1609287782.jpg?crop=1.00xw:1.00xh;0,0&resize=900:*"
        ]);

        
        Product::create([
            "name" => "Dessert Eagle",
            "category_id" => 3,
            "price" => 3000,
            "stock" => 70,
            "description" => "Pistol",
            "thumbnail" => "https://www.americanrifleman.org/media/o0ejtksj/deserteagle.jpg?anchor=center&mode=crop&width=987&height=551&rnd=132618315835330000&quality=60"
        ]);

        Product::create([
            "name" => "School Bomb",
            "category_id" => 1,
            "price" => 5000,
            "stock" => 30,
            "description" => "Bom sekolah ",
            "thumbnail" => "https://asset-2.tstatic.net/jogja/foto/bank/images/bom-ilustrasi_1802.jpg"
        ]);

        Product::create([
            "name" => "Lighter",
            "category_id" => 2,
            "price" => 15000,
            "stock" => 50,
            "description" => "Cocok buat nyalain kembang api",
            "thumbnail" => "https://www.firequick.com/admin/assets/images/af0f122495eb1ae883d4fdab75839111.png"
        ]);

        
        Product::create([
            "name" => "Black T-shirt",
            "category_id" => 3,
            "price" => 3000,
            "stock" => 70,
            "description" => "Baju item",
            "thumbnail" => "https://upload.wikimedia.org/wikipedia/commons/d/da/Ganjar_Pranowo_Candidate_for_Indonesia%27s_President_in_2024.jpg"
        ]);

        Transaction::create([
            "user_id" => 1,
            "quantity" => 2,
            "product_id" => 3,
            "status" => "not_paid",
            "order_id" => "inv-23",
            "total_price" => 6000
        ]); 
    }
}
