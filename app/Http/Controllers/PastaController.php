<?php

namespace App\Http\Controllers;

use App\Models\Pasta;
use Illuminate\Http\Request;

class PastaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pastas = Pasta::orderBy('id','desc')->paginate(5);
        return view('pastas.index', compact('pastas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pastas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
            nella $request ho tutti i dati inseriti nel form (chiave - valore)
            con $request->all() ottengo solo i dati che mi servono
        */
        $form_data = $request->all();


        $new_pasta = new Pasta();
        $new_pasta->title = $form_data['title'];
        $new_pasta->slug = Pasta::generateSlug($new_pasta->title);
        $new_pasta->image = $form_data['image'];
        $new_pasta->type = $form_data['type'];
        $new_pasta->cooking_time = $form_data['cooking_time'];
        $new_pasta->weight = $form_data['weight'];
        $new_pasta->description = $form_data['description'];
        $new_pasta->save();
      // dd($new_pasta);

        //redirect alla show dell'emento appena salvato
        return redirect()->route('pastas.show', $new_pasta);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pasta $pasta)
    {
        /*
            - fare query per id
            - return vista della show
        */

        // il parametro passato di default è $id e quindi dovrei fare la query:
        //$pasta = Pasta::findOrFail($id);

        // se inizializzo l'entità Pasta come parametro la query viene fatta implicitamente

        return view('pastas.show', compact('pasta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
