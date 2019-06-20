<?php

namespace App\Http\Controllers;

use App\CategorySpend;
use App\Spend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat_spend = CategorySpend::all();
        return view('spend.create',compact('cat_spend'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' =>  'required|unique:spending||max:60',
            'sum' => 'required|numeric'
        ]);
        Spend::create([
            'title' => $request->title,
            'sum' => $request->sum,
            'category_id' => $request->cat_id,
            'user_id' => Auth::id()
        ]);
        return redirect()->route('home');
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $spend = Spend::find($id);
        $cat_spend = CategorySpend::all();
        return view('spend.edit',compact('spend','cat_spend'));
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
        $this->validate($request, [
            'title' =>  'required|max:60',
            'sum' => 'required|numeric'
        ]);

        $spend = Spend::find($id);
        $spend->update([
            'title' => $request->title,
            'sum' => $request->sum,
            'category_id' => $request->cat_id,
        ]);
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Spend::find($id)->delete();
        return redirect()->route('home');
    }
}
