<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'بیگانه',
            'description' => 'بیگانه (به فرانسوی: L\'Étranger) رمانی نوشته آلبر کامو نویسنده فرانسوی در سال ۱۹۴۲ است. مضمون و چشم‌انداز آن اغلب به عنوان نمونه‌ای از فلسفه پوچ انگار و اگزیستانسیالیسم ذکر می‌شود. گرچه خود کامو مورد دوم را رد می‌کند. این اثر برنده جایزه نوبل ادبیات ۱۹۵۷ شد.',
        ]);

        // Add more books as needed
    }
}
