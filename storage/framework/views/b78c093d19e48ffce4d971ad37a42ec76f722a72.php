<?php $__env->startSection('style'); ?>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container" align="center">
        <div class="col-md-11 col-md-offset-2">
            <h1>ประชุม อิอิ </h1>
            <div class="panel panel-default">
                
                
                <?php echo Form::open(array('route' => 'events.add','method'=>'POST','files'=>'true')); ?>

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
                              
                            <?php echo Form::text('title', "$event->title", ['class' => 'form-control']); ?>

                            <?php echo $errors->first('title', '<p class="alert alert-danger">:message</p>'); ?>

                            </div>
                        </div>
                      </div>

                      <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <?php echo Form::label('name','ชื่อผู้แจ้ง:'); ?>

                            <div class="">
                            <?php echo Form::text('name', $event->name, ['class' => 'form-control']); ?>

                            <?php echo $errors->first('name', '<p class="alert alert-danger">:message</p>'); ?>

                            </div>
                        </div>
                      </div>

                      <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <?php echo Form::label('describe','รายละเอียด:'); ?>

                            <div class="">
                            <?php echo Form::text('describe', $event->describe, ['class' => 'form-control']); ?>

                            <?php echo $errors->first('describe', '<p class="alert alert-danger">:message</p>'); ?>

                            </div>
                        </div>
                      </div>
                    </div>
                      <div class="row justify-content-center">
                        <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                          <?php echo Form::label('start_date','Start Date:'); ?>

                          <div class="">
                          <?php echo Form::date('start_date', $event->start_date, ['class' => 'form-control']); ?>

                          <?php echo $errors->first('start_date', '<p class="alert alert-danger">:message</p>'); ?>

                          </div>
                        </div>
                      </div>

                      <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                          <?php echo Form::label('end_date','End Date:'); ?>

                          <div class="">
                          <?php echo Form::date('end_date', $event->end_date, ['class' => 'form-control']); ?>

                          <?php echo $errors->first('end_date', '<p class="alert alert-danger">:message</p>'); ?>

                          </div>
                        </div>
                      </div>

                      <div class="col-xs-1 col-sm-1 col-md-1 text-center"> &nbsp;<br/>
                      <?php echo Form::submit('Add Event',['class'=>'btn btn-primary']); ?>

                      </div>
                    </div>
                   <?php echo Form::close(); ?>

            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>