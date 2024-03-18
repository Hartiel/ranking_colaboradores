<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CargoColaborador;
use App\Models\Colaborador;
use App\Models\Unidade;
use App\Models\Cargo;

class ColaboradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('colaboradores.index', [
            'colaboradores' => Colaborador::with('unidade', 'cargo')->paginate(15),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('colaboradores.create', [
            'unidades' => Unidade::get(),
            'cargos' => Cargo::get(),
        ]);
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
            'nome' => 'required|max:255',
            'cpf' => 'required|max:11',
            'email' => 'required|email|max:255',
            'unidade' => 'required|exists:unidades,id',
            'cargo' => 'required|exists:cargos,id',
        ]);

        $colaborador = new Colaborador;
        $colaborador->nome = $request->nome;
        $colaborador->cpf = $request->cpf;
        $colaborador->email = $request->email;
        $colaborador->unidade_id = $request->unidade;

        $colaborador->save();

        $cargo_colaborador = new CargoColaborador();
        $cargo_colaborador->cargo_id = $request->cargo;
        $cargo_colaborador->colaborador_id = $colaborador->id;
        $cargo_colaborador->nota_desempenho = 0;

        $cargo_colaborador->save();

        // Redirecionar para a página desejada após o cadastro
        return redirect()->route('colaboradores.index')->with('success', 'Colaborador cadastrado com sucesso!');
    }

    public function desempenhoEdit($colaborador_id)
    {
        $desempenho = DB::table('cargo_colaborador')->where('colaborador_id', $colaborador_id)->first();
        $colaborador = Colaborador::findOrFail($colaborador_id);

        return view('colaboradores.desempenho', [
            'desempenho' => $desempenho,
            'nome' => $colaborador['nome'],
        ]);
    }

    public function desempenhoStore(Request $request, $id)
    {
        $request->validate([
            'nota_desempenho' => 'required|integer|min:0|max:10',
        ]);

        $desempenho = DB::table('cargo_colaborador')->where('id', $id)->first();
        $desempenho->nota_desempenho = $request->nota_desempenho;
        DB::table('cargo_colaborador')->where('id', $id)->update(['nota_desempenho' => $request->nota_desempenho]);

        return redirect()->route('colaboradores.index')->with('success', 'Desempenho atualizado com sucesso!');
    }

    public function ranking()
    {
        $colaboradores = DB::table('colaboradores')
                            ->join('cargo_colaborador', 'colaboradores.id', '=', 'cargo_colaborador.colaborador_id')
                            ->join('cargos', 'cargo_colaborador.cargo_id', '=', 'cargos.id')
                            ->join('unidades', 'colaboradores.unidade_id', '=', 'unidades.id')
                            ->select('colaboradores.*', 'cargos.cargo as cargo', 'cargo_colaborador.nota_desempenho', 'unidades.nome_fantasia as nome_fantasia')
                            ->orderBy('cargo_colaborador.nota_desempenho', 'desc')
                            ->paginate(15);

        return view('colaboradores.ranking', compact('colaboradores'));
    }
}
