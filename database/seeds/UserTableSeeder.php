<?php

use App\User;
use App\Level;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Level::all() as $class) {
            for($i=1; $i<=20; $i++){
                $user = $class->users()->create([
                    'firstname'=>'last name',
                    'lastname'=>'test name'
                    ]);
                $user->updateCode();
            }
        }
    }
}
