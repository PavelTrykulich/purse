@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-success text-white h3 text-center">Категорії доходів
                        <a href="{{route('category_income.create')}}"><img src="http://s1.iconbird.com/ico/0612/vistabasesoftwareicons/w256h2561339252840PlusOrange.png" width="30" alt="Додати"></a>
                    </div>

                    @if($cat_income->isEmpty())
                        <p class="h4 text-center">У вас немає категорій розходів</p>
                    @else
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Назва</th>
                                <th scope="col">Оновити</th>
                                <th scope="col">Видалити</th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach($cat_income as $cat)
                                <tr>
                                    <td class="h5">{{$cat->title}}</td>
                                    <td>
                                        <a href="{{Route('category_income.edit',$cat->id)}}" class="btn btn-warning">Update</a>
                                    </td>

                                    <td>
                                        <form action="{{Route('category_income.destroy',$cat->id)}}"  method="post" class="btn" >
                                            @method('delete')
                                            @csrf
                                            <button class=" btn-danger">Delete</button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-white bg-danger h3 text-center">Категорії розходів
                        <a href="{{route('category_spend.create')}}"><img src="http://s1.iconbird.com/ico/0612/vistabasesoftwareicons/w256h2561339252840PlusOrange.png" width="30" alt="Додати"></a>
                    </div>

                    @if($cat_spend->isEmpty())
                        <p class="h4 text-center">У вас немає категорій розходів</p>
                    @else
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Назва</th>
                            <th scope="col">Оновити</th>
                            <th scope="col">Видалити</th>
                        </tr>
                        </thead>
                        <tbody>


                        @foreach($cat_spend as $cat)
                            <tr>
                                <td class="h5">{{$cat->title}}</td>
                                <td>
                                    <a href="{{Route('category_spend.edit',$cat->id)}}" class="btn btn-warning">Оновити</a>
                                </td>

                                <td>
                                    <form action="{{Route('category_spend.destroy',$cat->id)}}"  method="post" class="btn" >
                                        @method('delete')
                                        @csrf
                                        <button class=" btn-danger">Видалити</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
