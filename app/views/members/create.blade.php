@extends('layouts.default')
@section('content')
  <h1>Create Member</h1>
  {{ Form::open(array('route' => 'members.store')) }}

    {{ Form::label('name', 'name') }}
    {{ Form::text('name') }}
    {{ $errors->first('name','<small class="error">:message</small>') }}

    {{ Form::label('lastname', 'lastname') }}
    {{ Form::text('lastname') }}
    {{ $errors->first('lastname','<small class="error">:message</small>') }}

    {{ Form::label('email', 'email') }}
    {{ Form::text('email') }}
    {{ $errors->first('email','<small class="error">:message</small>') }}

    {{ Form::submit('Create',array('class'=>'button')) }}

  {{ Form::close() }}
@stop