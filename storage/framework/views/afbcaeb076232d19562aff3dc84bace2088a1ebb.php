<?php $__env->startSection('content'); ?>
<div class="action">お気に入り一覧</div>
<div class="list">
    <?php $__currentLoopData = $favorites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $favorite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="list-box">
        <div class= "title">
            <div class="title-text"><?php echo e($favorite->talkroom->name); ?></div>
            <a class="thum" href="<?php echo e(Route('talkroom', ['id' => $favorite->talkroom->id])); ?>"><img src="<?php echo e($favorite->talkroom->image); ?>"></a>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/made/resources/views/content/favo.blade.php ENDPATH**/ ?>