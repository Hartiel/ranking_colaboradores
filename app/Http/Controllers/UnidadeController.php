<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unidade;

class UnidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('unidades.index', [
            'unidades' => Unidade::with('colaboradores')->paginate(15),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unidades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome_fantasia' => 'required|max:255',
            'razao_social' => 'required|max:255',
            'cnpj' => 'required|max:14',
        ]);

        $unidade = new Unidade;
        $unidade->nome_fantasia = $request->nome_fantasia;
        $unidade->razao_social = $request->razao_social;
        $unidade->cnpj = $request->cnpj;

        $unidade->save();

        // Redirecionar para a página desejada após o cadastro
        return redirect()->route('unidades.index')->with('success', 'Unidade cadastrada com sucesso!');
    }
}
