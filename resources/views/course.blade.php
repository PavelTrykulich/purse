@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Назва</th>
                        <th scope="col">Курс до гривні</th>
                        <th scope="col">Скорочення</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($course as $val)
                        <tr>
                            <td>{{$val->txt}}</td>
                            <td>{{$val->rate}}</td>
                            <td>{{$val->cc}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection