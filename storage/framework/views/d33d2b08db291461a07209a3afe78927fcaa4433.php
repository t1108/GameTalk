<?php $__env->startSection('content'); ?>

<div class="list creat">
<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
    <form action="<?php echo e(Route('confirm')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="profile-image-frame creat-image">
            <label for="file-upload"><img class="profile-image creat-img"src="" alt="画像を選択してください。"  width="200px" height="200px"></label>
        </div>
        <input id="file-upload" type="file" name="image" accept="image/png, image/jpeg">
        <input type="hidden" value="<?php echo e(auth()->user()->id); ?>" name="id">

        <div class="file-upload">
            <label for="file-upload" class="custom-file-upload">ファイルを選択</label>
        </div>
        <br>
        <div class="file-upload">
            <label for="form-name">タイトル</label>
        </div>
        <div class="file-upload">
            <input type="text" name="name" id="form-name" value="<?php echo e(old('name')); ?>">
        </div>
        <br>
        <div class="file-upload">
            <button class="post_submit" type="button">登録</button>
        </div>
        <div class="post_process">このトークルームが不適切だと判断された場合、
            <br>削除される場合があります。
            <br>トークルームを作成してもよろしいですか？<br>
            <div class="buttons">
                <button type="submit">はい</button>
                <button class="not" type="button">いいえ</button>
            </div>
            
        </div>
        <div class="modal"></div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/made/resources/views/content/create.blade.php ENDPATH**/ ?>