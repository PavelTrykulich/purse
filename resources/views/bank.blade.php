
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

            </div>
        </div>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <form action="">
                    <div class="form-group">
                        <label >Введіть місто</label>
                        <input type="" class="form-control" name="city" value="{{isset($_GET['city']) ? $_GET['city'] : $_GET['city'] = ''}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Назва</th>
                        <th scope="col">Місто</th>
                        <th scope="col">Адреса</th>
                        <th scope="col">Дата відкриття</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($banks as $bank)
                        @if(isset($_GET['city']) && $_GET['city'] != '')
                            @if($_GET['city'] == $bank->NP)
                                <tr>
                                    <td>{{$bank->SHORTNAME}}</td>
                                    <td>{{$bank->NP}}</td>
                                    <td>{{$bank->ADRESS}}</td>
                                    <td>{{$bank ->D_OPEN}}</td>
                                </tr>
                            @endif
                        @else
                        <tr>
                            <td>{{$bank->SHORTNAME}}</td>
                            <td>{{$bank->NP}}</td>
                            <td>{{$bank->ADRESS}}</td>
                            <td>{{$bank ->D_OPEN}}</td>
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection
