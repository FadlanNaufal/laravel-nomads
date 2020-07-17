<?php

namespace App\Http\Controllers;

use App\TravelPackages;
use App\Http\Requests\Admin\TravelPackageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TravelPackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.travel-packages.index',[
            'items' => TravelPackages::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.travel-packages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TravelPackageRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        TravelPackages::create($data);
        return redirect()->route('travel-packages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TravelPackages  $travelPackages
     * @return \Illuminate\Http\Response
     */
    public function show(TravelPackages $travelPackages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TravelPackages  $travelPackages
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = TravelPackages::findOrFail($id);
        return view('pages.admin.travel-packages.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TravelPackages  $travelPackages
     * @return \Illuminate\Http\Response
     */
    public function update(TravelPackageRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        $item = TravelPackages::findOrFail($id);
        $item->update($data);
        return redirect()->route('travel-packages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TravelPackages  $travelPackages
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = TravelPackages::findOrFail($id);
        $item->delete();

        return redirect()->route('travel-packages.index');
    }
}
