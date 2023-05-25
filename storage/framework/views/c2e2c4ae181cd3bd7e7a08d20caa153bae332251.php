<?php $__env->startSection('content'); ?>
<div class="action">削除済みのトークルーム一覧</div>
<div class="list">
    <?php $__currentLoopData = $deleteds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deleted): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="list-box">
        <div class= "title">
            <div class="title-text"><?php echo e($deleted->name); ?></div>
            <a class="thum" href="<?php echo e(Route('talkroom', ['id' => $deleted->id])); ?>"><img src="<?php echo e($deleted->image); ?>"></a>
        </div>
        <div class="two-content" style="padding : 0 10px">
            <a onclick="return confirm('このトークルームを復元しますか？');" href="<?php echo e(route('restoration',['id' => $deleted->id])); ?>">復元</a>
            <a onclick="return confirm('このトークルームを完全に消去しますか？\nこの操作は取り消すことができません');" href="<?php echo e(route('delete_permanently',['id' => $deleted->id])); ?>">消去</a>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/made/resources/views/admin/deleted_room.blade.php ENDPATH**/ ?>