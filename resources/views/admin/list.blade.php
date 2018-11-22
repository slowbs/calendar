@extends('admin.layout')
@section('style')
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/fc-3.2.5/fh-3.1.4/datatables.min.css"/>
{{-- <link rel="stylesheet" type="text/css" href="../public/css/all.css"> --}}
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/fc-3.2.5/fh-3.1.4/datatables.min.js"></script>
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    Members Mother fucker!!!
                    <i class="fa fa-user"></i>
                    <i class="fa fa-user"></i>
                    <i class="far fa-save"></i>
                    <i class="far fa-edit"></i>
                    <i class="fas fa-check"></i>
                    <i class="fas fa-times"></i>
                    <table class="table table-hover table-bordered table-striped table-sm" id="myTable">
                            <thead style="text-align:center" class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th style="min-width:100">Title</th>
                                    <th style="min-width:200px">Describe</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Room</th>
                                    <th width="160px">Action</th>
                                </tr>
                                </thead>
                                <tbody id="myTable" align="center">
                                @foreach ($list as $product)
                                <tr>
                                    
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->describe }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ Date::parse($product->start_date)->format('j F Y') }} - <br>{{ Date::parse($product->start_date)->format('j F Y') }}</td>
                                    <td>{{ Date::parse($product->start_time)->format('h:i') }} น. - <br>{{ Date::parse($product->end_time)->format('H:i') }} น.</td>
                                    <td>{{ $product->roomname }}</td>
                                    <td>
                                        <form method="POST" action="{{route('list.destroy', $product->id)}}">
                                            @if($product->status == 2) 
                                            <a class="btn btn-success" href="{{ url('check/'.$product->id) }}"><i class="fas fa-check"></i></a>
                                            @elseif($product->status == 1)
                                            <a class="btn btn-secondary" href="{{ url('uncheck/'.$product->id) }}"><i class="fas fa-times"></i></a>
                                            @else
                                            <a class="btn btn-success" href="{{ url('check/'.$product->id) }}"><i class="fas fa-check"></i></a>
                                            <a class="btn btn-secondary" href="{{ url('uncheck/'.$product->id) }}"><i class="fas fa-times"></i></a>
                                            @endif
                                            <a class="btn btn-info" href="{{ url('edit/'.$product->id) }}"><i class="far fa-edit"></i></a>
                                            
                        
                         
                                            {{-- <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a> --}}
                                            {{-- <button class="btn btn-primary" data-toggle="modal" data-target="#editModal{{$product->id}}">Edit</button> --}}
                        
                                            
                                                    @csrf 
                                                    @method('DELETE')
                                                    {{-- <a class="btn btn-info" type="submit"><i class="far fa-edit"></i>Edit</a> --}}
                                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')"><i class="far fa-trash-alt"></i></button>
                                                    {{-- <input class="btn btn-danger"  value="DELETE" type="submit" style="width:100px"> --}}
                                                    </form>
                                        <!-- </form> -->
                                    </td>
                                </tr>
                                @endforeach
                                <tbody>
                            </table>
                </div>
            </div>
            <br>
            <div align="right">
                    <a class="btn btn-success" href="{{ url('home') }}">ย้อนกลับ</a>
                    </div>
        </div>
    </div>

</div>
<script>
        $(document).ready(function() {
            var table = $('#myTable').DataTable( {
                fixedHeader: {
                    header: true,
                    footer: true
                },
                order: [[0, "desc"]]
            } );
        } );
</script>
@endsection
