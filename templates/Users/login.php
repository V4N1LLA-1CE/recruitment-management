<?php $this->layout = 'auth'; ?>
<!-- Section: Design Block -->
<section class="d-flex justify-content-center align-items-center h-100 p-5">
    <!-- Jumbotron -->
    <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
        <div class="container">
            <div class="row gx-lg-5 align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h1 class="my-5 display-3 fw-bold ls-tight">
                        Australia's best<br />
                        <span class="text-primary ">B2B Recruitment</span>
                    </h1>
                    <p style="color: hsl(217, 10%, 50.8%)">
                        Welcome to Recruitr. We are a business managed by Nathan Jims. We specialise in B2B recruiting and can get things done quickly and efficiently. Feel free to reach out to us <a href="<?= $this->Url->build(['controller' => 'Contacts', 'action' => 'add']) ?>"><span class="contact-anchor">here</span></a>.
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="card p-5">
                        <div class="card-body py-5 px-md-5">
                            <?= $this->Flash->render() ?>
                            <h3 class="bold mb-5">Login</h3>
                            <?= $this->Form->create() ?>
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <?= $this->Form->control('email', [
                                    'required' => true,
                                    'class' => 'form-control bold custom-form',
                                    'label' => ['class' => 'form-label'],
                                    'templates' => ['inputContainer' => '{{content}}']
                                ]) ?>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <?= $this->Form->control('password', [
                                    'required' => true,
                                    'class' => 'form-control bold custom-form',
                                    'label' => ['class' => 'form-label'],
                                    'templates' => ['inputContainer' => '{{content}}']
                                ]) ?>
                            </div>

                            <div class="d-flex flex-column gap-3 ">

                                <button type="submit" class="btn btn-primary px-5 rounded-5">
                                    <span class="bold">Login</span>
                                </button>

                                <!-- Register link -->
                                <button type="button" class="btn btn-secondary px-5 rounded-5">
                                    <?= $this->Html->link("Register", ['action' => 'add'], ['class' => 'text-decoration-none text-white bold']) ?>
                                </button>
                            </div>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->
