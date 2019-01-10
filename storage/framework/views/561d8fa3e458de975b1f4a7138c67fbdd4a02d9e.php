<?php $__env->startSection('content'); ?>

<div class="alert alert-warning">
  <strong>INFORMATION!</strong> this NIA-MARIIS page is still under development. For the mean time, please use <a href="http://www.automata-inc.net/McCrometer/Feeds.aspx" target="_blank"> AUTOMATA SITE </a> and <a href="https://stormcentral.waterlog.com" target="_blank"> STORM CENTRAL </a> for updated data
    </div>

   <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
    <li data-target="#myCarousel" data-slide-to="4"></li>
    <li data-target="#myCarousel" data-slide-to="5"></li>
    <li data-target="#myCarousel" data-slide-to="6"></li>
    <li data-target="#myCarousel" data-slide-to="7"></li>
    <li data-target="#myCarousel" data-slide-to="8"></li>
    <li data-target="#myCarousel" data-slide-to="9"></li>
    <li data-target="#myCarousel" data-slide-to="10"></li>
    <li data-target="#myCarousel" data-slide-to="11"></li>


  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="<?php echo e(URL::asset('img/pics/def.jpg')); ?>" alt="ayyy">
      <div class="container">
      <div class="row carousel-caption">
        <div class="col-xs-12 text-center"><h1>NIA MARIIS</h1></div>
        <div class="col-lg-4"><h1></h1></div>
        <div class="col-lg-4"><h1></h1></div>
        <div class="col-lg-4"><h1></h1></div>
        <div class="col-lg-4"></div>
        <div class="col-lg-4"></div>
        <div class="col-lg-4"></div>
        <div class="col-xs-12"></div>
     </div>
      </div>
    </div>

    <?php $__currentLoopData = $latestcrsl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siteinfos): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <div class="item">
     <img src="<?php echo e(URL::asset('img/pics/def.jpg')); ?>" alt="ayyy">
      <div class="container">
       <div class="row carousel-caption">
        <div class="col-xs-12 text-center"><h1><?php echo e($siteinfos->Site); ?></h1></div>
        <div class="col-lg-4"><h1>RAIN</h1></div>
        <div class="col-lg-4"><h1>WATER LEVEL</h1></div>
        <div class="col-lg-4"><h1>BATTERY</h1></div>
        <div class="col-lg-4"><h1><?php echo e($siteinfos->rainten); ?></h1></div>
        <div class="col-lg-4"><h1><?php echo e($siteinfos->water); ?></h1></div>
        <div class="col-lg-4"><h1>NA</h1></div>
        <div class="col-xs-12"><h1>DATA AS OF: <?php echo e($siteinfos->asof); ?></h1></div>
     </div>
      </div>
    </div>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('masterdesign', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>