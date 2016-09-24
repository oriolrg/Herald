<?php $__env->startSection('content'); ?>

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Create New Item</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="<?php echo e(route('itemCRUD2.index')); ?>"> Tornar</a>

            </div>

        </div>

    </div>

    <?php if(count($errors) > 0): ?>

        <div class="alert alert-danger">

            <strong>Whoops!</strong> Hi ha algun problema amb les dades introduides.<br><br>

            <ul>

                <?php foreach($errors->all() as $error): ?>

                    <li><?php echo e($error); ?></li>

                <?php endforeach; ?>

            </ul>

        </div>

    <?php endif; ?>

    <?php echo Form::open(array('route' => 'itemCRUD2.store','method'=>'POST', 'files' => true)); ?>


    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Titol de l'article:</strong>

                <?php echo Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')); ?>


            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Descripció max 140 caracters:</strong>

                <?php echo Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')); ?>


            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Contingut de l'article:</strong>

                <?php echo Form::textarea('contingut', null, array('placeholder' => 'Contingut','class' => 'form-control','style'=>'height:100px')); ?>


            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Escull una imatge maxim 2Mb:</strong>

                <?php echo Form::file('path'); ?>


            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Escull la secció a la que pertany l'article:</strong>

                <?php echo Form::select('seccio_id', $seccions, array('placeholder' => 'seccio_id','class' => 'form-control')); ?>


            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

            <button type="submit" class="btn btn-primary">Submit</button>

        </div>

    </div>

    <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>