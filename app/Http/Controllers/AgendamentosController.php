<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Agendamentos;
use Illuminate\Http\Request;

class AgendamentosController extends Controller
{
    public function index()
    {
        $agendamentos = Agendamentos::all();
        return view('agendamentos.index', compact('agendamentos'));
    }

    public function create()
    {
        return view('agendamentos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'data' => 'required|date',
            'hora' => 'required',
        ]);

        Agendamentos::create($request->all());

        return redirect()->route('agendamentos.index')
                         ->with('success', 'Agendamento criado com sucesso!');
    }

    public function edit($id)
    {
        $agendamento = Agendamentos::findOrFail($id);
        return view('agendamentos.edit', compact('agendamento'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'data' => 'required|date',
            'hora' => 'required',
        ]);

        $agendamento = Agendamentos::findOrFail($id);
        $agendamento->update($request->all());

        return redirect()->route('agendamentos.index')
                         ->with('success', 'Agendamento atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $agendamento = Agendamentos::findOrFail($id);
        $agendamento->delete();

        return redirect()->route('agendamentos.index')
                         ->with('success', 'Agendamento excluído com sucesso!');
    }
}
