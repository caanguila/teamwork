@extends('layouts.default')
@section('content')
  <h1>Edit Work</h1>
  {{ Form::model($work, array('route' => ['works.update', $work->id], 'method' => 'PUT') ) }}

    {{ Form::label('title', 'Title') }}
    {{ Form::text('title') }}
    {{ $errors->first('title','<small class="error">:message</small>') }}

    {{ Form::label('description', 'Description') }}
    {{ Form::textarea('description') }}

    {{ Form::label('member_id', 'Member') }}
    {{ Form::select('member_id',$members) }}
  {{ $errors->first('member_id','<small class="error">:message</small>') }}

  {{ Form::label('duration', 'Duration') }}
    {{ Form::text('duration') }}
    {{ $errors->first('duration','<small class="error">:message</small>') }}

  <div class="panel">
    <div class="alert alert-box" id="alert">
      <strong>Oh snap!</strong>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>Start date&nbsp;
            <a href="#" class="button small" id="dp4" data-date-format="yyyy-mm-dd" data-date="{{{ $work->inidate}}}" >Change</a>
            {{ $errors->first('dp4','<small class="error">:message</small>') }}
          </th>
          <th>End date&nbsp;
            <a href="#" class="button small" id="dp5" data-date-format="yyyy-mm-dd" data-date="{{{ $work->enddate}}}">Change</a>
            {{ $errors->first('dp5','<small class="error">:message</small>') }}
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td >{{ Form::text('inidate',null,array('id' => 'inidate')) }}</td>
          <td >{{ Form::text('enddate',null,array('id' => 'enddate')) }}</td>
        </tr>
      </tbody>
    </table>
  </div>

  {{ Form::label('completed', 'Completed') }}
  {{ Form::checkbox('completed') }}
  {{ $errors->first('completed','<small class="error">:message</small>') }}
  <br/>

    {{ Form::submit('Publish',array('class'=>'button')) }}

  {{ Form::close() }}
@stop
@section('scri')
  <script>
      $(function () {
        $('#alert').hide();

        // implementation of disabled form fields
        var nowTemp = new Date();
        var year = nowTemp.getFullYear();
        var month = nowTemp.getMonth() + 1;
        var day = nowTemp.getDate();
        var now = new Date(year, nowTemp.getMonth(), day, 0, 0, 0, 0);

        var startDate = $('#inidate').val();
        var endDate = $('#enddate').val();



        //$('#inidate').val(year+'-'+month+'-'+day);
        //$('#enddate').val(year+'-'+month+'-'+day);

        $('#dp4').fdatepicker({
          onRender: function (date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function (ev) {
          if (ev.date.valueOf() > endDate.valueOf()) {
            $('#alert').show().find('strong').text('The start date can not be greater then the end date');
          } else {
            $('#alert').hide();
            startDate = new Date(ev.date);
            $('#inidate').val($('#dp4').data('date'));
          }
          $('#dp4').fdatepicker('hide');
        });

        $('#dp5').fdatepicker({
          onRender: function (date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function (ev) {
          if (ev.date.valueOf() < startDate.valueOf()) {
            $('#alert').show().find('strong').text('The end date can not be less then the start date');
          } else {
            $('#alert').hide();
            endDate = new Date(ev.date);
            $('#enddate').val($('#dp5').data('date'));
          }
          $('#dp5').fdatepicker('hide');
        });

      });
  </script>
@stop