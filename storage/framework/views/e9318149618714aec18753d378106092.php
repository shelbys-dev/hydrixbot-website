

<?php $__env->startSection('title', 'Documentation'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Documentation</h1>
        <div class="layout">
            <aside>
                <nav aria-label="Sommaire" class="nav">
                    <?php $__currentLoopData = $docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('docs.show', $doc->slug)); ?>" class="text-blue-600 hover:underline">
                            <?php echo e($doc->title); ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </nav>
            </aside>

            <main class="card">
                <section class="section">
                    Bienvenue dans la documentation de Hydrix Bot. Sélectionnez un sujet dans le menu de gauche pour
                    commencer.
                </section>
            </main>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pc\Documents\dev\Laravel\hydrixbot\resources\views/docs/index.blade.php ENDPATH**/ ?>