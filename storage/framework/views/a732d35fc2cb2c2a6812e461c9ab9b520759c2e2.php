<?php $__env->startSection('content'); ?>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<div class="custom-container container">
    <div class="row">
      <?php $__currentLoopData = $latestcrsl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siteinfos): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="col-md-4 text-center"><h1><?php echo e($siteinfos->Site); ?></h1></div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

      <div class="col-xs-6 col-md-4 text-center"><h2>RAIN</h2></div>
          <div class="col-xs-6 col-md-4 text-center"><h2>LEVEL</h2></div>
           <div class="col-xs-6 col-md-4 text-center"><h2>RAIN</h2></div>
    
        <div class="col-xs-6 col-md-4 text-center"><h2>   <?php echo e($latestcrsl[0]->rainten); ?> mm</h2></div>

        <div class="col-xs-6 col-md-4 text-center"><h2>   <?php echo e($latestcrsl[1]->water); ?> M</h2></div>

        <div class="col-xs-6 col-md-4 text-center"><h2>   <?php echo e($latestcrsl[2]->rainten); ?> mm</h2></div>

      <?php $__currentLoopData = $latestcrsl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siteinfos): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="col-md-4 text-center"><h3>DATA AS OF: <?php echo e($siteinfos->asof); ?></h3></div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masterdesign', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>