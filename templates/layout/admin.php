<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>

    <!-- CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Titillium+Web:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->Html->css('flash') ?>
    <?= $this->Html->css('global') ?>
    <?= $this->Html->css('admin') ?>

</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= $this->Url->build('/') ?>">
                <div class="sidebar-brand-icon">
                    <i class="fa-solid fa-wrench"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin Panel</div>
            </a>
            <hr class="sidebar-divider my-0">

            <!-- Projects Section -->
            <li class="nav-item">
                <a class="nav-link" href="<?= $this->Url->build('/') ?>">
                    <i class="fa-solid fa-diagram-project"></i>
                    <span>Projects</span>
                </a>
            </li>



            <!-- Organisations Section -->
            <li class="nav-item">
                <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Organisations', 'action' => 'index']) ?>">
                    <i class="fa-solid fa-building"></i>
                    <span>Organisations</span>
                </a>
            </li>


            <!-- Contractors Section -->
            <li class="nav-item">
                <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Contractors', 'action' => 'index']) ?>">
                    <i class="fa-solid fa-users"></i>
                    <span>Contractors</span>
                </a>
            </li>

            <hr class="sidebar-divider my-0">

            <!-- Skills Section -->
            <li class="nav-item">
                <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Skills', 'action' => 'index']) ?>">
                    <i class="fa-solid fa-rocket"></i>
                    <span>Skills</span>
                </a>
            </li>



            <!-- Messages Section -->
            <li class="nav-item">
                <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Contacts', 'action' => 'index']) ?>">
                    <i class="fa-solid fa-envelope"></i>
                    <span>Messages</span>
                </a>
            </li>

            <hr class="sidebar-divider my-0">

            <!-- Users Section -->
            <li class="nav-item">
                <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index']) ?>">
                    <i class="fa-solid fa-user-shield"></i>
                    <span>Users</span>
                </a>
            </li>

            <?php if ($this->Identity->isLoggedIn()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout']) ?>">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
            <?php endif; ?>

            <hr class="sidebar-divider d-none d-md-block">
        </ul>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Top Bar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <?php if ($this->Identity->isLoggedIn()): ?>
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                        <?= $this->Identity->get('email') ?>
                                    </span>
                                    <i class="fas fa-user-circle fa-fw"></i>
                                </a>
                            </li>
                        <?php endif; ?>
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

    <!-- Scripts -->
    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js') ?>
    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js') ?>
    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/js/sb-admin-2.min.js') ?>
    <?= $this->Html->script('https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js') ?>
    <?= $this->Html->script('https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js') ?>
    <script src="https://kit.fontawesome.com/4a036d9063.js" crossorigin="anonymous"></script>

    <!-- DataTables Init -->
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                searching: true,
                lengthChange: true,
                paging: true,
                ordering: true,
                pageLength: 10,
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                info: true,
                order: [
                    [0, 'asc']
                ]
            });

            // Auto-hide flash messages
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

    <?= $this->fetch('script') ?>
</body>

</html>
