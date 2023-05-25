<?php $__env->startSection('content'); ?>

<div class="list blue-back" id=profile-list>
    <div class="profile-image-up">
        
        <form action="/upload_confirm" method="post" enctype="multipart/form-data" autocomplete="off" onsubmit="return confirm('この内容で保存しますか？');">
        <?php echo csrf_field(); ?>
            <div class="profile-image-frame">
                <label for="file-upload"><img class="profile-image"src="<?php echo e(auth()->user()->icon); ?>" alt="プロフィール画像"  width="200px" height="200px"></label>
            </div>
            <input type="hidden" name="id" value="<?php echo e(auth()->user()->id); ?>">
            <input id="file-upload" type="file" name="icon" accept="image/png, image/jpeg">
            <label for="file-upload" class="custom-file-upload">ファイルを選択</label>
            <button type="button" id="delete">選択解除</button>
            <div>
                <textarea name="explanation" id="profile-text" maxlength="66" cols="40" rows="3"><?php echo e(auth()->user()->explanation); ?></textarea>
            </div>
            <div class="user-edit">
            <?php if($errors->any()): ?>
                <div class="vali-error">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($error); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
            <input type="hidden" name="color" value="<?php echo e(auth()->user()->name_color); ?>">
            <?php if( auth()->user()->level >= 10): ?>
                <div class="change-name-color">
                    <p>ユーザーレベル10以上でネームカラーを変更できます</p>
                    <div class="change-color <?php echo e(auth()->user()->name_color); ?>"><?php echo e(auth()->user()->name); ?></div>
                    <select id="color-select" name="color">
                        <option class="black" value="black" <?php echo e(auth()->user()->name_color === 'black' ? 'selected' : ''); ?>>black</option>
                        <option class="red" value="red" <?php echo e(auth()->user()->name_color === 'red' ? 'selected' : ''); ?>>red</option>
                        <option class="blue" value="blue" <?php echo e(auth()->user()->name_color === 'blue' ? 'selected' : ''); ?>>blue</option>
                        <option class="green" value="green" <?php echo e(auth()->user()->name_color === 'green' ? 'selected' : ''); ?>>green</option>
                        <option class="yellow" value="yellow" <?php echo e(auth()->user()->name_color === 'yellow' ? 'selected' : ''); ?>>yellow</option>
                    </select>
                </div>
            <?php endif; ?>
                

                <input type="text" name="name" placeholder="ユーザー名" value="<?php echo e(auth()->user()->name); ?>">
                <input type="submit" value="保存">
            </div>
        </form>
        
    </div>
</div>
<!-- <div class="nondisplay-back nondisplay"></div> -->
    


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/made/resources/views/content/profile_edit.blade.php ENDPATH**/ ?>