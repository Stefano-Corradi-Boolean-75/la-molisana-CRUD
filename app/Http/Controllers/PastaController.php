<?php

namespace App\Http\Controllers;

use App\Http\Requests\PastaRequest;
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
    public function store(PastaRequest $request)
    {


        /* validazione
            ->validate([array campi da validare],[messaggi custom di errore])
        */
        // $request->validate([
        //     'title' => 'required|max:100|min:2',
        //     'image' => 'required|max:255|min:10',
        //     'cooking_time' => 'required|max:20|min:2',
        //     'type' => 'required|max:20|min:2',
        //     'weight' => 'required|max:20|min:2',
        // ],
        // [
        //     'title.required' => 'Il titolo è un campo obbligatorio',
        //     'title.max' => 'Il titolo deve avere al massimo :max caratteri',
        //     'title.min' => 'Il titolo deve avere al minimo :min caratteri',
        //     'image.required' => 'La URL \'immagine è un campo obbligatorio',
        //     'image.max' => 'La URL \'immagine  deve avere al massimo :max caratteri',
        //     'image.min' => 'La URL \'immagine deve avere al minimo :min caratteri',
        //     'cooking_time.required' => 'Il tempo di cottura è un campo obbligatorio',
        //     'cooking_time.max' => 'Il tempo di cottura  deve avere al massimo :max caratteri',
        //     'cooking_time.min' => 'Il tempo di cottura  deve avere al minimo :min caratteri',
        //     'type.required' => 'Il tipo è un campo obbligatorio',
        //     'type.max' => 'Il tipo deve avere al massimo :max caratteri',
        //     'type.min' => 'Il titolo deve avere al minimo :min caratteri',
        //     'weight.required' => 'Il peso è un campo obbligatorio',
        //     'weight.max' => 'Il peso deve avere al massimo :max caratteri',
        //     'weight.min' => 'Il peso deve avere al minimo :min caratteri',
        // ]
        // );


        /*
            nella $request ho tutti i dati inseriti nel form (chiave - valore)
            con $request->all() ottengo solo i dati che mi servono
        */
        $form_data = $request->all();


        $new_pasta = new Pasta();
        // $new_pasta->title = $form_data['title'];
        // $new_pasta->slug = Pasta::generateSlug($new_pasta->title);
        // $new_pasta->image = $form_data['image'];
        // $new_pasta->type = $form_data['type'];
        // $new_pasta->cooking_time = $form_data['cooking_time'];
        // $new_pasta->weight = $form_data['weight'];
        // $new_pasta->description = $form_data['description'];
        $form_data['slug'] = Pasta::generateSlug($form_data['title']);
        // con fill vengono associate tutte le chiavi presenti in $fillable nel model
        $new_pasta->fill($form_data);
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
    public function edit(Pasta $pasta)
    {
        // crico la view del form
        return view('pastas.edit',compact('pasta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PastaRequest $request, Pasta $pasta)
    {

        $form_data = $request->all();

        // se il titolo è stato modificato genero un nuovo slug altrimenti utilizzo il vecchio
        if($form_data['title'] != $pasta->title){
            $form_data['slug'] = Pasta::generateSlug($form_data['title']);
        }else{
            $form_data['slug'] = $pasta->slug;
        }

        $pasta->update($form_data);

        // reindirizzo alla show
        return redirect()->route('pastas.show', $pasta);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasta $pasta)
    {
        $pasta->delete();

        // torniamo alla index passando in sessione l'avvenuta eliminazione con
        // ->with('nome_variabile_di_sessione', 'Messaggio da mostrare')
        return redirect()->route('pastas.index')->with('deleted', "La pasta $pasta->title è stata eliminata correttamente");
    }
}
