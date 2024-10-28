<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 * @var string[]|\Cake\Collection\CollectionInterface $contractors
 * @var string[]|\Cake\Collection\CollectionInterface $organisations
 * @var string[]|\Cake\Collection\CollectionInterface $skills
 */
$this->setLayout('admin')
?>
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-white py-3">
            <h3 class="card-title mb-0"><?= __('Edit Project') ?></h3>
        </div>
        <div class="card-body">
            <?= $this->Form->create($project, ['class' => 'd-flex flex-column gap-3']) ?>
            <div class="row g-3">
                <div class="col-12">
                    <?= $this->Form->control('project_name', [
                        'class' => 'form-control',
                        'label' => ['class' => 'form-label fw-bold']
                    ]) ?>
                </div>

                <div class="col-12">
                    <?= $this->Form->control('description', [
                        'class' => 'form-control',
                        'label' => ['class' => 'form-label fw-bold'],
                        'rows' => 4
                    ]) ?>
                </div>

                <div class="col-12">
                    <?= $this->Form->control('management_tool_link', [
                        'class' => 'form-control',
                        'label' => ['class' => 'form-label fw-bold'],
                        'placeholder' => 'https://'
                    ]) ?>
                </div>

                <div class="col-md-6">
                    <?= $this->Form->control('project_due_date', [
                        'class' => 'form-control',
                        'label' => ['class' => 'form-label fw-bold'],
                        'type' => 'datetime'
                    ]) ?>
                </div>

                <div class="col-md-6">
                    <?= $this->Form->control('last_checked', [
                        'class' => 'form-control',
                        'label' => ['class' => 'form-label fw-bold'],
                        'type' => 'datetime'
                    ]) ?>
                </div>

                <div class="col-12 my-3">
                    <div class="form-check">
                        <?= $this->Form->control('complete', [
                            'type' => 'checkbox',
                            'label' => ['class' => 'form-check-label fw-bold', 'text' => 'Mark as Completed'],
                            'class' => 'form-check-input'
                        ]) ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <?= $this->Form->control('contractor_id', [
                        'options' => $contractors,
                        'empty' => 'Select contractor',
                        'class' => 'form-control mb-3',
                        'label' => ['class' => 'form-label fw-bold']
                    ]) ?>
                </div>

                <div class="col-md-6">
                    <?= $this->Form->control('organisation_id', [
                        'options' => $organisations,
                        'empty' => 'Select organisation',
                        'class' => 'form-control mb-3',
                        'label' => ['class' => 'form-label fw-bold']
                    ]) ?>
                </div>

                <div class="col-12">
                    <?= $this->Form->control('skills._ids', [
                        'options' => $skills,
                        'class' => 'form-control',
                        'label' => ['class' => 'form-label fw-bold'],
                        'multiple' => true,
                        'size' => 10
                    ]) ?>
                </div>
            </div>

            <div class="d-flex mt-4 ">
                <div>
                    <?= $this->Form->button(__('Update Project'), [
                        'class' => 'btn btn-primary px-4 py-2 flex-grow-1'
                    ]) ?>
                </div>
                <div class="mx-4">
                    <?= $this->Html->link(
                        __('Cancel'),
                        ['action' => 'index'],
                        ['class' => 'btn btn-outline-secondary px-4 py-2']
                    ) ?>
                </div>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
