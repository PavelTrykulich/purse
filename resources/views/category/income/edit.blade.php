@extends('layouts.app')

@section('content')

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-4 text-center">

                <div class="card-header bg-secondary text-white h4 text-center my-2">Оновити категорію доходів</div>
                @include('errors')
                <form action="{{Route('category_income.update',$category->id)}}" method="post" >
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" value="{{$category->title}}">
                        <br>
                        <button class="btn btn-success">Оновити</button>
                    </div>
                </form>



            </div>
        </div>
    </div>

@endsection