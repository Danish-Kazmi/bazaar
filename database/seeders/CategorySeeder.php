<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['parent_category' => 0, 'category_name' => 'Groceries & Pets', 'active' => true],
            ['parent_category' => 0, 'category_name' => 'Health & Beauty', 'active' => true],
            ['parent_category' => 0, 'category_name' => "Men's Fashion", 'active' => true],
            ['parent_category' => 0, 'category_name' => "Women's Fashion", 'active' => true],
            ['parent_category' => 0, 'category_name' => "Mother & Baby", 'active' => true],
            ['parent_category' => 0, 'category_name' => "Home & Lifestyle", 'active' => true],
            ['parent_category' => 0, 'category_name' => "Electoric Devices", 'active' => true],
            ['parent_category' => 0, 'category_name' => "Electoric Accessories", 'active' => true],
            ['parent_category' => 0, 'category_name' => "TV & Home Appliances", 'active' => true],
            ['parent_category' => 0, 'category_name' => "Sports & Outdoor", 'active' => true],
            ['parent_category' => 0, 'category_name' => "Watches, Bags & Jewellery", 'active' => true],
            ['parent_category' => 0, 'category_name' => "Automotive & Motorbike", 'active' => true],
        ];
        $sub_categories = [
            [
                ['parent_category' => 0, 'category_name' => 'Fresh Produce', 'active' => true],
                ['parent_category' => 0, 'category_name' => 'Breakfast, Choco & Snacks', 'active' => true],
                ['parent_category' => 0, 'category_name' => 'Beverages', 'active' => true],
                ['parent_category' => 0, 'category_name' => 'Food Staples', 'active' => true],
                ['parent_category' => 0, 'category_name' => 'Cat', 'active' => true],
                ['parent_category' => 0, 'category_name' => 'Dog', 'active' => true],
                ['parent_category' => 0, 'category_name' => 'Fish', 'active' => true],
            ],
            [
                ['parent_category' => 0, 'category_name' => 'Makeup', 'active' => true],
                ['parent_category' => 0, 'category_name' => 'Beauty Tools', 'active' => true],
                ['parent_category' => 0, 'category_name' => 'Skin Care', 'active' => true],
                ['parent_category' => 0, 'category_name' => 'Hair Care', 'active' => true],
                ['parent_category' => 0, 'category_name' => 'Bath & Body', 'active' => true],
                ['parent_category' => 0, 'category_name' => "Men's Care", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Personal Care", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Fragrances", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Sexual Wellness", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Medical Supplies", 'active' => true],
            ],
            [
                ['parent_category' => 0, 'category_name' => "T-Shirts & Tanks", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Shirts & Polo", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Pants & Jeans", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Shorts, Joggers & Sweats", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Kurtas & Shalwar Kameez", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Winter Clothing", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Inner Wear", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Shoes", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Accessories", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Boy's Clothing", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Boy's Shoes", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Boy's Accessories", 'active' => true],
            ],
            [
                ['parent_category' => 0, 'category_name' => "Unstitched Fabric", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Kurtas & Shalwar Kameez", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Muslim Wear", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Tops", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Bras, Panties & Lingerie", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Sleepwear & Innerwear", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Pants, Jeans & Leggings", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Dresses & Skirts", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Winter Clothing", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Shoes", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Girls Clothing", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Girls Shoes", 'active' => true],
            ],
            [
                ['parent_category' => 0, 'category_name' => "Milk Formula & Baby Food", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Diapering & Potty", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Feeding", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Maternity Care", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Baby Gear", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Nursery", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Baby Personal Care", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Clothing & Accessories", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Baby & Toddler Toys", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Remote Control & Vehicles", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Sports & Outdoor Play", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Toys & Games", 'active' => true],
            ],
            [
                ['parent_category' => 0, 'category_name' => "Bath", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Bedding", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Decor", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Furniture", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Kitchen & Dining", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Lighting", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Laundry & Cleaning", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Tools, DIY & Outdoor", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Stationery & Craft", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Media, Music & Books", 'active' => true],
            ],
            [
                ['parent_category' => 0, 'category_name' => "Smart Phones", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Feature Phones", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Tablets", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Monitors", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Laptops", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Desktops", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Smart Watches", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Gaming Consoles", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Cameras & Drones", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Security Cameras", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Daraz Like New", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Landline Phones", 'active' => true],
            ],
            [
                ['parent_category' => 0, 'category_name' => "Mobile Accessories", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Headphones & Headsets", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Wearable", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Camera Accessories", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Computer Accessories", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Storage", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Printers", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Computer Components", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Portable Speakers", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Network Components", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Gaming Accessories", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Monitors & Accessories", 'active' => true],
            ],
            [
                ['parent_category' => 0, 'category_name' => "Air Conditioners", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Televisions", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Refrigerators & Freezers", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Home Audio & Theater", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Washing Machine", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Kitchen Appliances", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Cooling & Heating", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Irons & Garment Care", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Generator, UPS & Solar", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Projectors & Players", 'active' => true],
                ['parent_category' => 0, 'category_name' => "TV Accessories", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Vacuums & Floor Care", 'active' => true],
            ],
            [
                ['parent_category' => 0, 'category_name' => "Exercise & Fitness", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Supplements", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Shoes & Clothing", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Team Sports", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Rocket Sports", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Outdoor Recreation", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Fitness Gadgets", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Sports Accessories", 'active' => true],
            ],
            [
                ['parent_category' => 0, 'category_name' => "Men's Watches", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Women's Watches", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Kid's Watches", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Womens Bags", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Mens Bags", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Luggage & Suitcase", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Womens Jewellery", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Mens Jewellery", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Mens Accessories", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Womens Accessories", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Sunglassess & Eyewear", 'active' => true],
            ],
            [
                ['parent_category' => 0, 'category_name' => "Automotive", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Motorcycle", 'active' => true],
                ['parent_category' => 0, 'category_name' => "Loaders & Rickshaw", 'active' => true],
            ]
        ];
        foreach ($categories as $key => $category) {
            try {
                $cate = Category::create($category);
                foreach ($sub_categories[$key] as $sub_category) {
                    Category::create([
                        'parent_category' => $cate->id,
                        'category_name' => $sub_category['category_name'],
                        'active' => $sub_category['active'],
                    ]);
                }
            } catch (\Exception $e) {
                // Log the error or handle it appropriately
                Log::error("Error inserting category: " . $e->getMessage());
            }
        }
    }
}
