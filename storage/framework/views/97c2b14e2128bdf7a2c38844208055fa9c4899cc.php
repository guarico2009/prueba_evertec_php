<li class="nav-item">
    <a class="nav-link" data-widget="pushmenu" href="#"
        <?php if(config('adminlte.sidebar_collapse_remember')): ?>
            data-enable-remember="true"
        <?php endif; ?>
        <?php if(!config('adminlte.sidebar_collapse_remember_no_transition')): ?>
            data-no-transition-after-reload="false"
        <?php endif; ?>
        <?php if(config('adminlte.sidebar_collapse_auto_size')): ?>
            data-auto-collapse-size="<?php echo e(config('adminlte.sidebar_collapse_auto_size')); ?>"
        <?php endif; ?>>
        <i class="fas fa-bars"></i>
        <span class="sr-only"><?php echo e(__('adminlte::adminlte.toggle_navigation')); ?></span>
    </a>
</li><?php /**PATH C:\xampp\htdocs\prueba_evertec_php\vendor\jeroennoten\laravel-adminlte\src/../resources/views/partials/navbar/menu-item-left-sidebar-toggler.blade.php ENDPATH**/ ?>