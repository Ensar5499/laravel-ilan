<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ensar İlan | Modern Vitrin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-slate-50 font-sans">

    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <span class="text-2xl font-black text-blue-700 tracking-tighter">ENSAR<span class="text-orange-500 underline decoration-2">İLAN</span></span>
                </div>
                
                <div class="hidden md:flex items-center space-x-8">
                    <?php if(auth()->guard()->check()): ?>
                        <?php if(Auth::user()->is_admin): ?>
                            <a href="<?php echo e(route('admin.panel')); ?>" class="text-sm font-bold text-red-600 hover:text-red-700 transition flex items-center">
                                <i class="fa-solid fa-gauge-high mr-1.5"></i> Admin Paneli
                            </a>
                        <?php endif; ?>

                        <a href="<?php echo e(url('/dashboard')); ?>" class="text-sm font-medium text-gray-600 hover:text-blue-600 transition">İlanlarım</a>
                        
                        <a href="<?php echo e(route('ads.create')); ?>" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-full text-sm font-bold transition transform hover:scale-105 shadow-md">
                            <i class="fa-solid fa-plus mr-2"></i> Ücretsiz İlan Ver
                        </a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>" class="text-sm font-medium text-gray-600 hover:text-blue-600">Giriş Yap</a>
                        <a href="<?php echo e(route('register')); ?>" class="border-2 border-blue-600 text-blue-600 px-5 py-2 rounded-full text-sm font-bold hover:bg-blue-50 transition">Kayıt Ol</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <div class="bg-blue-700 py-12 mb-10">
        <div class="max-w-7xl mx-auto px-4 text-center text-white">
            <h2 class="text-3xl md:text-4xl font-extrabold mb-4">Türkiye'nin En Genç İlan Platformu</h2>
            <p class="text-blue-100 text-lg max-w-2xl mx-auto">Vasıtadan emlağa, elektronikten hobi ürünlerine kadar her şeyi Ensar İlan'da bulabilirsiniz.</p>
        </div>
    </div>

    <main class="max-w-7xl mx-auto px-4 pb-20">
        <div class="flex items-center justify-between mb-8">
            <h3 class="text-2xl font-bold text-slate-800">Öne Çıkan İlanlar</h3>
            <div class="h-1 flex-1 bg-gray-200 mx-4 hidden md:block rounded"></div>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php $__empty_1 = true; $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <a href="<?php echo e(route('ads.show', $ad->id)); ?>" class="group block h-full">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden group-hover:shadow-2xl transition-all duration-300 transform group-hover:-translate-y-2">
                        <div class="h-48 bg-slate-200 flex items-center justify-center group-hover:bg-slate-300 transition-colors">
                            <i class="fa-solid fa-image text-slate-400 text-4xl"></i>
                        </div>
                        
                        <div class="p-5">
                            <div class="flex justify-between items-start mb-2">
                                <span class="px-2 py-1 bg-blue-50 text-blue-600 text-[10px] font-bold uppercase rounded"><?php echo e($ad->category); ?></span>
                                <span class="text-[10px] text-gray-400 font-medium"><?php echo e($ad->created_at->diffForHumans()); ?></span>
                            </div>
                            <h4 class="text-md font-bold text-slate-900 mb-2 line-clamp-1"><?php echo e($ad->title); ?></h4>
                            <p class="text-sm text-slate-500 line-clamp-2 mb-4 h-10"><?php echo e($ad->description); ?></p>
                            
                            <div class="pt-4 border-t border-gray-50 flex justify-between items-center">
                                <span class="text-lg font-black text-blue-700"><?php echo e(number_format($ad->price, 0, ',', '.')); ?> TL</span>
                                <i class="fa-solid fa-chevron-right text-gray-300 group-hover:text-blue-500 transition"></i>
                            </div>
                        </div>
                    </div>
                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-span-full py-20 text-center">
                    <div class="bg-white p-10 rounded-3xl shadow-sm border border-dashed border-gray-300 inline-block">
                        <i class="fa-regular fa-folder-open text-gray-300 text-5xl mb-4 block"></i>
                        <p class="text-gray-500 font-medium">Henüz yayında olan bir ilan yok.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </main>
</body>
</html><?php /**PATH C:\Users\Ensar Kulaksız\Desktop\sahibinden_projesi\resources\views/welcome.blade.php ENDPATH**/ ?>