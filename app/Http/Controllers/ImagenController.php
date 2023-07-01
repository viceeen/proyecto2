<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Imagenes;
use Illuminate\Support\Facades\Storage;
use App\File;
use Illuminate\Support\Facades\Auth;
class ImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(){
        $this->middleware('auth')->except(['index']);
    }
    public function index()
    {
        $imagenes = Imagenes::all();
        return view('inicio.index',compact('imagenes'));
    }
    public function baneadas()
    {
        return view('artista.baneadas');

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
    public function store(Request $request)
    {

        $imagen = new Imagenes();
        $file = $request->file('imagen');
    
        $fileName = $file->getClientOriginalName();
        Storage::putFileAs(
            'public', $file, $fileName
        );
    
        //Storage::setVisibility('public', $fileName);

        $imagen-> titulo = $request->titulo;
        $imagen-> archivo = $fileName;
        $imagen-> baneada = False;
        $imagen-> motivo_ban = 'no';
        $imagen-> cuenta_user = Auth::user()->user;
        $imagen->save();


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Imagenes $imagen)
    {
        $imagen ->baneada = True;
        $imagen ->motivo_ban = $request->motivo_ban;
        $imagen->save();
        return redirect()->route('home.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}