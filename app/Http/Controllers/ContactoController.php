<?php

namespace App\Http\Controllers;

use App\Entities\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contactos = Contacto::select('*');

        $limit = (isset($request->limit)) ? $request->limit : 10;

        if (isset($request->search)) {
            $contactos = $contactos->where('nombre', 'like', '%' . $request->search . '%')
                ->orwhere('apellidoPaterno', 'like', '%' . $request->search . '%')
                ->orwhere('apellidoMaterno', 'like', '%' . $request->search . '%')
                ->orwhere('email', 'like', '%' . $request->search . '%')
                ->orwhere('telefono', 'like', '%' . $request->search . '%');
        }

        $contactos=$contactos->paginate($limit)->appends($request->all());

        return view("contactos.index", compact('contactos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contactos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contacto = new contacto();
        $contacto = $this->createUpdateContacto($request, $contacto);

        return redirect()
            ->route('contactos.index')
            ->with('message', 'El registro se guardo correctamente');
    }

    public function createUpdateContacto(Request $request, $contacto)
    {
        $contacto->idformulario = $request->idformulario;
        $contacto->nombre = $request->nombre;
        $contacto->apellidoPaterno = $request->apellidoPaterno;
        $contacto->apellidoMaterno = $request->apellidoMaterno;
        $contacto->email = $request->email;
        $contacto->telefono = $request->telefono;
        $contacto->descripcion = $request->descripcion;

        $contacto->save();
        return $contacto;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($contacto)
    {
        $contacto = Contacto::where('idformulario', $contacto)->firstOrFail();
        return view('contactos.show', compact('contacto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($contacto)
    {
        $contacto = Contacto::where('idformulario', $contacto)->firstOrFail();
        return view('contactos.edit', compact('contacto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $contacto)
    {

        $contacto = Contacto::where('idformulario', $contacto)->firstOrFail();
        $contacto = $this->createUpdateContacto($request, $contacto);

        return redirect()
            ->route('contactos.index', $contacto)
            ->with('message', 'El registro se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($contacto)
    {
        $contacto = Contacto::where('idformulario', $contacto)->firstOrFail();
        $contacto->delete();
        return redirect()
            ->route('contactos.index')
            ->with('message', 'Se ha eliminador el registro correctamente');
    }
}
