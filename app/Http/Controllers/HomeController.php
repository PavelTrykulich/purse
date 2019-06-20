<?php

namespace App\Http\Controllers;

use App\CategoryIncome;
use App\CategorySpend;
use App\Income;
use App\Spend;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $income = Income::all();
        $spend = Spend::all();
        return view('home',compact('income','spend'));
    }

    public function category()
    {
        $cat_income = CategoryIncome::all();
        $cat_spend = CategorySpend::all();
        return view('category.index',compact('cat_income','cat_spend'));
    }

    public function getConverter(){
        $jsonurl = "https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json";
        $json = file_get_contents($jsonurl);
        $course = json_decode($json);
        isset($_GET['val']) ? $_GET['val'] : $_GET['val'] =  26.334256;
        isset($_GET['val2']) ? $_GET['val2'] : $_GET['val2'] =  1;
        isset($_GET['number']) ? $_GET['number'] : $_GET['number']= 1;
        if (!is_numeric($_GET['number']))$_GET['number']=1;

        return view('converter',compact('course'));
    }

    public function course(){

        $jsonurl = "https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json";
        $json = file_get_contents($jsonurl);
        $course = json_decode($json);
        return view('course',compact('course'));
    }

    public function bank(){

        $jsonurl = "https://bank.gov.ua/NBU_BankInfo/get_data_branch?typ=0&json";
        $json = file_get_contents($jsonurl);
        $banks = json_decode($json);
        //dd(gettype($banks));
        return view('bank',compact('banks'));
    }

    /*public function debt(){

        $jsonurl = "https://bank.gov.ua/NBUStatService/v1/statdirectory/grossextdebt?date=200401&json";
        $json = file_get_contents($jsonurl);
        $debt = json_decode($json);
        return view('debt',compact('debt'));
    }*/
}
