@extends('layouts.app')

@section('content')

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-4 text-center">

                <div class="card-header bg-secondary text-white h4 text-center my-2">Створити категорію розходів</div>
                @include('errors')
                <form action="{{Route('category_spend.store')}}" method="post" >
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="title">
                        <br>
                        <button class="btn btn-success">Створити</button>
                    </div>
                </form>



            </div>
        </div>
    </div>

@endsection