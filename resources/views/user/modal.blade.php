<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
              <td>{{ $events->id }}</td>
            </tr>
{{--             <tr>
              <th scope="row">ชื่อผู้แจ้ง</th>
              <td>{{ $data->name }}</td>
            </tr>
            <tr>
              <th scope="row">รายละเอียดการประชุม</th>
              <td>{{ $data->describe }}</td>
            </tr>
            <tr>
              <th scope="row">วันที่ใช้งาน</th>
              <td>{{ Date::parse($data->start_date)->format('j F Y') }} - {{ Date::parse($data->end_date)->format('d F Y') }}</td>
              {{-- <td>{{ Date::parse($event->start_date)->format('j F Y')}} - {{ \Carbon\Carbon::parse($event->end_date)->format('d F Y')}}</td> --}}
            </tr> --}}
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>