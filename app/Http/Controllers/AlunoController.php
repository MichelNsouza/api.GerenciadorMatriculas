<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlunoRequest;
use App\Models\Aluno;
use App\Models\Curso;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;


class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alunos = Aluno::with('cursos')->get();

        $totalAlunos = $alunos->count();
        $totalAtivos = Aluno::where('status', 'ativo')->count();
        $totalInativos = Aluno::where('status', 'inativo')->count();

        return response()->json([
            'status'=>true,
            'cadastros'=>$totalAlunos,
            'ativo'=> $totalAtivos,
            'inativo'=> $totalInativos,
            'alunos'=>$alunos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlunoRequest $request)
    {
        $requestData = $request->all();

        // Obter o curso_id do request
        $curso_id = $request->curso_id;

        try {
            $aluno = Aluno::create($requestData);
            $rt = $this->cadastrarAlunoEmCurso($aluno->id, $curso_id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => false,
                'message' => "Aluno não foi cadastrado!",
            ], 500);
        }

        if ($rt){
            return response()->json([
                'status' => true,
                'message' => "Aluno cadastrado com sucesso!",
                'aluno' => $aluno
            ], 200);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Aluno $aluno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aluno $aluno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aluno $aluno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aluno $aluno)
    {
        //
    }

    public function cadastrarAlunoEmCurso($aluno_id, $curso_id)
    {
        $aluno = Aluno::find($aluno_id);
        $curso = Curso::find($curso_id);

        $aluno->cursos()->attach($curso->id);

        return true;
    }

    public function buscarQuantidadeAlunosPorCurso()
    {
        $cursos = Curso::withCount('alunos')->get();

        $result = $cursos->map(function($curso) {
            return [
                'curso' => $curso->nome,
                'quantidade_alunos' => $curso->alunos_count
            ];
        });

        return response()->json($result);
    }

    public function desativarAlunoPorRa($ra)
    {

        $aluno = Aluno::where('registroDoAluno', $ra)->first();

        if (!$aluno) {
            return response()->json(['error' => 'Aluno não encontrado'], 404);
        }

        $aluno->status = 'inativo';
        $aluno->save();

        return response()->json(['success' => 'Aluno desativado com sucesso'], 200);
    }
    public function ativarAlunoPorRa($ra)
    {

        $aluno = Aluno::where('registroDoAluno', $ra)->first();

        if (!$aluno) {
            return response()->json(['error' => 'Aluno não encontrado'], 404);
        }

        $aluno->status = 'ativo';
        $aluno->save();

        return response()->json(['success' => 'Aluno ativado com sucesso'], 200);
    }


}
