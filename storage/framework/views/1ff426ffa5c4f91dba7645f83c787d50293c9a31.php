<?php $__env->startSection('style'); ?><link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container" align="center">
        <div class="col-md-11 col-md-offset-2">
            <h1>ประชุม อิอิ </h1>
            <div class="panel panel-default">
                
              <?php $__currentLoopData = $event; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $events): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo Form::open(array('url' => 'update/'.$events->id,'method'=>'PUT','files'=>'true')); ?>

                
                    <div class="row">
                       <div class="col-xs-12 col-sm-12 col-md-12">
                          <?php if(Session::has('success')): ?>
                             <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
                          <?php elseif(Session::has('warnning')): ?>
                              <div class="alert alert-danger"><?php echo e(Session::get('warnning')); ?></div>
                          <?php endif; ?>

                      </div>

                      <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <?php echo Form::label('title','ชื่อการประชุม:'); ?>

                            <div class="">
                              
                            <?php echo Form::text('title', "$events->title", ['class' => 'form-control']); ?>

                            <?php echo $errors->first('title', '<p class="alert alert-danger">:message</p>'); ?>

                            </div>
                        </div>
                      </div>

                      <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <?php echo Form::label('name','ชื่อผู้แจ้ง:'); ?>

                            <div class="">
                            <?php echo Form::text('name', $events->name, ['class' => 'form-control']); ?>

                            <?php echo $errors->first('name', '<p class="alert alert-danger">:message</p>'); ?>

                            </div>
                        </div>
                      </div>

                      <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <?php echo Form::label('describe','รายละเอียด:'); ?>

                            <div class="">
                            <?php echo Form::text('describe', $events->describe, ['class' => 'form-control']); ?>

                            <?php echo $errors->first('describe', '<p class="alert alert-danger">:message</p>'); ?>

                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <?php echo Form::label('start_date','วันที่:'); ?>

                      <div class="row">
                      <div class="col-md-6">
                      <?php echo Form::date('start_date', $events->start_date, ['class' => 'form-control']); ?>

                      <?php echo $errors->first('start_date', '<p class="alert alert-danger">:message</p>'); ?>

                      </div>
                      <div class="col-md-6">
                        <?php echo Form::date('end_date', $events->end_date, ['class' => 'form-control']); ?>

                        <?php echo $errors->first('end_date', '<p class="alert alert-danger">:message</p>'); ?>

                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                      <?php echo Form::label('start_time','เวลา:'); ?>

                      
                      <div class="row">
                      <div class="col-md-6">
                      <?php echo Form::time('start_time', $events->start_time, ['class' => 'form-control']); ?>

                      <?php echo $errors->first('start_time', '<p class="alert alert-danger">:message</p>'); ?>

                      </div>
                      <div class="col-md-6">
                        <?php echo Form::time('end_time', $events->end_time, ['class' => 'form-control']); ?>

                        <?php echo $errors->first('end_time', '<p class="alert alert-danger">:message</p>'); ?>

                        </div>
                    </div>

                  </div>
                  <div class="form-group">
                    <label for="room">ห้องประชุม</label>
                  <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                    <select name="room_id" class="form-control" >
                  <?php $__currentLoopData = $room; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $object): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($object->rid); ?> "
                    <?php if($events->room_id == $object['rid']): ?> <?php echo e('selected'); ?> <?php endif; ?>>
                    <?php echo e($object->roomname); ?> </option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <?php echo $errors->first('room', '<p class="alert alert-danger">:message</p>'); ?>

                    </div>
                  </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                      <div class="col-xs-1 col-sm-1 col-md-1 text-center"> &nbsp;<br/>
                      <?php echo Form::submit('Update',['class'=>'btn btn-primary']); ?>

                      </div>
                    </div>
                   <?php echo Form::close(); ?>

                   
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>