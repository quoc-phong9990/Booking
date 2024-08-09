<?php $__env->startSection('content'); ?>
    <h1>Post Comments</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Comments</th>
                <th>Post ID</th>
                <th>User ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $postComments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $postComment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($postComment->id); ?></td>
                    <td><?php echo e($postComment->comments); ?></td>
                    <td><?php echo e($postComment->post_id); ?></td>
                    <td><?php echo e($postComment->user_id); ?></td>
                    <td>
                        <a href="<?php echo e(route('post_comments.edit', $postComment->id)); ?>">Edit</a>
                        <form action="<?php echo e(route('post_comments.destroy', $postComment->id)); ?>" method="POST" style="display: inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <a href="<?php echo e(route('post_comments.create')); ?>">Create New Comment</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DATN\resources\views/admin/Post_comments/index.blade.php ENDPATH**/ ?>