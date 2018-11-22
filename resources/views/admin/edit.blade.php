@extends('admin.layout')
@section('style')<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
@endsection
@section('content')
<div class="container" align="center">
        <div class="col-md-8 col-md-offset-2">
            <h1>ประชุม อิอิ </h1>
            <div class="panel panel-default">
                
              @foreach($event as $events)
                {!! Form::open(array('url' => 'update/'.$events->id,'method'=>'PUT','files'=>'true')) !!}
                
                    <div class="row">
                       <div class="col-xs-12 col-sm-12 col-md-12">
                          @if (Session::has('success'))
                             <div class="alert alert-success">{{ Session::get('success') }}</div>
                          @elseif (Session::has('warnning'))
                              <div class="alert alert-danger">{{ Session::get('warnning') }}</div>
                          @endif

                      </div>

                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group" align="left">
                            {!! Form::label('title','ชื่อการประชุม:') !!}
                            <div class="">
                              {{-- <h1>{{ $event->name }}</h1> --}}
                            {!! Form::text('title', "$events->title", ['class' => 'form-control']) !!}
                            {!! $errors->editerror->first('title', '<p class="alert alert-danger">:message</p>') !!}
                            </div>
                        </div>
                      </div>

                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group" align="left">
                            {!! Form::label('event_name','ชื่อผู้แจ้ง:') !!}
                            <div class="">
                            {!! Form::text('event_name', $events->name, ['class' => 'form-control']) !!}
                            {!! $errors->editerror->first('event_name', '<p class="alert alert-danger">:message</p>') !!}
                            </div>
                        </div>
                      </div>

                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group" align="left">
                            {!! Form::label('describe','รายละเอียด:') !!}
                            <div class="">
                            {!! Form::text('describe', $events->describe, ['class' => 'form-control']) !!}
                            {!! $errors->editerror->first('describe', '<p class="alert alert-danger">:message</p>') !!}
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group" align="left">
                      <div class='row'>
                      <div class="col-md-6">
                      {!! Form::label('start_date','วันที่:') !!}
                      </div>
                    </div>
                      <div class="row">
                      <div class="col-md-4">
                      {!! Form::date('start_date', $events->start_date, ['class' => 'form-control']) !!}
                      {!! $errors->editerror->first('start_date', '<p class="alert alert-danger">:message</p>') !!}
                      </div><span class="align-bottom" style="line-height:200%">-</span>
                      <div class="col-md-4">
                       {!! Form::date('end_date', $events->end_date, ['class' => 'form-control']) !!}
                      {!! $errors->editerror->first('end_date', '<p class="alert alert-danger">:message</p>') !!}
                      </div>
                    </div>
                    </div>
                    <div class="form-group" align="left">
                      {!! Form::label('start_time','เวลา:') !!}
                      {{-- <div class="row d-flex justify-content-center"> --}}
                      <div class="row">
                      <div class="col-md-4">
                      {!! Form::time('start_time', $events->start_time, ['class' => 'form-control']) !!}
                      {!! $errors->editerror->first('start_time', '<p class="alert alert-danger">:message</p>') !!}
                      </div><span class="align-bottom" style="line-height:200%">-</span>
                      <div class="col-md-4">
                        {!! Form::time('end_time', $events->end_time, ['class' => 'form-control']) !!}
                        {!! $errors->editerror->first('end_time', '<p class="alert alert-danger">:message</p>') !!}
                        </div>
                    </div>
                  </div>
                  <div class="form-group" align="left">
                    <label for="room">ห้องประชุม</label>
                  <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                    <select name="room_id" class="form-control" >
                  @foreach($room as $object)
                  <option value="{{ $object->rid }} "
                    @if($events->room_id == $object['rid']) {{ 'selected' }} @endif>
                    {{ $object->roomname }} </option>
                  @endforeach
                  </select>
                  {!! $errors->editerror->first('room', '<p class="alert alert-danger">:message</p>') !!}
                    </div>
                  </div>
                    @endforeach
{{--                       <div class="row justify-content-center">
                        <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                          {!! Form::label('start_date','Start Date:') !!}
                          <div class="">
                          {!! Form::date('start_date', $event->start_date, ['class' => 'form-control']) !!}
                          {!! $errors->editerror->first('start_date', '<p class="alert alert-danger">:message</p>') !!}
                          </div>
                        </div>
                      </div>

                      <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                          {!! Form::label('end_date','End Date:') !!}
                          <div class="">
                          {!! Form::date('end_date', $event->end_date, ['class' => 'form-control']) !!}
                          {!! $errors->editerror->first('end_date', '<p class="alert alert-danger">:message</p>') !!}
                          </div>
                        </div>
                      </div> --}}
                    </div>
                      <div class="text-right">
                      {!! Form::submit('Update',['class'=>'btn btn-primary']) !!}
                      <a class="btn btn-secondary" href="{{ url('home') }}">ย้อนกลับ</a>
                      </div>
                    </div>
                   {!! Form::close() !!}
                   
            </div>

        </div>
    </div>
</div>
@endsection
