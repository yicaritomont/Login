<?php $__env->startSection('title', trans('words.ManageUsers')); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-5">            
                <h3 class="modal-title"> <?php echo e(str_plural(trans('words.User'), 2)); ?> </h3>
        </div>
        <div class="col-md-7 page-action text-right">
            
            <a href="<?php echo e(route('users.create')); ?>" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> <?php echo app('translator')->getFromJson('words.Create'); ?></a>
            <?php if(!Auth::check()): ?>
                <a href="<?php echo e(route('login')); ?>" class="btn btn-success btn-sm"> <i class="glyphicon glyphicon-user"></i> <?php echo app('translator')->getFromJson('words.Login'); ?></a>
            <?php endif; ?>

            
        </div>
    </div>


    <div class="result-set">
        <table class="table table-bordered table-hover dataTable nowrap" id="data-table">
            <thead>
            <tr>
                <th><?php echo app('translator')->getFromJson('words.Id'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.Name'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.Email'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.CreatedAt'); ?></th>
                <th><?php echo app('translator')->getFromJson('words.UpdatedAt'); ?></th> 
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_users', 'delete_users')): ?>
                <th class="text-center"><?php echo app('translator')->getFromJson('words.Actions'); ?></th>
                <?php endif; ?>
            </tr>
            </thead>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>  
        
        $(document).ready(function() {

            //Se definen las columnas (Sin actions)
            var columns = [
                {data: 'id'},
                {data: 'name'},
                {data: 'email', orderable: false},
                {data: 'created_at'},
                {data: 'updated_at'},
            ];

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_users', 'delete_users')): ?>
                
                dataTableObject.ajax = {url: "<?php echo e(route('datatable', ['model' => 'User', 'whereHas' => 'none', 'entity' => 'user', 'identificador' => 'id', 'relations' => 'none'])); ?>"};
                columns.push({data: 'actions', className: 'text-center wCellActions', orderable: false},)
                dataTableObject.columnDefs = [formatDateTable([-2, -3])];
            <?php else: ?>
                dataTableObject.ajax = {url: "<?php echo e(route('datatable', ['model' => 'User', 'whereHas' => 'none', 'relations' => 'none'])); ?>"};
                dataTableObject.columnDefs = [formatDateTable([-1, -2])];
            <?php endif; ?>

            dataTableObject.columns = columns;
            
            dataTableObject.ajax.type = 'POST';
            dataTableObject.ajax.data = {_token: window.Laravel.csrfToken};

            var table = $('.dataTable').DataTable(dataTableObject);
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>