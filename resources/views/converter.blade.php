@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="">
                    <div class="form-group">
                        <label >Введіть суму</label>
                        <input type="" class="form-control" name="number" value="{{isset($_GET['number']) ? $_GET['number'] : 1}}">
                        <label >Виберіть валюту яку бажаєте перевести</label>
                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="val">
                            @foreach($course as $val)
                            @if($_GET['val'] == $val->rate)
                            <option selected value="{{$val->rate}}" >{{$val->txt . ' -  ' . 'курс: ' . $val->rate}}</option>
                            @endif
                            <option value="{{$val->rate}}" >{{$val->txt}}</option>
                            @endforeach
                        </select>
                        {{--<label >Виберіть валюту в яку бажаєте перевести</label>--}}
                        {{--<select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="val2">--}}
                            {{--@foreach($course as $val)--}}
                                {{--@if($_GET['val2'] == $val->rate)--}}
                                    {{--<option selected value="{{$val->rate}}" >{{$val->txt . ' -  ' . 'курс: ' . $val->rate}}</option>--}}
                                {{--@endif--}}
                                {{--<option value="{{$val->rate}}" >{{$val->txt}}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}

                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center h4">
                        Результат
                    </div>
                    <div class="card-body text-center h3">
                        @if(isset($_GET['number']) && isset($_GET['val']) )
                            {{$_GET['number'] / $_GET['val']}}
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection