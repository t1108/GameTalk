<?php $__env->startSection('content'); ?>

<div class="list blue-back f-list">
    <?php if($followers->count() == 0): ?>
        フォロワーはいません
    <?php endif; ?>
    
    <table class="follow-list">
    <?php $__currentLoopData = $followers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <tr>
            <td><a href="<?php echo e(route('profile', ['id' => $follower->user->id])); ?>"><?php echo e($follower->user->name); ?></a></td>
       </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/made/resources/views/content/follower.blade.php ENDPATH**/ ?>