@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-2">
                            <ul>
                                <li>user 2</li>
                                <li>user 3</li>
                                <li>user 4</li>
                                <li>user 5</li>
                            </ul>
                        </div>
                        <div class="col-md-10">
                            <div class="row" style="min-height: 200px; border: 1px solid; margin: 5px;">
                                    @foreach($messages as $key => $message)
                                        <div class="{{ ($message->from_id==$authUser)?'right':'left' }}">{{$message->message}}</div>
                                    @endforeach
                            </div>
                            <div class="row" style="margin-top: 10px;">
                                <form method="post" action="{{action('MessageController@sendMessage')}}" id="messageForm" name="messageForm">
                                    {{ csrf_field() }}
                                    <div class="col-md-10">
                                        <input type="text" name="message" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" class="btn btn-primary" value="send">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
