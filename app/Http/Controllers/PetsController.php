<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetsRequest;
use App\Models\Pet;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\App;

class PetsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('owner',['except' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Guard $auth)
    {
        #$pets = Pet::where('user_id', $auth->user()->id)->get();
        $pets = $auth->user()->pets;
        $pets->load('species');
        return view('pets.index', compact('pets'));
    }

    public function getResource($id){
        #dd(func_get_args());
        return Pet::findOrFail($id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $pet = new Pet();
        return view('pets.create', compact("pet"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Application|RedirectResponse|\Illuminate\Http\Response|Redirector
     */
    public function store(PetsRequest $request, Guard $auth)
    {
        $data = $request->all();
        $data['user_id'] = $auth->user()->id;
        Pet::create($data);
        return redirect(route('pets.index'))->with('success','L\'animal a été ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pet = Pet::findOrFail($id);
        return view('pets.edit', compact('pet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PetsRequest $request
     * @param int $id
     * @return Application|Redirector|RedirectResponse
     */
    public function update(PetsRequest $request, Guard $auth, $id)
    {
        $pet = Pet::findOrFail($id);
        $data = $request->all();
        $data['user_id'] = $auth->user()->id;
        $pet->update($data);
        return redirect(route('pets.index'))->with('success','L\'animal a été modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Application|RedirectResponse|\Illuminate\Http\Response|Redirector
     */
    public function destroy($id)
    {
        $pet = Pet::findOrFail($id);
        $pet->delete();
        return redirect(route('pets.index'))->with('success','L\'animal a été supprimée avec succès');
    }
}
