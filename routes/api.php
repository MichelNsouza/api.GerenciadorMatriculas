<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CursoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::apiResource('alunos', AlunoController::class);
Route::apiResource('cursos', CursoController::class);

Route::get('/alunos&cursos', [AlunoController::class, 'buscarAlunosComCursos']);
Route::get('/quantidadealunosporCurso', [AlunoController::class, 'buscarQuantidadeAlunosPorCurso']);
Route::get('/aluno/{id}/cursos', [AlunoController::class, 'buscarAlunoComCursos']);
Route::get('/aluno/ativos', [AlunoController::class, 'buscarAlunosAtivos']);
Route::get('/aluno/status', [AlunoController::class, 'buscarAlunosInativos']);

