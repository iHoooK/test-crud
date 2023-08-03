<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
    
        $people = [
            [
                'name' => 'Вася',
                'email'  => "mail1@mail.ru",
                'age'  => 10,
                'sex'  => 1,
                'password' => '123',
            ],
            [
                'name' => 'Лена',
                'email'  => "mail2@mail.ru",
                'age'  => 11,
                'sex'  => 0,
                'password' => '123',
            ],
            [
                'name' => 'Егор',
                'email'  => "mail3@mail.ru",
                'age'  => 15,
                'sex'  => 1,
                'password' => '123',
            ],
            [
                'name' => 'Настя',
                'email'  => "mail4@mail.ru",
                'age'  => 20,
                'sex'  => 0,
                'password' => '123',
            ],
            [
                'name' => 'Коля',
                'email'  => "mail5@mail.ru",
                'age'  => 30,
                'sex'  => 1,
                'password' => '123',
            ],
        ];
    
        foreach ($people as $item) {
            User::create($item);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};