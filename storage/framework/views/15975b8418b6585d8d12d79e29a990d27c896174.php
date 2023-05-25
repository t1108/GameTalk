<?php $__env->startSection('content'); ?>

<div class="list blue-back list-flex">
    <div class="profile-image-up">
        <div class="profile-image-frame">
            <img class="profile-image"src="<?php echo e($user->icon); ?>" alt="プロフィール画像"  width="200px" height="200px" >
            <div class="name-flame">
                <?php echo e($user->name); ?>

            </div>
            <?php if($user->account_status != '永久停止' && $user->role != 0): ?>

            <div class="form">
                <form action="<?php echo e(route('account_status', ['id' => $user->id])); ?>" method="post">
                <?php echo csrf_field(); ?>
                    <input name="id" type="hidden" value="<?php echo e($user->id); ?>">
                    <p>アカウント状態</p>
                    <select name="status">
                        <!-- <option><?php echo e($user->account_status); ?></option> -->
                        <?php $__currentLoopData = ['正常','停止','永久停止']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option class="status-op" <?php if($user->account_status == $item): ?> selected <?php endif; ?>><?php echo e($item); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <div class="button">
                        <input type="submit" value="保存">
                    </div>
                </form>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="left-border">
        <div class="exp-area"><?php echo e($user->explanation); ?></div>
    </div>
    <div class="left-border last-box">
        コメント数上位
        <ul class="rank-box">
            <?php $__currentLoopData = $rankedComments->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="<?php echo e(Route('talkroom', ['id' => $comment->talkroom->id])); ?>"><?php echo e($comment->talkroom->name); ?></a>
                    <p><?php echo e($comment->commentCount); ?>コメント</p>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>

<p class="back-link"><a href="<?php echo e(route('userlist')); ?>">一覧へ戻る</a></p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/made/resources/views/admin/user_detail.blade.php ENDPATH**/ ?>