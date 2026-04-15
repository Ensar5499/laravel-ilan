<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('İlanlarım')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold italic">🚀 Yayındaki İlanların</h3>
                        <a href="<?php echo e(route('ads.create')); ?>" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition">
                            + Yeni İlan Ver
                        </a>
                    </div>

                    <?php $__empty_1 = true; $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="flex justify-between items-center p-4 bg-gray-50 mb-3 rounded-lg border hover:shadow-sm transition">
                            <div>
                                <span class="font-bold text-gray-800"><?php echo e($ad->title); ?></span> 
                                <span class="text-sm text-blue-600 font-semibold ml-2"><?php echo e(number_format($ad->price, 0, ',', '.')); ?> TL</span>
                                <p class="text-xs text-gray-400 mt-1"><?php echo e($ad->created_at->diffForHumans()); ?> eklendi</p>
                            </div>
                            
                            <div class="flex items-center space-x-4">
                                <a href="<?php echo e(route('ads.show', $ad->id)); ?>" class="text-gray-600 hover:text-blue-600 font-medium text-sm transition">
                                    Görüntüle
                                </a>

                                
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $ad)): ?>
                                    <form action="<?php echo e(route('ads.destroy', $ad->id)); ?>" method="POST" id="delete-form-<?php echo e($ad->id); ?>">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="button" onclick="confirmDelete(<?php echo e($ad->id); ?>)" class="text-red-500 hover:text-red-700 font-medium text-sm bg-red-50 px-3 py-1 rounded-md transition">
                                            Sil
                                        </button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="text-center py-10 bg-gray-50 rounded-xl border-2 border-dashed">
                            <p class="text-gray-500 mb-4">Henüz hiç ilan eklememişsin.</p>
                            <a href="<?php echo e(route('ads.create')); ?>" class="inline-block bg-blue-500 text-white px-6 py-2 rounded-full hover:bg-blue-600">
                                İlk İlanını Hemen Oluştur!
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\Users\Ensar Kulaksız\Desktop\sahibinden_projesi\resources\views/dashboard.blade.php ENDPATH**/ ?>