<?php

namespace App\Http\Controllers;

use App\CategoryIncome;
use App\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
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
        $cat_income = CategoryIncome::all();
        return view('income.create',compact('cat_income'));
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
            'title' =>  'required|unique:incoming||max:60',
            'sum' => 'required|numeric'
        ]);
        Income::create([
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
        $income = Income::find($id);
        $cat_income = CategoryIncome::all();
        return view('income.edit',compact('income','cat_income'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' =>  'required|max:60',
            'sum' => 'required|numeric'
        ]);

        $income = Income::find($id);
        $income->update([
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
        Income::find($id)->delete();
        return redirect()->route('home');
    }
}
