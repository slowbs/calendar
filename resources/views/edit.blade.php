@extends('layout')
@section('style')
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
@endsection
@section('content')
<div class="container" align="center">
        <div class="col-md-11 col-md-offset-2">
            <h1>ประชุม อิอิ </h1>
            <div class="panel panel-default">
                
                
                {!! Form::open(array('route' => 'events.add','method'=>'POST','files'=>'true')) !!}
                    <div class="row">
                       <div class="col-xs-12 col-sm-12 col-md-12">
                          @if (Session::has('success'))
                             <div class="alert alert-success">{{ Session::get('success') }}</div>
                          @elseif (Session::has('warnning'))
                              <div class="alert alert-danger">{{ Session::get('warnning') }}</div>
                          @endif

                      </div>

                      <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            {!! Form::label('title','ชื่อการประชุม:') !!}
                            <div class="">
                              {{-- <h1>{{ $event->name }}</h1> --}}
                            {!! Form::text('title', "$event->title", ['class' => 'form-control']) !!}
                            {!! $errors->first('title', '<p class="alert alert-danger">:message</p>') !!}
                            </div>
                        </div>
                      </div>

                      <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            {!! Form::label('name','ชื่อผู้แจ้ง:') !!}
                            <div class="">
                            {!! Form::text('name', $event->name, ['class' => 'form-control']) !!}
                            {!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}
                            </div>
                        </div>
                      </div>

                      <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            {!! Form::label('describe','รายละเอียด:') !!}
                            <div class="">
                            {!! Form::text('describe', $event->describe, ['class' => 'form-control']) !!}
                            {!! $errors->first('describe', '<p class="alert alert-danger">:message</p>') !!}
                            </div>
                        </div>
                      </div>
                    </div>
                      <div class="row justify-content-center">
                        <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                          {!! Form::label('start_date','Start Date:') !!}
                          <div class="">
                          {!! Form::date('start_date', $event->start_date, ['class' => 'form-control']) !!}
                          {!! $errors->first('start_date', '<p class="alert alert-danger">:message</p>') !!}
                          </div>
                        </div>
                      </div>

                      <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                          {!! Form::label('end_date','End Date:') !!}
                          <div class="">
                          {!! Form::date('end_date', $event->end_date, ['class' => 'form-control']) !!}
                          {!! $errors->first('end_date', '<p class="alert alert-danger">:message</p>') !!}
                          </div>
                        </div>
                      </div>

                      <div class="col-xs-1 col-sm-1 col-md-1 text-center"> &nbsp;<br/>
                      {!! Form::submit('Add Event',['class'=>'btn btn-primary']) !!}
                      </div>
                    </div>
                   {!! Form::close() !!}
            </div>

        </div>
    </div>
</div>
@endsection
