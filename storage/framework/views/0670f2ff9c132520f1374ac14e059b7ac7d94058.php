<?php $__env->startSection('content'); ?>

<div class="list blue-back list-flex">
    <div class="profile-image-up">
        <div class="profile-image-frame">
            <img class="profile-image"src="<?php echo e($user->icon); ?>" alt="プロフィール画像"  width="200px" height="200px" >
            <div class="name-flame <?php echo e($user->name_color); ?>">
                <?php echo e($user->name); ?>

            </div>
            <div class="name-flame flame">
                <a href="<?php echo e(route('profile_edit')); ?>">プロフィールを編集する</a>
            </div>
        </div>
        <div class="column">
            <a href="<?php echo e(route('follow')); ?>"><?php echo e($follow_count); ?> フォロー中</a>
            <a href="<?php echo e(route('follower')); ?>"><?php echo e($follower_count); ?> フォロワー</a>
        </div>
    </div>
    <div class="left-border">
        <div class="level">
            <div class="two-content">
                <div class="user-lv">ユーザーレベル <?php echo e($user->level); ?></div>
                <div>Next Level <?php echo e($user->exp); ?> / 10</div>
            </div>
            
            <div class="exp-gauge" style="--exp-percent: <?php echo e($user->exp / 10); ?>"></div>
        </div>
        <div class="exp-area"><?php echo e($user->explanation ? $user->explanation : 'フリーコメントはありません。'); ?></div>
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
    <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="list white-back back-pastel-<?php echo e($comment->back_color); ?>">
        <div class="header-icon flex-icon">
            <div class="comment-icon"><a href="<?php echo e(route('profile',['id' => $comment->user->id])); ?>"><img src="<?php echo e($comment->user->icon); ?>"  width="36px" height="36px" alt="icon" ></a></div>
            <div class="comment-name"><a class="<?php echo e($comment->user->name_color); ?>" href="<?php echo e(route('profile',['id' => $comment->user->id])); ?>"><?php echo e($comment->user->name); ?></a></div>
            <div class="user-level">&nbsp;Lv<?php echo e($comment->user->level); ?></div>
            <div class="date"><?php echo e($comment->created_at); ?></div>
        </div>
        <div class="comment-body"><?php echo e($comment->comment); ?></div>
        <ul class="comment-nav">
            <?php
                $isLiked = $favorites->where('comment_id', $comment->id)
                            ->where('user_id', auth()->user()->id)
                            ->where('favorite', 1)
                            ->isNotEmpty();
            ?>

            <li class="<?php echo e($isLiked ? 'comment-favo-remove' : 'comment-favo'); ?>" data-comment-id="<?php echo e($comment->id); ?>">
                <?php echo e($comment->favorite_count); ?> いいね
            </li>
            <?php if($comment->user->id === auth()->user()->id): ?>
            <li class="comment-del"><a onclick="return confirm('このコメントを削除しますか？');" href="<?php echo e(route('comment_del',['id' => $comment->id])); ?>">削除</a></li>
            <?php endif; ?>
        </ul>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php if(session('message')): ?>
    <div class="alert alert-success" id="edit-message">
        <?php echo e(session('message')); ?>

    </div>
<?php endif; ?>
<p class="back-link"><a href="<?php echo e(route('userlist')); ?>">一覧へ戻る</a></p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/made/resources/views/content/my_profile.blade.php ENDPATH**/ ?>