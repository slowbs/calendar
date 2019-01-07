@extends('layout')
@section('style')
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css"/>
@endsection
@section('content')
<div class="container" align="center">
        <div class="col-md-11 col-md-offset-2">
            <h1>ประชุม อิอิ </h1>
            <div align="right">
                    {{-- <a class="btn btn-success" href="{{ url('add') }}"> Create New Product</a> --}}
                    <!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
จองห้องประชุม
</button> --}}

</div>
<br>
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
<div class="form-group">
  <label for="room">ห้องประชุม</label>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
  <select name="room_id" class="form-control" >
@foreach($room as $object)
<option value="{{ $object->rid }} "> {{ $object->roomname }} </option>
@endforeach
</select>
{!! $errors->first('room', '<p class="alert alert-danger">:message</p>') !!}
  </div>
</div>
      <div class="modal-footer">
        {!! Form::submit('Add Event',['class'=>'btn btn-primary']) !!}
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
