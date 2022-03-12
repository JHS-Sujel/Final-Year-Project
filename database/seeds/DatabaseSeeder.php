<?php

use App\Brand;
use App\Product;
use App\ProductType;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Create 10 users
         */
        $user = [
            'first_name' => 'First',
            'last_name' => 'Last',
            'slug' => 'first-last',
            'avatar' => 'default.png',
            'phone' => '0176115218',
            'email' => 'user',
            'address' => 'add,dress,dd',
            'password' => '12345678',
            'role_id' => rand(1, 2)
        ];

        for ($i=0; $i < 9; $i++) { 
            User::create([
                'first_name' => $user['first_name'] . $i,
                'last_name' => $user['last_name'] . $i,
                'slug' => $user['slug']  . '-' . $i,
                'avatar' => $user['avatar'],
                'phone' => $user['phone'] . $i,
                'email' => $user['email'] . $i . '@gmail.com',
                'verification_code' => random_int(10000, 99999),
                'expired_at' => time(),
                'address' => $user['address'] . $i . ',sylhet',
                'password' => Hash::make($user['password']),
                'api_token' => Hash::make(Str::random(60)),
                'role_id' => $user['role_id'],
                'status' => rand(0, 1)
            ]);
        }


        /**
         * Create 2 roles
         * [Admin, Customer]
         */
        $roles = ['Admin', 'Customer'];
        foreach ($roles as $role) {
            Role::create([
                'name' => $role,
                'status' => 1
            ]);
        }


        /**
         * Create 3 product types
         * [Cloth, Food, Medicine]
         */
        $types = ['Cloth', 'Food', 'Medicine'];
        foreach ($types as $type) {
            ProductType::create([
                'name' => $type,
                'slug' => Str::slug($type),
                'status' => 1
            ]);
        }


        /**
         * Create 3 brands
         * [Samgung, Arong, Beximco Pharmaceuticals LTD]
         */
        $brands = ['Easy', 'Arong', 'Beximco Pharmaceuticals LTD'];
        foreach ($brands as $brand) {
            Brand::create([
                'name' => $brand,
                'slug' => Str::slug($brand),
                'status' => 1
            ]);
        }


        /**
         * Create 10 products
         */
        $product = [
            'title' => 'Demo Product',
            'sub_title' => 'Demo Product Sub Title',
            'slug' => 'demo-product-sub-title',
            'image' => 'default.png',
        ];

        for ($i=0; $i < 15; $i++) { 
            $rand = rand(1, 3);
            Product::create([
                'title' => $product['title'] . $i,
                'sub_title' => $product['sub_title'] . $i,
                'slug' => $product['slug']  . '-' . $i,
                'image' => $product['image'],
                'product_type_id' => $rand,
                'brand_id' => $rand,
                'price' => rand(100, 750),
                'status' => rand(0, 1)
            ]);
        }

    }
}
