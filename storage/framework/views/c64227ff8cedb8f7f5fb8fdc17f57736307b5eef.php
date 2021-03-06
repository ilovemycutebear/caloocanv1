<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">CSV Import</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="<?php echo e(route('import_parse')); ?>" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>


                            <div class="form-group">
                                 <label class="col-md-4 control-label">Select Site:</label>
                                <div class="col-md-6">
                                 <select class="form-control" id="sel1">
                                    <?php $__currentLoopData = $siteinfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siteinfos): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                      <option><?php echo e($siteinfos->name); ?> || <?php echo e($siteinfos->id); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                  </select>
                                </div>
                            </div>

                            
                                <label for="csv_file" class="col-md-4 control-label">SELECT DATE RANGE</label>

                                <div class="col-md-6">

                                   <input type="text" id="datepicker" />

                                </div>
                            

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        SUBMIT
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->startPush('map-scripts'); ?>
<script>
  $(function() {
    $("#datepicker" ).daterangepicker();
    console.log("date picker log");
  });
  </script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('masterdesign', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>