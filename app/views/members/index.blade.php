@extends('layouts.default')
@section('content')
  <h1>Recent members</h1>

  {{ HTML::linkAction('members.create','New member',[],['class'=>'button']) }}

  @foreach($members as $member)
    <div class="row">
      <div class="columns large-11">
        {{ HTML::linkAction('members.show',$member->name . ' ' . $member->lastname,[$member->id],[]) }}<br>
		
        {{ $member->email }}
      </div>
      <div class="columns large-1">
        {{ HTML::linkAction('members.edit','Edit',[$member->id],['class'=>'button tiny']) }}
        {{ Form::model($member, ['route' => ['members.destroy', $member->id], 'method' => 'DELETE' ]) }}
			{{ Form::button('Destroy', ['type' => 'submit', 'class' => 'tiny alert button'])}}
			{{ $errors->first('members.show','<small class="error">:message</small>') }}
		{{ Form::close() }}
      </div>
    </div>
    <hr>
  @endforeach
   @if(Session::has('errorFk'))
        <small class="error">{{ Session::get('errorFk') }}</small>
    @endif
@stop