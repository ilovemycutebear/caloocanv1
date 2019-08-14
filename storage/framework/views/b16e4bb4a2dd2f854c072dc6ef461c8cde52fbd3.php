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
       <?php if( $siteinfos->siteid == 01 ): ?>
        <div class="col-md-4 center-block" style=" margin-left: -200px;"><h1 class="bg-texta"><?php echo e($siteinfos->Site); ?></h1></div>
       <?php endif; ?>
       <?php if( $siteinfos->siteid == 02 ): ?>
        <div class="col-md-4 center-block" style=" padding-left: 800px;"><h1 class="bg-texta"><?php echo e($siteinfos->Site); ?></h1></div>
      <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

          <div class="col-xs-6 col-md-4 center-block" style=" margin-left: -200px;"><h2 class="bg-textb">WATER LEVEL</h2></div>
          <div class="col-xs-6 col-md-4 center-block" style="padding-left: 800px;"><h2 class="bg-textb">WATER LEVEL</h2></div>


    
        <div class="col-xs-6 col-md-4 center-block" style=" margin-left: -200px;"><h2 class="bg-textc"><?php echo e($latestcrsl[0]->water); ?> M</h2></div>
        <div class="col-xs-6 col-md-4 center-block" style=" padding-left: 800px;"><h2 class="bg-textc">   <?php echo e($latestcrsl[1]->water); ?> M</h2></div>



          <?php if($latestcrsl[0]->sensor == 2 ): ?>
          

        <?php if(strtotime($latestcrsl[0]->asof) > strtotime(\Carbon\Carbon::now()->subMinutes(20)->format('F d Y h:i:s A'))): ?>

          <?php if($latestcrsl[0]->water < $latestcrsl[0]->alarm): ?>
          <div class="col-xs-6 col-md-4 center-block" style=" margin-left:-200px;"><h4 class="bg-texte"> NORMAL <span class="glyphicon glyphicon glyphicon-map-marker RainGreen"></span></h4></div>
            <?php endif; ?>
            <?php if(($latestcrsl[0]->water >= $latestcrsl[0]->alarm)&&($latestcrsl[0]->water < $latestcrsl[0]->alert)): ?>
            <div class="col-xs-6 col-md-4 center-block" style=" margin-left: -200px;"><h4 class="bg-texte"> ALARM <span class="glyphicon glyphicon glyphicon-map-marker RainBlueGreen"></span></h4></div>
            <?php endif; ?>
            <?php if(($latestcrsl[0]->water >= $latestcrsl[0]->alert)&&($latestcrsl[0]->water < $latestcrsl[0]->critical)): ?>
            <div class="col-xs-6 col-md-4 center-block" style=" margin-left: -200px;"><h4 class="bg-texte"> ALERT <span class="glyphicon glyphicon glyphicon-map-marker RainYellow"></span></h4></div>
            <?php endif; ?>
            <?php if($latestcrsl[0]->water >= $latestcrsl[0]->critical): ?>
            <div class="col-xs-6 col-md-4 center-block" style=" margin-left: -200px;"><h4 class="bg-texte"> CRITICAL <span class="glyphicon glyphicon glyphicon-map-marker RainRed"></span></h4></div>
            <?php endif; ?>

          <?php endif; ?>

            <?php if(strtotime($latestcrsl[0]->asof) < strtotime(\Carbon\Carbon::now()->subMinutes(60)->format('F d Y h:i:s A'))): ?>
            <div class="col-xs-6 col-md-4 center-block" style=" margin-left: -200px;"><h4 class="bg-texte"> LATE DATA <span class="glyphicon glyphicon glyphicon-map-marker RainGray"></span></h4></div>
            <?php endif; ?>

          <?php endif; ?> <!--if sensor == one -->


          <?php if($latestcrsl[1]->sensor == 2 ): ?>
          

        <?php if(strtotime($latestcrsl[1]->asof) > strtotime(\Carbon\Carbon::now()->subMinutes(20)->format('F d Y h:i:s A'))): ?>

          <?php if($latestcrsl[1]->water < $latestcrsl[1]->alarm): ?>
          <div class="col-xs-6 col-md-4 center-block" style=" padding-left: 800px;"><h4 class="bg-texte"> NORMAL <span class="glyphicon glyphicon glyphicon-map-marker RainGreen"></span></h4></div>
            <?php endif; ?>
            <?php if(($latestcrsl[1]->water >= $latestcrsl[1]->alarm)&&($latestcrsl[1]->water < $latestcrsl[1]->alert)): ?>
            <div class="col-xs-6 col-md-4 center-block" style=" padding-left: 800px;"><h4 class="bg-texte"> ALARM <span class="glyphicon glyphicon glyphicon-map-marker RainBlueGreen"></span></h4></div>
            <?php endif; ?>
            <?php if(($latestcrsl[1]->water >= $latestcrsl[1]->alert)&&($latestcrsl[1]->water < $latestcrsl[1]->critical)): ?>
            <div class="col-xs-6 col-md-4 center-block" style=" padding-left: 800px;"><h4 class="bg-texte"> ALERT <span class="glyphicon glyphicon glyphicon-map-marker RainYellow"></span></h4></div>
            <?php endif; ?>
            <?php if($latestcrsl[1]->water >= $latestcrsl[1]->critical): ?>
            <div class="col-xs-6 col-md-4 center-block" style=" padding-left: 800px;"><h4 class="bg-texte"> CRITICAL <span class="glyphicon glyphicon glyphicon-map-marker RainRed"></span></h4></div>
            <?php endif; ?>

          <?php endif; ?>

            <?php if(strtotime($latestcrsl[1]->asof) < strtotime(\Carbon\Carbon::now()->subMinutes(60)->format('F d Y h:i:s A'))): ?>
            <div class="col-xs-6 col-md-4 center-block" style=" padding-left: 800px;"><h4 class="bg-texte"> LATE DATA <span class="glyphicon glyphicon glyphicon-map-marker RainGray"></span></h4></div>
            <?php endif; ?>

          <?php endif; ?> <!--if sensor == one -->

      <?php $__currentLoopData = $latestcrsl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siteinfos): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <?php if( $siteinfos->siteid == 01 ): ?>
        <div class="col-md-4 center-block" style=" margin-left: -200px;"><h3 class="bg-textd">DATA AS OF: <?php echo e($siteinfos->asof); ?></h3></div>
        <?php endif; ?>
        <?php if( $siteinfos->siteid == 02 ): ?>
        <div class="col-md-4 center-block" style=" padding-left: 800px;"><h3 class="bg-textd">DATA AS OF: <?php echo e($siteinfos->asof); ?></h3></div>
        <?php endif; ?>


      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('masterdesign', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>