

<?php $__env->startSection('title', $doc->title); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="layout">
            <aside>
                <nav aria-label="Sommaire" class="nav">
                    <?php $__currentLoopData = $docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('docs.show', $d->slug)); ?>"
                            class="<?php echo e($doc->id === $d->id ? 'font-bold text-blue-600' : ''); ?>">
                            <?php echo e($d->title); ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </nav>
            </aside>
            <main class="card">
                <span class="badge">Dernière mise à jour : 28/09/2025</span>
                <section class="section">
                    <h1><?php echo e($doc->title); ?></h1>
                    <?php echo $doc->content; ?>

                </section>
            </main>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pc\Documents\dev\Laravel\hydrixbot\resources\views/docs/show.blade.php ENDPATH**/ ?>