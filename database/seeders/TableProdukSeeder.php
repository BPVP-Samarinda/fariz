<?php

namespace Database\Seeders;

use App\Models\produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class TableProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
          [
            'nama'=>'bolu peca',
            'deskripsi'=>'makanan tradisional',
            'harga'=> 10_000,
            'stok'=> 20
          ],
          [
            'nama'=>'bolu gulung',
            'deskripsi'=>'cemilan',
            'harga'=> 15_000,
            'stok'=> 25
          ]  
        ];
        foreach($data as $item){
            Produk::create($item);
        }
        
    }
}