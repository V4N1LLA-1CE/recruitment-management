<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contractor $contractor
 * @var \Cake\Collection\CollectionInterface|string[] $skills
 */
$this->setLayout('admin')
?>
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <h3 class="card-title text-primary mb-0 fw-bold"><?= __('Add Contractor') ?></h3>
                </div>
                <div class="card-body p-4">
                    <?= $this->Form->create($contractor, ['class' => 'd-flex flex-column gap-3']) ?>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <?= $this->Form->control('first_name', [
                                'class' => 'form-control',
                                'label' => ['class' => 'form-label fw-semibold'],
                                'placeholder' => 'Enter first name'
                            ]) ?>
                        </div>

                        <div class="col-md-6">
                            <?= $this->Form->control('last_name', [
                                'class' => 'form-control',
                                'label' => ['class' => 'form-label fw-semibold'],
                                'placeholder' => 'Enter last name'
                            ]) ?>
                        </div>

                        <div class="col-md-6">
                            <?= $this->Form->control('phone_number', [
                                'class' => 'form-control',
                                'label' => ['class' => 'form-label fw-semibold'],
                                'placeholder' => 'Enter phone number'
                            ]) ?>
                        </div>

                        <div class="col-md-6">
                            <?= $this->Form->control('contractor_email', [
                                'class' => 'form-control',
                                'label' => ['class' => 'form-label fw-semibold'],
                                'placeholder' => 'Enter email address'
                            ]) ?>
                        </div>

                        <div class="col-12">
                            <?= $this->Form->control('skills._ids', [
                                'options' => $skills,
                                'class' => 'form-control',
                                'label' => ['class' => 'form-label fw-semibold'],
                                'multiple' => true,
                                'size' => 10, // This will show 10 options at once
                                'data-placeholder' => 'Select contractor skills',
                                'style' => 'min-height: 200px;' // Or you can specify exact height
                            ]) ?>
                        </div>
                    </div>

                    <div class="pt-4">
                        <?= $this->Html->link(__('Cancel'), ['action' => 'index'], [
                            'class' => 'btn btn-outline-secondary me-2'
                        ]) ?>
                        <?= $this->Form->button(__('Create Contractor'), [
                            'class' => 'btn btn-primary px-4 mx-3',
                        ]) ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
