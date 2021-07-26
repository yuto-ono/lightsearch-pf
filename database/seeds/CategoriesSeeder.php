<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id'      => 1,
                'name'    => '電撃文庫',
                'sort_no' => 1,
            ],
            [
                'id'      => 2,
                'name'    => 'ファミ通文庫',
                'sort_no' => 2,
            ],
            [
                'id'      => 3,
                'name'    => 'MF文庫J',
                'sort_no' => 3,
            ],
            [
                'id'      => 4,
                'name'    => 'オーバーラップ文庫 ',
                'sort_no' => 4,
            ],
            [
                'id'      => 5,
                'name'    => '富士見ファンタジア文庫',
                'sort_no' => 5,
            ],
            [
                'id'      => 6,
                'name'    => '角川スニーカー文庫',
                'sort_no' => 6,
            ],
        ]);
    }
}
