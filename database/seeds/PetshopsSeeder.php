<?php

use Illuminate\Database\Seeder;

class PetshopsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('petshops')->insert([
            'id' => 1,
            'nomeFantasia'      => "Petshop da Esquina",
            'razaoSocial'       => 'Petshop da Esquina LTDA',
            'cnpj'              => '11.111.111/1111-11',
            'cpf'               => '111.111.111-11',
            'cep'               => '09876-000',
            'endereco'          => 'Rua Fulano Ciclano',
            'numero'            => '1500',
            'uf'                => 'SP',
            'cidade'            => 'São Paulo',
            'bairro'            => 'Cruzes',
            'telefone'          => '1198765432',
            'email'             => 'email@email.com',
            'imagem'            => null,
            'horarioAbertura'   => '08:00:00',
            'horarioFechamento' => '19:00:00',
            'media_avaliacoes'  => 3.0,
            'total_avaliacoes'  => 0
        ]);
    }
}