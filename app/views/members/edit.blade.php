@extends('layouts.default')
@section('content')
  <h1>Edit Member</h1>
  {{ Form::model($member, array('route' => ['members.update', $member->id], 'method' => 'PUT') ) }}

    {{ Form::label('name', 'name') }}
    {{ Form::text('name') }}
    {{ $errors->first('name','<small class="error">:message</small>') }}

    {{ Form::label('lastname', 'lastname') }}
    {{ Form::text('lastname') }}
    {{ $errors->first('lastname','<small class="error">:message</small>') }}

    {{ Form::label('email', 'email') }}
    {{ Form::text('email') }}
    {{ $errors->first('email','<small class="error">:message</small>') }}

    {{ Form::submit('Update',array('class'=>'button')) }}

  {{ Form::close() }}
@stop