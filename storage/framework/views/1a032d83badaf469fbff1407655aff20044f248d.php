<?php $__env->startSection('style'); ?>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/fc-3.2.5/fh-3.1.4/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/fc-3.2.5/fh-3.1.4/datatables.min.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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
                                <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    
                                    <td><?php echo e($product->id); ?></td>
                                    <td><?php echo e($product->name); ?></td>
                                    <td><?php echo e($product->describe); ?></td>
                                    <td>
                                        <form method="POST" action="<?php echo e(route('list.destroy', $product->id)); ?>"> 
                        
                        
                                            <a class="btn btn-info" href="<?php echo e(url('edit/'.$product->id)); ?>">Edit</a>
                        
                         
                                            
                                            
                        
                                            
                                                    <?php echo csrf_field(); ?> 
                                                    <?php echo method_field('DELETE'); ?>
                                                    <input class="btn btn-danger"  value="DELETE" type="submit" style="width:100px">
                                                    </form>
                                        <!-- </form> -->
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tbody>
                            </table>
                </div>
            </div>
            <br>
            <div align="right">
                    <a class="btn btn-success" href="<?php echo e(url('home')); ?>">ย้อนกลับ</a>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>