<?php

namespace Database\Seeders;

use App\Models\Products;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'email' => 'weisheng@admin.com',
            'password' => Hash::make('admin123'), // Hashed password
            'OTP' => 123456, // Default OTP
            'status' => 'Complete', // Admin status
            'email_verified_at' => now(), // Email verification timestamp
        ]);

        // Seed products
        Products::create([
            "id" => 1,
            "p_image" => "images/img-2.png",
            "p_name" => "carrot",
            "p_desc" => "Carrot is a biennial, belonging to the family Apiaceae, and is an important vegetable for its fleshy edible, colorful roots",
            "p_price" => "12.50",
            "p_mass" => "1000",
        ]);
        Products::create([
            "id" => 2,
            "p_image" => "images/R.jpeg",
            "p_name" => "broccoli",
            "p_desc" => "broccoli (Brassica oleracea var. italica) is an edible green plant in the cabbage family (family Brassicaceae, genus Brassica) whose large flowering head, stalk and small associated leaves are eaten as a vegetable",
            "p_price" => "10.00",
            "p_mass" => "1000",
        ]);
        Products::create([
            "id" => 3,
            "p_image" => "images/Spinach-All-Green.webp",
            "p_name" => "Spinach",
            "p_desc" => "A leafy green vegetable, high in iron, vitamins A and C, and other essential nutrients. It can be eaten raw in salads or cooked in various dishes, often contributing a mild and slightly sweet flavor",
            "p_price" => "8.90",
            "p_mass" => "1000",
        ]);
        Products::create([
            "id" => 4,
            "p_image" => "images/img-4.png",
            "p_name" => "Tomato",
            "p_desc" => "Often mistaken for a vegetable, the tomato is technically a fruit but commonly used as a vegetable in cooking. It's juicy, red when ripe, and packed with lycopene, an antioxidant linked to many health benefits.",
            "p_price" => "12.50",
            "p_mass" => "1000",
        ]);
        Products::create([
            "id" => 5,
            "p_image" => "images/OIP.jpeg",
            "p_name" => "Cucumber",
            "p_desc" => "A long, green vegetable with a high water content, making it refreshing and hydrating. It has a mild flavor and is often used in salads, sandwiches, or as a crunchy snack",
            "p_price" => "12.50",
            "p_mass" => "1000",
        ]);
        Products::create([
            "id" => 6,
            "p_image" => "images/img-10.png",
            "p_name" => "Bell Pepper",
            "p_desc" => "Also known as sweet pepper, it comes in various colors including green, red, yellow, and orange. Bell peppers are crisp and juicy, rich in vitamins A and C, and add a sweet or slightly bitter taste to dishes",
            "p_price" => "5.90",
            "p_mass" => "1000",
        ]);
        Products::create([
            "id" => 7,
            "p_image" => "images/OIP (1).jpeg",
            "p_name" => "Zucchini",
            "p_desc" => "A type of summer squash with a soft, edible skin. Zucchini is versatile, mild in flavor, and can be grilled, sautéed, or baked. It is low in calories and high in vitamin C, potassium, and fiber",
            "p_price" => "10.50",
            "p_mass" => "1000",
        ]);
        Products::create([
            "id" => 8,
            "p_image" => "images/h1018g16207257715328.jpg",
            "p_name" => "Cauliflower",
            "p_desc" => "A cruciferous vegetable with a compact head made up of undeveloped white flower buds. It has a mild flavor and is rich in fiber, vitamins C and K, and antioxidants. It can be eaten raw or cooked and is often used as a low-carb substitute for grains and legumes",
            "p_price" => "11.50",
            "p_mass" => "1000",
        ]);
        Products::create([
            "id" => 9,
            "p_image" => "images/aubergine-aubergine-transparent-background-ai-generated-free-png.webp",
            "p_name" => "Eggplant",
            "p_desc" => "Also known as aubergine, it has a deep purple skin and soft, spongy flesh. Eggplant is rich in fiber and antioxidants, particularly nasunin, a compound that gives it its purple color. It has a slightly bitter taste when raw but becomes tender and creamy when cooked.",
            "p_price" => "20.50",
            "p_mass" => "1000",
        ]);
        Products::create([
            "id" => 10,
            "p_image" => "images/lettuce.webp",
            "p_name" => "Lettuce",
            "p_desc" => "A leafy green vegetable commonly used in salads and sandwiches. There are several varieties, such as iceberg, romaine, and butterhead, each with a slightly different texture and flavor. Lettuce is low in calories but high in water content and vitamins A and K.",
            "p_price" => "3.50",
            "p_mass" => "1000",
        ]);
    }
}