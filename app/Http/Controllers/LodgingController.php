<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Lodging;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LodgingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lodgings = Lodging::where('user_id' , Auth::id())
                             ->orderByDesc('created_at')
                             ->get();
        return view('lodgings.index' , ['lodgings' => $lodgings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lodgings.create');
    }

    public function getCities(Request $request) {

        if ($request->search === 'undefined') {
            $products = City::limit(50)->get();
        } else {
            $products = City::where('name' , 'LIKE' , '%'.$request->search.'%')
                                ->limit(50)
                                ->get();
        } 

        return $products ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'size'      => 'required|integer' ,
            'cost'      => 'required|integer' ,
            'description'=> 'required|string' ,
            'pictures'  => 'required|array|min:1' ,
            'pictures.*'=> 'required|file|mimes:png,jpg,jpeg|max:10240' ,
            'contact'   => 'required|integer' ,
            'city_id'   => 'required|exists:cities,id'
        ]);
        $data['user_id'] = Auth::id();
        try {
            DB::beginTransaction();
            $lodging = Lodging::create($data) ;
            $pictures = $request->file('pictures') ;
            foreach ($pictures as $key => $file) {
                $lodging->addMedia($file)->toMediaCollection('images');
            }
            DB::commit();
            return redirect()->route('home');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            return redirect()->back();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lodging  $lodging
     * @return \Illuminate\Http\Response
     */
    public function show(Lodging $logement)
    {
        return view('lodgings.show' , ['lodge' => $logement]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lodging  $lodging
     * @return \Illuminate\Http\Response
     */
    public function edit(Lodging $lodging)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lodging  $lodging
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lodging $lodging)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lodging  $lodging
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lodging $lodging)
    {
        //
    }
}
