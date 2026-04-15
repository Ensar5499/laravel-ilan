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
    <div class="py-12 bg-gray-50">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-2xl rounded-3xl overflow-hidden mb-8 border border-gray-100">
                <div class="p-8 md:p-12">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <span class="px-3 py-1 bg-blue-100 text-blue-600 text-xs font-bold uppercase rounded-full"><?php echo e($ad->category); ?></span>
                            <h2 class="text-4xl font-black text-gray-900 mt-2"><?php echo e($ad->title); ?></h2>
                        </div>
                        <div class="text-right">
                            <p class="text-3xl font-black text-green-600"><?php echo e(number_format($ad->price, 0, ',', '.')); ?> TL</p>
                            <p class="text-sm text-gray-400 mt-1"><?php echo e($ad->created_at->format('d.m.Y')); ?></p>
                        </div>
                    </div>

                    <div class="prose max-w-none text-gray-700 text-lg mb-10 border-t border-b py-8 leading-relaxed">
                        <?php echo nl2br(e($ad->description)); ?>

                    </div>

                    <div class="flex items-center justify-between bg-slate-50 p-6 rounded-2xl border border-gray-200">
                        <div class="flex items-center">
                            <div class="h-12 w-12 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold mr-4">
                                <?php echo e(substr($ad->user->name, 0, 1)); ?>

                            </div>
                            <div>
                                <p class="text-sm text-gray-500">İlan Sahibi</p>
                                <p class="font-bold text-gray-900 text-lg"><?php echo e($ad->user->name); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-3xl p-8 md:p-12 border border-gray-100">
                <h3 class="text-2xl font-bold mb-8 flex items-center">
                    <span class="mr-3">💬</span> Yorumlar ve Sorular
                </h3>

                <?php if(auth()->guard()->check()): ?>
                    <form action="<?php echo e(route('comments.store', $ad->id)); ?>" method="POST" class="mb-10">
                        <?php echo csrf_field(); ?>
                        <textarea name="body" rows="3" class="w-full border-gray-200 rounded-2xl focus:ring-blue-500 focus:border-blue-500 p-4" placeholder="Satıcıya bir soru sor..." required></textarea>
                        <button type="submit" class="mt-3 bg-blue-600 text-white px-8 py-3 rounded-xl font-bold hover:bg-blue-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-1">Yorumu Gönder</button>
                    </form>
                <?php else: ?>
                    <div class="bg-blue-50 p-4 rounded-xl text-center text-blue-700 mb-8 border border-blue-100">
                        Yorum yazmak için lütfen <a href="<?php echo e(route('login')); ?>" class="font-bold underline">giriş yapın</a>.
                    </div>
                <?php endif; ?>

                <div class="space-y-6">
                    <?php $__empty_1 = true; $__currentLoopData = $ad->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="border-l-4 border-blue-500 pl-4 py-3 bg-slate-50 rounded-r-2xl p-4 transition-all hover:bg-slate-100">
                            <div class="flex justify-between mb-1">
                                <p class="font-bold text-gray-900"><?php echo e($comment->user->name); ?></p>
                                <span class="text-gray-400 text-xs font-medium"><?php echo e($comment->created_at->diffForHumans()); ?></span>
                            </div>
                            <p class="text-gray-700 leading-relaxed"><?php echo e($comment->body); ?></p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="text-center py-10 text-gray-400 italic">
                             Henüz yorum yapılmamış. İlk soruyu sen sor!
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
<?php endif; ?><?php /**PATH C:\Users\Ensar Kulaksız\Desktop\sahibinden_projesi\resources\views/ads/show.blade.php ENDPATH**/ ?>