<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = [
            [
                'first_name' => 'Jane',
                'last_name' => 'Austen',
                'email' => 'janeausten@gmail.com'
            ],
            [
                'first_name' => 'Charles',
                'last_name' => 'Dickens',
                'email' => 'charlesdickens@gmail.com'
            ],
            [
                'first_name' => 'Mark',
                'last_name' => 'Twain',
                'email' => 'marktwain@gmail.com'
            ],
            [
                'first_name' => 'Virginia',
                'last_name' => 'Woolf',
                'email' => 'virginiawoolf@gmail.com'
            ],
            [
                'first_name' => 'William',
                'last_name' => 'Shakespeare',
                'email' => 'williamshakespeare@gmail.com'
            ],
            [
                'first_name' => 'Agatha',
                'last_name' => 'Christie',
                'email' => 'agathachristie@gmail.com'
            ],
            [
                'first_name' => 'Barbara',
                'last_name' => 'Cartland',
                'email' => 'barbaracartland@gmail.com'
            ],
            [
                'first_name' => 'Danielle',
                'last_name' => 'Steel',
                'email' => 'daniellesteel@gmail.com'
            ],
            [
                'first_name' => 'Harold',
                'last_name' => 'Robbins',
                'email' => 'haroldrobbins@gmail.com'
            ],
            [
                'first_name' => 'Georges',
                'last_name' => 'Simenon',
                'email' => 'georgessimenon@gmail.com'
            ],
        ];

        Author::insert($authors);
    }
}
