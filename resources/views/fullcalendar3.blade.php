@extends('layout')
@section('style')
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css"/>
@endsection
@section('content')
<div class="container" align="center">
        <div class="col-md-11 col-md-offset-2">
            <h1>ประชุม อิอิ </h1>
            <div align="right">
                    <a class="btn btn-success" href="{{ url('add') }}"> Create New Product</a>
                    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
  Launch demo modal
</button>
            <div class="panel panel-default">
                
                
               {{--  {!! Form::open(array('route' => 'events.add','method'=>'POST','files'=>'true')) !!}
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
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('title', '<p class="alert alert-danger">:message</p>') !!}
                            </div>
                        </div>
                      </div>

                      <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            {!! Form::label('name','ชื่อผู้แจ้ง:') !!}
                            <div class="">
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}
                            </div>
                        </div>
                      </div>

                      <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            {!! Form::label('describe','รายละเอียด:') !!}
                            <div class="">
                            {!! Form::text('describe', null, ['class' => 'form-control']) !!}
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
                          {!! Form::date('start_date', null, ['class' => 'form-control']) !!}
                          {!! $errors->first('start_date', '<p class="alert alert-danger">:message</p>') !!}
                          </div>
                        </div>
                      </div>

                      <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                          {!! Form::label('end_date','End Date:') !!}
                          <div class="">
                          {!! Form::date('end_date', null, ['class' => 'form-control']) !!}
                          {!! $errors->first('end_date', '<p class="alert alert-danger">:message</p>') !!}
                          </div>
                        </div>
                      </div>

                      <div class="col-xs-1 col-sm-1 col-md-1 text-center"> &nbsp;<br/>
                      {!! Form::submit('Add Event',['class'=>'btn btn-primary']) !!}
                      </div>
                    </div>
                   {!! Form::close() !!} --}}
            </div>
{{--             </div>
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                  <div class="panel-body">
                      {!! $calendar->calendar() !!}
                      {!! $calendar->script() !!}
                  </div>

              </div>
              <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                Fuck this shit
                <div class="panel-body">
                    {!! $calendar->script() !!}
                </div>
                
              </div>
              <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">3</div>
            </div>
        </div>
    </div> --}}
</div>
{!! $calendar->calendar() !!}
{!! $calendar->script() !!}
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      {!! Form::open(array('route' => 'events.add','method'=>'POST','files'=>'true')) !!}
        <div class="col-xs-12 col-sm-12 col-md-12">
          @if (Session::has('success'))
             <div class="alert alert-success">{{ Session::get('success') }}</div>
          @elseif (Session::has('warnning'))
              <div class="alert alert-danger">{{ Session::get('warnning') }}</div>
          @endif

      </div>
        <div class="form-group">
            {!! Form::label('title','ชื่อการประชุม:') !!}
            <div class="">
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
            {!! $errors->first('title', '<p class="alert alert-danger">:message</p>') !!}
        </div>
      </div>
      <div class="form-group">
        {!! Form::label('describe','รายละเอียดการประชุม:') !!}
        <div class="">
        {!! Form::text('describe', null, ['class' => 'form-control']) !!}
        {!! $errors->first('describe', '<p class="alert alert-danger">:message</p>') !!}
    </div>
  </div>
  <div class="form-group">
    {!! Form::label('name','ชื่อผู้แจ้ง:') !!}
    <div class="">
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}
</div>
</div>
<div class="form-group">
  {!! Form::label('start_date','วันที่:') !!}
  <div class="row">
  <div class="col-md-6">
  {!! Form::date('start_date', null, ['class' => 'form-control']) !!}
  {!! $errors->first('start_date', '<p class="alert alert-danger">:message</p>') !!}
  </div>
  <div class="col-md-6">
    {!! Form::date('end_date', null, ['class' => 'form-control']) !!}
    {!! $errors->first('end_date', '<p class="alert alert-danger">:message</p>') !!}
    </div>
</div>
</div>
<div class="form-group">
  {!! Form::label('start_time','เวลา:') !!}
  {{-- <div class="row d-flex justify-content-center"> --}}
  <div class="row">
  <div class="col-md-6">
  {!! Form::time('start_time', null, ['class' => 'form-control']) !!}
  {!! $errors->first('start_time', '<p class="alert alert-danger">:message</p>') !!}
  </div>
  <div class="col-md-6">
    {!! Form::time('end_time', null, ['class' => 'form-control']) !!}
    {!! $errors->first('end_time', '<p class="alert alert-danger">:message</p>') !!}
    </div>
</div>
  
</div>
<div class="form-group row">
  <label for="room" class="col-md-4 col-form-label text-md-right">{{ __('สถานะ') }}</label>

  <div class="col-md-6">
  <select name="room" class="form-control" >
@foreach($room as $object)
<option value="{{ $object->id }} "> {{ $object->name }} </option>
@endforeach
</select>
{!! $errors->first('room', '<p class="alert alert-danger">:message</p>') !!}
  </div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {!! Form::submit('Add Event',['class'=>'btn btn-primary']) !!}
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/locale-all.js"></script>
@if(session()->get('warnning'))
{{-- @if(1==1) --}}
<script>
$(function() {
$('#exampleModal2').modal('show');
/* console.log('fuck'); */
});
</script>
@endif
{!! $calendar->script() !!}
@endsection
{{-- @include('modal') --}}
