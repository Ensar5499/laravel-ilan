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
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold mb-6 text-gray-800">Admin Yönetim Paneli</h1>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
                <div class="bg-white p-6 rounded-lg shadow border-b-4 border-blue-500">
                    <p class="text-sm text-gray-500 uppercase font-bold">Toplam Kullanıcı</p>
                    <p class="text-3xl font-black"><?php echo e($stats['total_users']); ?></p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow border-b-4 border-green-500">
                    <p class="text-sm text-gray-500 uppercase font-bold">Toplam İlan</p>
                    <p class="text-3xl font-black"><?php echo e($stats['total_ads']); ?></p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow border-b-4 border-orange-500">
                    <p class="text-sm text-gray-500 uppercase font-bold">Bugünkü İlanlar</p>
                    <p class="text-3xl font-black"><?php echo e($stats['new_ads_today']); ?></p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow border-b-4 border-purple-500">
                    <p class="text-sm text-gray-500 uppercase font-bold">Toplam Yorum</p>
                    <p class="text-3xl font-black"><?php echo e($stats['total_comments']); ?></p>
                </div>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h2 class="text-lg font-bold mb-4 italic">Son Eklenen İlanlar</h2>
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="p-3 border-b text-sm">Başlık</th>
                            <th class="p-3 border-b text-sm">Kullanıcı</th>
                            <th class="p-3 border-b text-sm">Tarih</th>
                            <th class="p-3 border-b text-sm">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $latestAds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-3 border-b text-sm font-medium"><?php echo e($ad->title); ?></td>
                            <td class="p-3 border-b text-sm"><?php echo e($ad->user->name); ?></td>
                            <td class="p-3 border-b text-sm text-gray-400"><?php echo e($ad->created_at->diffForHumans()); ?></td>
                            <td class="p-3 border-b text-sm">
                                <div class="flex items-center space-x-3">
                                    <a href="<?php echo e(route('ads.show', $ad->id)); ?>" class="text-blue-600 hover:underline font-medium">Görüntüle</a>
                                    
                                    
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $ad)): ?>
                                        <form action="<?php echo e(route('ads.destroy', $ad->id)); ?>" method="POST" id="delete-form-<?php echo e($ad->id); ?>">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="button" onclick="confirmDelete(<?php echo e($ad->id); ?>)" class="text-red-500 hover:text-red-700 font-bold">
                                                Sil
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
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
<?php endif; ?><?php /**PATH C:\Users\Ensar Kulaksız\Desktop\sahibinden_projesi\resources\views/admin/index.blade.php ENDPATH**/ ?>