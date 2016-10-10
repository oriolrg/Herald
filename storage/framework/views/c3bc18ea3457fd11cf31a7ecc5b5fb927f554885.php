<?php $__env->startSection('content'); ?>
<div <?php if (\Entrust::hasRole(('admin') || ('escriptor'))) : ?>     <?php if($user->name === Auth::user()->name): ?>     contentEditable="true" spellcheck="true" <?php endif; ?> <?php endif; // Entrust::hasRole ?>>
    <div class="row" xmlns="http://www.w3.org/1999/html">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">



            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="<?php echo e(URL::previous()); ?>"> Back</a>

            </div>

        </div>

    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">
            <h2><?php echo e($item->title); ?></h2>
            <summary><strong><span  id="#contingutDesccripcio"><?php echo e($item->description); ?></span></strong></summary>

        </div>

    </div>
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
<!--TODO fer que l'usuari propietari pugui editar-->
            <div class="form-group">
                <p><img style="width: 50%; height: 40%; margin:0 0 0 0;" src="/imageArticle/<?php echo e($item->path); ?>" alt="" align="top">
                <span  id="#contingutArticle"><?php echo e($item->contingut); ?></span></p>
            </div>

        </div>
    </div>
</div>
<strong>Secció:</strong> <?php echo e($seccio->title); ?> || <strong>Usuari:</strong> <?php echo e($user->name); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>