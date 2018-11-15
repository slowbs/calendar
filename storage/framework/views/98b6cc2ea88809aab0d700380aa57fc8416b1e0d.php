<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container" align="center">
        <div class="col-md-8 col-md-offset-2">
            <h1>ประชุม อิอิ </h1>
            <?php $__currentLoopData = $event; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $events): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <h2> <?php echo e($events->roomname); ?> </h2>
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
                  <td><?php echo e($events->title); ?></td>
                </tr>
                <tr>
                  <th scope="row">ชื่อผู้แจ้ง</th>
                  <td><?php echo e($events->name); ?></td>
                </tr>
                <tr>
                  <th scope="row">รายละเอียดการประชุม</th>
                  <td><?php echo e($events->describe); ?></td>
                </tr>
                <tr>
                  <th scope="row">วันที่ใช้งาน</th>
                  <td><?php echo e(Date::parse($events->start_date)->format('j F Y')); ?> - เวลา <?php echo e(Date::parse($events->start_date)->format('j F Y')); ?></td>
                  
                </tr>
                <tr>
                  <th scope="row">ช่วงเวลา</th>
                  <td><?php echo e(Date::parse($events->start_time)->format('h:i')); ?> น. - <?php echo e(Date::parse($events->end_time)->format('H:i')); ?> น.</td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
            <div align="right">
            <a class="btn btn-success" href="<?php echo e(url()->previous()); ?>">ย้อนกลับ</a>
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>