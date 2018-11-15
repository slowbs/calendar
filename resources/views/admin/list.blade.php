@extends('admin.layout')
@section('style')
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/fc-3.2.5/fh-3.1.4/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/fc-3.2.5/fh-3.1.4/datatables.min.js"></script>
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">


                    Members Mother fucker!!!

                    <table class="table table-hover table-bordered table-striped table-sm" id="myTable">
                            <thead style="text-align:center" class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Details</th>
                                    <th width="280px">Action</th>
                                </tr>
                                </thead>
                                <tbody id="myTable" align="center">
                                @foreach ($list as $product)
                                <tr>
                                    
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->describe }}</td>
                                    <td>
                                        <form method="POST" action="{{route('list.destroy', $product->id)}}"> 
                        
                        
                                            <a class="btn btn-info" href="{{ url('edit/'.$product->id) }}">Edit</a>
                        
                         
                                            {{-- <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a> --}}
                                            {{-- <button class="btn btn-primary" data-toggle="modal" data-target="#editModal{{$product->id}}">Edit</button> --}}
                        
                                            
                                                    @csrf 
                                                    @method('DELETE')
                                                    <input class="btn btn-danger"  value="DELETE" type="submit" style="width:100px">
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
                }
            } );
        } );
</script>
@endsection
