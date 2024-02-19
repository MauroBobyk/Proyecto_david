<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CargaLibro;

class CargaDeLibrosController extends Controller
{

  public function index()
    {
        $libros = CargaLibro::latest()->paginate(5);
        return view('libros.index',compact('libros'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('libros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ISBN' => 'required',
            'titulo' => 'required',
            'edicion' => 'required',
            'anio' => 'required',
            'anio' => 'required',
            'genero' => 'required',
        ]);

        CargaLibro::create($request->all());
        return redirect()->route('productos.index')->with('success','Producto creado exitosamente.');
    }

    public function show(CargaLibro $libros)
    {
        return view('libros.show',compact('libros'));
    }


    public function edit(CargaLibro $libros)
    {
        return view('libros.edit',compact('libros'));
    }

    public function update(Request $request, CargaLibro $libros)
    {
        $request->validate([
            'ISBN' => 'required',
            'titulo' => 'required',
            'edicion' => 'required',
            'anio' => 'required',
            'anio' => 'required',
            'genero' => 'required',
        ]);

        $libros->update($request->all());
        return redirect()->route('libros.index')->with('success','Libro modificado exitosamente.');
    }


    public function destroy(CargaLibro $libros)
    {
        $libros->delete();
        return redirect()->route('libros.index')->with('success','Libro eliminado exitosamente.');
    }

}
