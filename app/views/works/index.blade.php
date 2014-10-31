@extends('layouts.default')
@section('content')
  <h1>Recent Works</h1>

  {{ HTML::linkAction('works.create','New work',[],['class'=>'button']) }}

    <dl class="accordion" data-accordion>
    <dd class="accordion-navigation">
      <a href="#panel1">Pendientes</a>
      <div id="panel1" class="content active">
        @foreach($works as $work)
          @if ($work->completed == false)
            <div class="row">
              <div class="columns large-11">
                {{ HTML::linkAction('works.show',$work->title,[$work->id],[]) }}<br>
                {{ $work->member->name . ' ' . $work->member->lastname }}<br>
                Duracion: {{ $work->duration }} Horas<br>
                Incompleta<br>
                <small>Fecha de Inicio: {{ $work->inidate }}</small><br>
                <small>Fecha de Terminación: {{ $work->enddate }}</small><br>
              </div>
              <div class="columns large-1">
                {{ HTML::linkAction('works.edit','Edit',[$work->id],['class'=>'button tiny']) }}
                {{ Form::model($work, ['route' => ['works.destroy', $work->id], 'method' => 'DELETE' ]) }}
                {{ Form::button('Destroy', ['type' => 'submit', 'class' => 'tiny alert button'])}}
                {{ Form::close() }}
              </div>
            </div>
            <hr>
          @endif
        @endforeach
      </div>
    </dd>
    <dd class="accordion-navigation">
      <a href="#panel2">Terminadas</a>
      <div id="panel2" class="content">
        @foreach($works as $work)
          @if ($work->completed)
            <div class="row">
              <div class="columns large-11">
                {{ HTML::linkAction('works.show',$work->title,[$work->id],[]) }}<br>
                {{ $work->member->name . ' ' . $work->member->lastname }}<br>
                Duracion: {{ $work->duration }} Horas<br>
                Completa<br>
                <small>Fecha de Inicio: {{ $work->inidate }}</small><br>
                <small>Fecha de Terminación: {{ $work->enddate }}</small><br>
              </div>
              <div class="columns large-1">
                {{ HTML::linkAction('works.edit','Edit',[$work->id],['class'=>'button tiny']) }}
                {{ Form::model($work, ['route' => ['works.destroy', $work->id], 'method' => 'DELETE' ]) }}
                {{ Form::button('Destroy', ['type' => 'submit', 'class' => 'tiny alert button'])}}
                {{ Form::close() }}
              </div>
            </div>
            <hr>
          @endif
        @endforeach
      </div>
    </dd>
  </dl>

@stop