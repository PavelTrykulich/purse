@extends('layouts.app')

@section('content')

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-4 text-center">
                <div class="card-header bg-secondary text-white h4 text-center my-2">Оновити витрату</div>
                @include('errors')
                <form action="{{Route('spend.update',$spend->id)}}" method="post" >
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label>Назва</label>
                        <input type="text" class="form-control" name="title" value="{{$spend->title}}">
                        <br>
                        <label>Сума</label>
                        <input type="text" class="form-control" name="sum" value="{{$spend->sum}}">
                        <br>
                        <label>Категорія</label>
                        <select name="cat_id" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                            @foreach($cat_spend as $cat)
                                @if($spend->category_id == $cat->id)
                                    <option selected value="{{$cat->id}}">{{$cat->title}}</option>
                                @else
                                    <option value="{{$cat->id}}">{{$cat->title}}</option>
                                @endif
                            @endforeach
                        </select>
                        <button class="btn btn-success">Оновити</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection