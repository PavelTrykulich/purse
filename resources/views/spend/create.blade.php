@extends('layouts.app')

@section('content')

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-4 text-center">
                <div class="card-header bg-secondary text-white h4 text-center my-2">Створити витрату</div>
                @include('errors')
                <form action="{{Route('spend.store')}}" method="post" >
                    @csrf
                    <div class="form-group">
                        <label>Назва</label>
                        <input type="text" class="form-control" name="title">
                        <br>
                        <label>Сума</label>
                        <input type="text" class="form-control" name="sum">
                        <br>
                        <label>Категорія</label>
                        <select name="cat_id" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">

                            <option selected >Choose...</option>
                            @foreach($cat_spend as $cat)
                                <option value="{{$cat->id}}">{{$cat->title}}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-success">Створити</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection