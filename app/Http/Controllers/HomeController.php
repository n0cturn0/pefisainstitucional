<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\ProdutoImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation;
use App\Models\Categoria;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function categoria()
    {
        $categoria = DB::table('categorias')->get();
        return view('categoria.categoria',['categoria' => $categoria]);
    }

    public function createcategoria(Request $request){

        try {
            $validated = $request->validate([
                'categoria' => 'required|max:255',
            ]);
            $categoria = new Categoria;
            $categoria->categoria = $validated['categoria'];
            $categoria->save();
            return redirect()->route('categoria')->with('success', 'Categoria criada com sucesso!');
        } catch (ValidationException $e) {
            // A validação falhou, trate a exceção aqui
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

    }


    public function destroy($id)
    {
        $categoria = Categoria::query()->findOrFail($id);
        $categoria->delete();
        return redirect()->route('categoria')->with('success', 'Categoria excluída com sucesso!');
    }


    public function produtos()
    {
        $categoria = DB::table('categorias')->get();
        $produtos = DB::table('produtos')->get();
        return view('produto.produto', ['categorias' => $categoria],['produtos' => $produtos]);
    }

    public function criaproduto(Request $request){

        $produto = new Produto();
        $produto->idcategoria = $request->input('categoria');
        $produto->produto = $request->input('produto');
        $produto->descricao = $request->input('informacao');
        if($produto->save()){
            return redirect()->route('produtos')->with('success', 'Produto criado com sucesso!');
        }
    }





    public function produtoimage($id='NULL'){
        return view('produto.produtoimage',['id' => $id]);

}

        public function uploadimage(Request $request){

            for( $i=0; $i < count($request->allFiles()['arquivo']); $i++){
            $arquivos = $request->allFiles()['arquivo'][$i];
            $nomeAleatorio = uniqid() . '_' . $arquivos->getClientOriginalName();
            $arquivos->storeAs('produtos', $nomeAleatorio);
            $produto = new ProdutoImage();
            $produto->idproduto =  $request->input('idproduto');
            $produto->image = $nomeAleatorio;
            $produto->imagepath =$nomeAleatorio;
            $produto->save();

        }
            return redirect()->route('showproduto', ['id' => $request->input('idproduto')])->with('success', 'Produto criado com sucesso!');
        }

        public function showproduto($id='NULL'){
//            $produtos = DB::table('produtos_images')->where('idproduto','=', $id)->get();
            $produtos =  DB::table('produtos_images')
                ->join('produtos', 'produtos.id', '=', 'produtos_images.idproduto')
                ->select('produtos_images.image', 'produtos.produto', 'produtos.destaque', 'produtos_images.imagepath', 'produtos_images.id', 'produtos_images.destaque')
                ->get();
            return view('produto.show', ['produtos' => $produtos]);
        }

        public function apagarproduto($id='NULL'){
            DB::table('produtos')->where('id','=', $id)->delete();
            return redirect()->route('produtos')->with('success', 'Produto deletado!');
        }
    public function apagarprodutoimagem($id='NULL'){
        DB::table('produtos_images')->where('id','=', $id)->delete();
        return redirect()->route('showproduto', ['id' => $id])->with('success', 'Imagem apagada!');
    }
        public function destaque($id='NULL'){
            $produtos = DB::table('produtos_images')->where('id','=', $id)->pluck('destaque');
            foreach ($produtos as $key){ $idselected = $key; }
            $idselected = ($idselected == 0) ? 1 : 0;
            DB::table('produtos_images')->where('id',$id)->update(['destaque'=>$idselected]);
//            return redirect()->route('produtos')->with('success', 'Destaque alterado!');
            return redirect()->route('showproduto', ['id' => $id])->with('success', 'Destaque da página inicial alterado com sucesso!');

    }

}
