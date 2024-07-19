<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCursoRequest;
use App\Models\Curso;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = Curso::withCount(['alunos' => function ($query) {
            $query->where('status', 'ativo');
        }])->get();

        return response()->json([
            'status' => true,
            'cursos' => $cursos->map(function($curso) {
                return [
                    'id' => $curso->id,
                    'nome' => $curso->nome,
                    'descricao' => $curso->descricao,
                    'alunos_count' => $curso->alunos_count,
                ];
            })
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
    public function store(StoreCursoRequest $request)
    {
        $requestData = $request->all();

        $curso = Curso::create($requestData);

        return response()->json([
            'status' => true,
            'message' => "Curso Criado com Sucesso!",
            'curso' => $curso
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $curso = Curso::findOrFail($id);
            return response()->json([
                'status' => true,
                'curso' => $curso
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Curso não encontrado.',
                'erro' => $e

            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curso $curso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCursoRequest $request, $id)
    {
        try {
            $curso = Curso::findOrFail($id);
            $requestData = $request->all();

            $curso->update($requestData);

            return response()->json([
                'status' => true,
                'message' => "Curso Atualizado com Sucesso!",
                'curso' => $curso
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Curso não encontrado.'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $curso = Curso::findOrFail($id);
            $curso->delete();

            return response()->json([
                'status' => true,
                'message' => "Curso Deletado com Sucesso!"
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Curso não encontrado.'
            ], 404);
        }
    }
}
