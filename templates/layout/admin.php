<?php

$cakeDescription = 'CakePHP with SB Admin';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $cakeDescription ?>: <?= $this->fetch('title') ?></title>

    <!-- SB Admin CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->Html->css('global') ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= $this->Url->build('/') ?>">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin Panel</div>
            </a>

            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="<?= $this->Url->build('/') ?>">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://book.cakephp.org/5/" target="_blank">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Documentation</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://api.cakephp.org/" target="_blank">
                    <i class="fas fa-fw fa-code"></i>
                    <span>API</span>
                </a>
            </li>
            <?php if ($this->Identity->isLoggedIn()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout']) ?>">
                        <i class="fas fa-fw fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
            <?php endif; ?>
            <hr class="sidebar-divider">
        </ul>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout'], ['class' => 'btn btn-danger']) ?>
                        </li>
                    </ul>
                </nav>

                <!-- Main Content -->
                <div class="container-fluid">
                    <?= $this->Flash->render() ?>
                    <?= $this->fetch('content') ?>
                </div>
            </div>
        </div>
    </div>

    <!-- DO NOT DELETE: Flash message auto-hide after 4 seconds -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                const messages = document.getElementsByClassName('message');
                Array.from(messages).forEach(function(message) {
                    message.style.transition = 'opacity 0.5s ease';
                    message.style.opacity = '0';
                    setTimeout(function() {
                        message.remove();
                    }, 500);
                });
            }, 4000);
        });
    </script>


    <!-- SB Admin Scripts -->
    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js') ?>
    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js') ?>
    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/js/sb-admin-2.min.js') ?>

    <!-- DataTables Scripts -->
    <?= $this->Html->script('https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js') ?>
    <?= $this->Html->script('https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js') ?>

    <script src="https://kit.fontawesome.com/4a036d9063.js" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                // Enable search/filter
                searching: true,
                // Enable length change dropdown
                lengthChange: true,
                // Enable pagination
                paging: true,
                // Enable sorting
                ordering: true,
                // Default page length
                pageLength: 10,
                // Length menu options
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                // Enable info display
                info: true,
                // Order by first column ascending by default
                order: [
                    [0, 'asc']
                ]
            });
        });
    </script>

    <?= $this->fetch('script') ?>
</body>

</html>
