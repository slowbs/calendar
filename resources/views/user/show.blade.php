@extends('layout')
@section('style')
@endsection
@section('content')
<div class="container" align="center">
        <div class="col-md-8 col-md-offset-2">
            <h1>ประชุม อิอิ </h1>
            @foreach($event as $events)
            <h2> {{ $events->roomname}} </h2>
            <table class="table table-sm">
              <thead class="thead-light">
                <tr>
                  <th scope="col" style="width:300px">หัวข้อ</th>
                  <th scope="col">รายละเอียด</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">หัวข้อการประชุม</th>
                  <td>{{ $events->title }}</td>
                </tr>
                <tr>
                  <th scope="row">ชื่อผู้แจ้ง</th>
                  <td>{{ $events->name }}</td>
                </tr>
                <tr>
                  <th scope="row">รายละเอียดการประชุม</th>
                  <td>{{ $events->describe }}</td>
                </tr>
                <tr>
                  <th scope="row">วันที่ใช้งาน</th>
                  <td>{{ Date::parse($events->start_date)->format('j F Y') }} - {{ Date::parse($events->end_date)->format('j F Y') }}</td>
                  {{-- <td>{{ Date::parse($event->start_date)->format('j F Y')}} - {{ \Carbon\Carbon::parse($event->end_date)->format('d F Y')}}</td> --}}
                </tr>
                <tr>
                  <th scope="row">ช่วงเวลา</th>
                  <td>{{ Date::parse($events->start_time)->format('H:i') }} น. - {{ Date::parse($events->end_time)->format('H:i') }} น.</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div align="right">
            <a class="btn btn-secondary" href="{{ url()->previous() }}">ย้อนกลับ</a>
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> --}}
{{-- <a class="btn btn-success" href="{{ url()->previous() }}"> Create New Product</a> --}}
@endsection