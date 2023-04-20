<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SiteController extends Controller
{
    public function index()
    {
        $images  = DB::table('produtos_images')
            ->join('produtos', 'produtos.id', '=', 'produtos_images.idproduto')
            ->select('produtos_images.image', 'produtos.produto', 'produtos_images.destaque')
            ->where('produtos_images.destaque', '=', 1)->get();


         $categorias = Categoria::all();
         $produtos = Produto::all();

         $cat = $categorias;
         $prod = $produtos;
         $image = $images;

        return view('site.index',compact('cat','prod','image'));
    }
}
