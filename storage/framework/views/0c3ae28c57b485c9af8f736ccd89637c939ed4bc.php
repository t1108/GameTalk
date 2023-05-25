<?php $__env->startSection('content'); ?>

    <div class="action"><a href="<?php echo e(Route('create')); ?>">新規作成</a> </div>
    <div class="list">
        <?php $__currentLoopData = $talkrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $talkroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="list-box">
            <div class= "title">
                <div class="title-text"><?php echo e($talkroom->name); ?></div>
                <a class="thum" href="<?php echo e(Route('talkroom', ['id' => $talkroom->id])); ?>"><img src="<?php echo e($talkroom->image); ?>"></a>
            </div>
            <?php if(auth()->user()->role == 0): ?>
            <div class="content-right">
                <a onclick="return confirm('このトークルームを削除しますか？');" href="<?php echo e(route('talkroom_delete',['id' => $talkroom->id])); ?>">削除</a>
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/made/resources/views/content/contents.blade.php ENDPATH**/ ?>