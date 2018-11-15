<?php $__env->startSection('style'); ?>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container" align="center">
        <div class="col-md-11 col-md-offset-2">
            <h1>ประชุม อิอิ </h1>
            <div align="right">
                    <a class="btn btn-success" href="<?php echo e(url('add')); ?>"> Create New Product</a>
                    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
  Launch demo modal
</button>
            <div class="panel panel-default">
                
                
               
            </div>

</div>
<?php echo $calendar->calendar(); ?>

<?php echo $calendar->script(); ?>

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
      <?php echo Form::open(array('route' => 'events.add','method'=>'POST','files'=>'true')); ?>

        <div class="col-xs-12 col-sm-12 col-md-12">
          <?php if(Session::has('success')): ?>
             <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
          <?php elseif(Session::has('warnning')): ?>
              <div class="alert alert-danger"><?php echo e(Session::get('warnning')); ?></div>
          <?php endif; ?>

      </div>
        <div class="form-group">
            <?php echo Form::label('title','ชื่อการประชุม:'); ?>

            <div class="">
            <?php echo Form::text('title', null, ['class' => 'form-control']); ?>

            <?php echo $errors->first('title', '<p class="alert alert-danger">:message</p>'); ?>

        </div>
      </div>
      <div class="form-group">
        <?php echo Form::label('describe','รายละเอียดการประชุม:'); ?>

        <div class="">
        <?php echo Form::text('describe', null, ['class' => 'form-control']); ?>

        <?php echo $errors->first('describe', '<p class="alert alert-danger">:message</p>'); ?>

    </div>
  </div>
  <div class="form-group">
    <?php echo Form::label('name','ชื่อผู้แจ้ง:'); ?>

    <div class="">
    <?php echo Form::text('name', null, ['class' => 'form-control']); ?>

    <?php echo $errors->first('name', '<p class="alert alert-danger">:message</p>'); ?>

</div>
</div>
<div class="form-group">
  <?php echo Form::label('start_date','วันที่:'); ?>

  <div class="row">
  <div class="col-md-6">
  <?php echo Form::date('start_date', null, ['class' => 'form-control']); ?>

  <?php echo $errors->first('start_date', '<p class="alert alert-danger">:message</p>'); ?>

  </div>
  <div class="col-md-6">
    <?php echo Form::date('end_date', null, ['class' => 'form-control']); ?>

    <?php echo $errors->first('end_date', '<p class="alert alert-danger">:message</p>'); ?>

    </div>
</div>
</div>
<div class="form-group">
  <?php echo Form::label('start_time','เวลา:'); ?>

  
  <div class="row">
  <div class="col-md-6">
  <?php echo Form::time('start_time', null, ['class' => 'form-control']); ?>

  <?php echo $errors->first('start_time', '<p class="alert alert-danger">:message</p>'); ?>

  </div>
  <div class="col-md-6">
    <?php echo Form::time('end_time', null, ['class' => 'form-control']); ?>

    <?php echo $errors->first('end_time', '<p class="alert alert-danger">:message</p>'); ?>

    </div>
</div>
  
</div>
<div class="form-group row">
  <label for="room" class="col-md-4 col-form-label text-md-right"><?php echo e(__('สถานะ')); ?></label>

  <div class="col-md-6">
  <select name="room" class="form-control" >
<?php $__currentLoopData = $room; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $object): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($object->id); ?> "> <?php echo e($object->name); ?> </option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
<?php echo $errors->first('room', '<p class="alert alert-danger">:message</p>'); ?>

  </div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <?php echo Form::submit('Add Event',['class'=>'btn btn-primary']); ?>

      </div>
      <?php echo Form::close(); ?>

    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/locale-all.js"></script>
<?php if(session()->get('warnning')): ?>

<script>
$(function() {
$('#exampleModal2').modal('show');
/* console.log('fuck'); */
});
</script>
<?php endif; ?>
<?php echo $calendar->script(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>