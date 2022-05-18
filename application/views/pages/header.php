<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="<?= base_url() ?>/<?= $logo ?>" alt="icono" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-light">
            <ul class="navbar-nav">
            <li class="nav-item">
                    <a href="<?= base_url() ?>Cinicio" class="brand-link">
                        <img src="<?= base_url() ?><?= $logo ?>" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                        <span class="brand-text"><?= $empresa ?> Reservas Auditorio</span>
                    </a>
                </li>
            </ul>
            <!-- Left navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="<?= base_url() ?>Cinicio" class="nav-link">Inicio</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>Cinicio/calendario" class="nav-link">Calendario</a>
                </li>
        
            </ul>

            
        </nav>
        <!-- /.navbar -->

        