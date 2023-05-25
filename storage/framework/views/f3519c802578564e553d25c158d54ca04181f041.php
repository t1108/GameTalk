<?php $__env->startSection('content'); ?>
<div class="room-header">
    <div><img src="<?php echo e($talkroom->image); ?>" width="150px" height="100px"></div>
    <div class="room-name">
         <?php echo e($talkroom->name); ?>

    </div>
    <div class="comment-post room-favo">
            <?php
            $isBookmark = $bookmark->where('user_id', auth()->user()->id)
                            ->where('talkroom_id', $talkroom->id)
                            ->where('favorite', 1)
                            ->isNotEmpty();
            ?>
        <button class="btn btn-outline-dark btn-bookmark" type="button" data-talkroom-id="<?php echo e($talkroom->id); ?>"><?php echo e($isBookmark ? 'お気に入り解除' : 'お気に入り登録'); ?></button>
    </div>
    <div class="comment-post">
        <button class="btn btn-outline-dark post_submit" type="button">投稿</button>
    </div>
</div>

<div class="list talk-window">
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
<form action="<?php echo e(Route('comment_post')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <div class="post_process">
        <h1>投稿</h1>
        <div class="two-space-content">
            <div class="count">0 / 200</div>
            <?php if( auth()->user()->level >=50 ): ?>
            <div class="content-right">(Lv50以上)背景色の変更</div>
            <select id="back-color-select" name="back_color">
                <option class="back-white" value="white">white</option>
                <option class="back-pastel-red" value="red">red</option>
                <option class="back-pastel-blue" value="blue">blue</option>
                <option class="back-pastel-green" value="green">green</option>
                <option class="back-pastel-yellow" value="yellow">yellow</option>
            </select>
            <?php endif; ?>
        </div>
        
        <textarea name="comment" id="comment" maxlength="200" cols="52" rows="10"></textarea>
        <div class="buttons">
            <button class="btn btn-outline-info" type="submit">投稿</button>
            <button class="btn btn-outline-danger not" type="button">キャンセル</button>
        </div>
        <input type="hidden" name="room_id" value="<?php echo e($talkroom->id); ?>">
        <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>">
    </div>
    <div class="modal"></div>
</from>
<?php if(session('message')): ?>
    <div class="alert alert-success" id="edit-message">
        <?php echo e(session('message')); ?>

    </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/made/resources/views/content/talkroom.blade.php ENDPATH**/ ?>