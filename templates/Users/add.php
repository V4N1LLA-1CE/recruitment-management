<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="d-flex justify-content-center align-items-center dvh-100">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?= $this->Html->link(
                    '<i class="fas fa-home me-2"></i>' . __('Back to Home'),
                    '/',
                    [
                        'class' => 'btn btn-dark px-5 py-3 mb-4 fs-5 fw-semibold',
                        'escape' => false
                    ]
                ) ?>
                <div class="card shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h3 class="card-title text-center text-gray-400 mb-0 fw-bold"><?= __('Create Account') ?></h3>
                    </div>
                    <div class="card-body p-4">
                        <div class="alert alert-dark mb-4" role="alert">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>Note:</strong> This public registration page is for demonstration purposes only.
                        </div>

                        <?= $this->Form->create($user, ['class' => 'd-flex flex-column gap-3']) ?>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <?= $this->Form->control('first_name', [
                                    'class' => 'form-control bold fs-5',
                                    'label' => ['class' => 'form-label fw-semibold'],
                                    'placeholder' => 'Enter first name'
                                ]) ?>
                            </div>

                            <div class="col-md-6">
                                <?= $this->Form->control('last_name', [
                                    'class' => 'form-control bold fs-5',
                                    'label' => ['class' => 'form-label fw-semibold'],
                                    'placeholder' => 'Enter last name'
                                ]) ?>
                            </div>

                            <div class="col-12">
                                <?= $this->Form->control('email', [
                                    'class' => 'form-control bold fs-5',
                                    'label' => ['class' => 'form-label fw-semibold'],
                                    'placeholder' => 'Enter your email address',
                                    'type' => 'email'
                                ]) ?>
                            </div>

                            <div class="col-12">
                                <?= $this->Form->control('password', [
                                    'class' => 'form-control bold fs-5',
                                    'label' => ['class' => 'form-label fw-semibold'],
                                    'placeholder' => 'Choose a strong password',
                                    'type' => 'password'
                                ]) ?>
                                <div class="form-text">
                                    Password should be at least 8 characters long and include numbers and special characters.
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <?= $this->Form->button(__('Create Account'), [
                                'class' => 'btn btn-dark py-2 bold rounded-5',
                            ]) ?>
                        </div>

                        <div class="text-center mt-2">
                            Already have an account?
                            <?= $this->Html->link(__('Sign In'), [
                                'action' => 'login'
                            ], ['class' => 'text-decoration-none']) ?>
                        </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
