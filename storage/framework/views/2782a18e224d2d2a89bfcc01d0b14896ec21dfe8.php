<?php $__env->startSection('content'); ?>

<div class="list dark-back">
    <table>
        <tr class="userlist-column">
            <th>ID</th>
            <th>ユーザー名</th>
            <th>email</th>
            <th>ロール</th>
            <th>状態</th>
            <th>フリーコメント</th>
            <th>詳細</th>
        </tr>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="userlist-data">
                <td><?php echo e($user->id); ?></td>
                <td><?php echo e($user->name); ?></td>
                <td><?php echo e($user->email); ?></td>
                <td><?php echo e($user->role == 0 ? '管理者' : '一般'); ?></td>
                <td class="<?php echo e($user->account_status !== '正常' ? 'suspension' : ''); ?>"><?php echo e($user->account_status); ?></td>
                <td class="white-space explanation"><?php echo e($user->explanation); ?></td>
                <td><a class="user-detail" href="<?php echo e(route('user_detail', ['id' => $user->id])); ?>">ユーザー詳細</a></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
        
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/made/resources/views/admin/userlist.blade.php ENDPATH**/ ?>