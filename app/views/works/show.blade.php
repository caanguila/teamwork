@extends('layouts.default')
@section('content')
  <h1>
    {{{ $work->title }}}
  </h1>

  {{{ $work->description }}}
@stop