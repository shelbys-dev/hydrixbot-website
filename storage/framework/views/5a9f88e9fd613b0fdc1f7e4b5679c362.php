<div class="nav">
    <div class="brand">
        <div class="logo" aria-hidden="true"></div>
        <a href="<?php echo e(route('home')); ?>">Hydrix Bot</a>
        <span class="tag" title="Version">v1.0</span>

        <?php if(Route::is('home')): ?>
            <nav class="navlinks" aria-label="Navigation principale">
                <div class="home-nav">
                    <a class="btn ghost small" href="#features">Fonctionnalités</a>
                    <a class="btn ghost small" href="#how">Installation</a>
                    <a class="btn ghost small" href="#faq">FAQ</a>
                </div>
            </nav>
        <?php endif; ?>
    </div>

    <button class="nav-toggle" aria-expanded="false" aria-controls="primary-nav">☰ Menu</button>

    <nav class="navlinks" aria-label="Navigation principale">
        <?php $__currentLoopData = $navLinks ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $isActive = url()->current() === url($link->url);
            ?>

            <?php if($link->is_external): ?>
                <a href="<?php echo e($link->url); ?>" target="_blank" rel="noopener"
                    class="hover:underline <?php echo e($isActive ? 'font-semibold' : ''); ?>">
                    <?php echo e($link->label); ?>

                </a>
            <?php else: ?>
                <a href="<?php echo e(url($link->url)); ?>"
                    class="hover:underline <?php echo e($isActive ? 'font-semibold' : ''); ?> btn small <?php echo e(url($link->url) === url('/invite') ? 'primary' : ''); ?>">
                    <?php echo e($link->label); ?>

                </a>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </nav>
</div>

<script>
    // Mobile nav toggle
    const headerNav = document.querySelector('.nav');
    const toggleBtn = document.querySelector('.nav-toggle');
    const navLinks = document.getElementById('primary-nav');
    if (toggleBtn) {
        toggleBtn.addEventListener('click', () => {
            const expanded = toggleBtn.getAttribute('aria-expanded') === 'true';
            toggleBtn.setAttribute('aria-expanded', String(!expanded));
            headerNav.classList.toggle('open');
        });
        // Close on ESC or outside click
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && headerNav.classList.contains('open')) {
                toggleBtn.setAttribute('aria-expanded', 'false');
                headerNav.classList.remove('open');
            }
        });
        document.addEventListener('click', (e) => {
            if (headerNav.classList.contains('open') && !headerNav.contains(e.target)) {
                toggleBtn.setAttribute('aria-expanded', 'false');
                headerNav.classList.remove('open');
            }
        });
        // Reset state on resize
        window.addEventListener('resize', () => {
            if (window.innerWidth > 920 && headerNav.classList.contains('open')) {
                toggleBtn.setAttribute('aria-expanded', 'false');
                headerNav.classList.remove('open');
            }
        });
    }
</script>
<?php /**PATH C:\Users\pc\Documents\dev\Laravel\hydrixbot\resources\views/partials/nav.blade.php ENDPATH**/ ?>