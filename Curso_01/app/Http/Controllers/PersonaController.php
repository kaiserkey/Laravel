<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class PersonaController extends Controller
{
    // Método para mostrar todas las personas
    public function index()
    {
        $personas = Persona::all();
        return view('personas.index', ['personas' => $personas]);
    }

    // Método para mostrar un formulario para crear una nueva persona
    public function create()
    {
        return view('personas.create');
    }

    // Método para almacenar una nueva persona en la base de datos
    public function store(Request $request)
    {
        // Validar los datos recibidos del formulario
        $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'edad' => 'required|integer',
            'email' => 'required|email|unique:personas,email',
        ]);

        // Crear una nueva instancia de Persona y asignar los valores
        $persona = new Persona;
        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->edad = $request->edad;
        $persona->email = $request->email;

        // Guardar la nueva persona en la base de datos
        $persona->save();

        // Redireccionar a la página de listado de personas
        return redirect()->route('personas.index')->with('success', 'Persona creada correctamente.');
    }

    // Método para mostrar los detalles de una persona
    public function show($id)
    {
        $persona = Persona::findOrFail($id);
        return view('personas.show', ['persona' => $persona]);
    }

    // Otros métodos como edit(), update(), destroy(), etc.
}
