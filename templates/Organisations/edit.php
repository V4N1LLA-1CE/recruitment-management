<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Organisation $organisation
 */
$this->setLayout('admin')
?>
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <h3 class="card-title text-primary mb-0 fw-bold"><?= __('Edit Organisation') ?></h3>
                </div>
                <div class="card-body p-4">
                    <?= $this->Form->create($organisation, ['class' => 'd-flex flex-column gap-3']) ?>
                    <div class="row g-3">
                        <div class="col-12">
                            <?= $this->Form->control('business_name', [
                                'class' => 'form-control',
                                'label' => ['class' => 'form-label fw-semibold'],
                                'placeholder' => 'Enter business name'
                            ]) ?>
                        </div>

                        <div class="col-md-6">
                            <?= $this->Form->control('contact_first_name', [
                                'class' => 'form-control',
                                'label' => ['class' => 'form-label fw-semibold'],
                                'placeholder' => 'Enter first name'
                            ]) ?>
                        </div>

                        <div class="col-md-6">
                            <?= $this->Form->control('contact_last_name', [
                                'class' => 'form-control',
                                'label' => ['class' => 'form-label fw-semibold'],
                                'placeholder' => 'Enter last name'
                            ]) ?>
                        </div>

                        <div class="col-md-6">
                            <?= $this->Form->control('contact_email', [
                                'class' => 'form-control',
                                'label' => ['class' => 'form-label fw-semibold'],
                                'placeholder' => 'Enter email address'
                            ]) ?>
                        </div>

                        <div class="col-md-6">
                            <?= $this->Form->control('current_website', [
                                'class' => 'form-control',
                                'label' => ['class' => 'form-label fw-semibold'],
                                'placeholder' => 'https://'
                            ]) ?>
                        </div>

                        <div class="col-12">
                            <?= $this->Form->control('industry', [
                                'class' => 'form-control',
                                'label' => ['class' => 'form-label fw-semibold'],
                                'type' => 'textarea',
                                'rows' => 4,
                                'placeholder' => 'Describe the industry'
                            ]) ?>
                        </div>
                    </div>

                    <div class="pt-4 d-flex">
                        <div>
                            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], [
                                'class' => 'btn btn-outline-secondary me-2'
                            ]) ?>
                        </div>
                        <div class="mx-3">
                            <?= $this->Form->button(__('Update Organisation'), [
                                'class' => 'btn btn-primary px-4',
                            ]) ?>
                        </div>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
