<?php $__env->startSection('content'); ?>
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Articles</h2>

            </div>

            <div class="pull-right">

                <?php if (\Entrust::can('item-create')) : ?>

                <a class="btn btn-success" href="<?php echo e(route('itemCRUD2.create')); ?>"> Create New Item</a>

                <?php endif; // Entrust::can ?>

            </div>

        </div>

    </div>

    <?php if($message = Session::get('success')): ?>

        <div class="alert alert-success">

            <p><?php echo e($message); ?></p>

        </div>

    <?php endif; ?>

    <table class="table table-bordered">

        <tr>

            <th>Seccio</th>

            <th>Titol</th>

            <th>Descripció</th>

            <th>Article</th>

            <th>Autor</th>

            <th width="280px">Action</th>

        </tr>

        <?php foreach($items as $key => $item): ?>

            <tr>

                <td><?php echo e($item->titleSeccio); ?></td>

                <td><?php echo e($item->title); ?></td>

                <td><span  id="#contingutDesccripcio"><?php echo e($item->description); ?></span></td>

                <td><span  id="#contingutArticle"><?php echo e($item->contingut); ?></span></td>

                <td><?php echo e($item->nom_usuari); ?></td>

                <td>

                    <a class="btn btn-info" href="<?php echo e(route('itemCRUD2.show',$item->id)); ?>">Vista prèvia</a>

                    <?php if (\Entrust::can('item-edit')) : ?>

                    <a class="btn btn-primary" href="<?php echo e(route('itemCRUD2.edit',$item->id)); ?>">Editar</a>

                    <?php endif; // Entrust::can ?>

                    <?php if (\Entrust::can('item-delete')) : ?>

                    <?php echo Form::open(['method' => 'DELETE','route' => ['itemCRUD2.destroy', $item->id],'style'=>'display:inline']); ?>


                    <?php echo Form::submit('Borrar', ['class' => 'btn btn-danger']); ?>


                    <?php echo Form::close(); ?>


                    <?php endif; // Entrust::can ?>

                </td>

            </tr>

        <?php endforeach; ?>

    </table>

    <?php echo $items->render(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>