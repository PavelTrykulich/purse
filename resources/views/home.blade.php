@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header bg-success text-white h3 text-center">Доходи
                <a href="{{route('income.create')}}"><img src="http://s1.iconbird.com/ico/0612/vistabasesoftwareicons/w256h2561339252840PlusOrange.png" width="30" alt="Додати"></a>
                </div>
                @if($income->isEmpty())
                    <div class="card-body text-center h4">
                        У вас немає доходів
                    </div>
                @else
                <div class="card-body">
                   <div class="h5 text-center">
                   {{Auth::user()->getAllIncome()}}
                   </div>
                </div>
                    <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Назва</th>
                        <th scope="col">Категорія</th>
                        <th scope="col">Сума</th>
                        <th scope="col">Оновити</th>
                        <th scope="col">Видалити</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($income as $inc)
                    <tr>
                        <td>{{$inc->title}}</td>
                        <td>{{$inc->category->title}}</td>
                        <td>{{$inc->sum}}</td>
                        <td>
                            <a href="{{Route('income.edit',$inc->id)}}" class="">Оновити</a>
                        </td>

                        <td>
                            <form action="{{Route('income.destroy',$inc->id)}}"  method="post" class="btn" >
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
        <div class="col-md-2">
            <div class="card">
                <div class="card-header bg-info text-white h3 text-center">Баланс

                </div>

                <div class="card-body">
                    <div class="h5 text-center">
                        {{Auth::user()->getAllIncome() - Auth::user()->getAllSpend()}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header text-white bg-danger h3 text-center">Розходи
                <a href="{{route('spend.create')}}"><img src="http://s1.iconbird.com/ico/0612/vistabasesoftwareicons/w256h2561339252840PlusOrange.png" width="30" alt="Додати"></a>
                </div>
                @if($spend->isEmpty())
                    <div class="card-body text-center h4">
                        У вас немає розходів
                    </div>
                @else
                <div class="card-body">
                    <div class="h5 text-center">
                        {{Auth::user()->getAllSpend()}}
                    </div>
                </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Назва</th>
                            <th scope="col">Категорія</th>
                            <th scope="col">Сума</th>
                            <th scope="col">Оновити</th>
                            <th scope="col">Видалити</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($spend as $sp)
                            <tr>
                                <td>{{$sp->title}}</td>
                                <td>{{$sp->category->title}}</td>
                                <td>{{$sp->sum}}</td>
                                <td>
                                    <a href="{{Route('spend.edit',$sp->id)}}" class="">Оновити</a>
                                </td>

                                <td>
                                    <form action="{{Route('spend.destroy',$sp->id)}}"  method="post" class="btn" >
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
