<?php

use Illuminate\Database\Seeder;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pizzas')->insert([
            [
                'name' => 'Bacon and Egg Pizza',
                'description' => 'Put all your breakfast favorites like bacon, eggs and cheese on top of a pizza crust in this homemade breakfast pizza recipe!',
                'price' => 100000,
                'image'=> file_get_contents("public/storage/pizza1.jpg")
            ],
            [
                'name' => 'Beef and Onion Pizza',
                'description' => 'Pizza with Ground Beef, onions and peppers topped with delicious mozarella cheese.',
                'price' => 80000,
                'image'=> file_get_contents("public/storage/pizza2.jpg")
            ],
            [
                'name' => 'Chicken Pizza',
                'description' => 'Pizza with shredded roasted chicken, blue cheese, mozarella cheese, and topped with Hot Sauce.',
                'price' => 75000,
                'image'=> file_get_contents("public/storage/pizza3.jpg")
            ],
            [
                'name' => 'Turkey Burger Pizza',
                'description' => 'Craving burgers and pizza tonight? Treat your family to both with this wholesome mash-up. Whole-wheat pizza dough provides a fiber-rich base for lean ground turkey and a bounty of toppings. Pickles, tomatoes, and lettuce piled on top make this tasty main dish fun to eat for kids and parents alike.',
                'price' => 74000,
                'image'=> file_get_contents("public/storage/pizza4.jpg")
            ],
            [
                'name' => 'Cheese Pizza',
                'description' => 'Pizza topped with cheese and marinara sauce, perfect for those wanting a classic Italian treat.',
                'price' => 110000,
                'image'=> file_get_contents("public/storage/pizza5.jpg")
            ]
        ]);
    }
}
