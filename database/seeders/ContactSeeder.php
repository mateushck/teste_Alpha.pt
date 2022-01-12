<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::create([

            'name'      => 'Mateus Hack',
            'contact'   => '996928424',
            'email'       => 'mateushck@gmail.com',
              
        ]);
        Contact::create([

            'name'      => 'Contato Teste1',
            'contact'   => '999999999',
            'email'       => 'contatoteste1@gmail.com',
              
        ]);
        Contact::create([

            'name'      => 'Contato Teste2',
            'contact'   => '999999992',
            'email'       => 'contatoteste2@gmail.com',
              
        ]);
        Contact::create([

            'name'      => 'Contato Teste3',
            'contact'   => '999999993',
            'email'       => 'contatoteste3@gmail.com',
              
        ]);
        Contact::create([

            'name'      => 'Contato Teste4',
            'contact'   => '999999994',
            'email'       => 'contatoteste4@gmail.com',
              
        ]);

    }
}
