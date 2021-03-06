<div class="box">
    <div class="box-header">

        <h3 class="box-title"></h3>

        <div class="pull-right">
            <?php echo $grid->renderFilter(); ?>

            <?php echo $grid->renderExportButton(); ?>

            <?php echo $grid->renderCreateButton(); ?>

        </div>

        <span>
            <?php echo $grid->renderHeaderTools(); ?>

        </span>

    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <tr>
                <?php $__currentLoopData = $grid->columns(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <th><?php echo e($column->getLabel()); ?><?php echo $column->sorter(); ?></th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </tr>

            <?php $__currentLoopData = $grid->rows(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <tr <?php echo $row->getRowAttributes(); ?>>
                <?php $__currentLoopData = $grid->columnNames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <td <?php echo $row->getColumnAttributes($name); ?>>
                    <?php echo $row->column($name); ?>

                </td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </table>
    </div>
    <div class="box-footer clearfix">
        <?php echo $grid->paginator(); ?>

    </div>
    <!-- /.box-body -->
</div>
