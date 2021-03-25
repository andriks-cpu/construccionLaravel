<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Facade\Ignition\QueryRecorder\Query;

use Response;
//use File;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$datos['libros']=Libro::paginate(8);
        //return view('libro.index',$datos);

        //Buscador
        $search = request()->query('search');
        if($search){
            // Query Builder to search in three columns in table books
            $datos['libros'] = Libro::query()
                ->where('Titulo', 'LIKE', "%{$search}%")
                ->orWhere('Autor', 'LIKE', "%{$search}%")
                ->orWhere('Descripcion', 'LIKE', "%{$search}%")
                ->orWhere('DescripcionLarga', 'LIKE', "%{$search}%")
                ->get();

            return view('libro.index',$datos)->with('search', $search);

            //$books = Book::where('title', 'LIKE', "%{$search}%")->get();
        }else{
            $datos['libros'] = Libro::all();
            return view('libro.index',$datos);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('libro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $campos=[
            'Titulo'=>'required|string|max:250',
            'Autor'=>'required|string|max:250',
            'Descripcion'=>'required|string|max:250',
            'Portada'=>'required|max:10000|mimes:jpeg,png,jpg',
            'DescripcionLarga'=>'required|string|max:250',
            'ISBN'=>'required|string|max:250',
            'Editorial'=>'required|string|max:250',
            'NumeroPaginas'=>'required|string|max:250',
            'Edicion'=>'required|string|max:250',
            'Pais'=>'required|string|max:250',
            'Año'=>'required|string|max:250',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Portada.required'=>'La portada es requerida'
        ];

        $this->validate($request, $campos, $mensaje);

        //$datosLibro = request()->all();
        $datosLibro = request()->except('_token');
        
        if($request->hasFile('Portada')){
            $datosLibro['Portada']=$request->file('Portada')->store('uploads','public');
        }
        
        Libro::insert($datosLibro);

        //return response()->json($datosLibro);
        return redirect('libro')->with('mensaje','Libro agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $libro = Libro::Where('id','=',$id)->first();

        return view('libro.show',array(
            'libro'=>$libro
        ));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $libro=Libro::findOrFail($id);

        return view('libro.edit', compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'Titulo'=>'required|string|max:250',
            'Autor'=>'required|string|max:250',
            'Descripcion'=>'required|string|max:250',
            'DescripcionLarga'=>'required|string|max:250',
            'ISBN'=>'required|string|max:250',
            'Editorial'=>'required|string|max:250',
            'NumeroPaginas'=>'required|string|max:250',
            'Edicion'=>'required|string|max:250',
            'Pais'=>'required|string|max:250',
            'Año'=>'required|string|max:250',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            
        ];
        if($request->hasFile('Portada')){
            $campos=['Portada'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['Portada.required'=>'La portada es requerida'];
        }

        $this->validate($request, $campos, $mensaje);


        $datosLibro = request()->except(['_token','_method']);
        
        if($request->hasFile('Portada')){
            $libro=Libro::findOrFail($id);
            Storage::delete('public/'.$libro->Portada);
            $datosLibro['Portada']=$request->file('Portada')->store('uploads','public');
        }

        Libro::where('id','=',$id)->update($datosLibro);
        $libro=Libro::findOrFail($id);
        //return view('libro.edit', compact('libro'));
        return redirect('libro')->with('mensaje','Libro actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $libro=Libro::findOrFail($id);
        if(Storage::delete('public/'.$libro->Portada)){
            
            Libro::destroy($id);
        }

        return redirect('libro')->with('mensaje','Libro Eliminado');
    } 
    public function inicio(){
        //
        return view('inicio');
    } 
}
