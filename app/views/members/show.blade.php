@extends('layouts.default')
@section('content')
  <h1>
    {{{ $member->name . ' ' . $member->lastname }}}
  </h1>

  {{{ $member->email }}}
@stop