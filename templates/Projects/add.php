<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 * @var \Cake\Collection\CollectionInterface|string[] $contractors
 * @var \Cake\Collection\CollectionInterface|string[] $organisations
 * @var \Cake\Collection\CollectionInterface|string[] $skills
 */
$this->setLayout('admin')
?>
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <h3 class="card-title text-primary mb-0 fw-bold"><?= __('Add Project') ?></h3>
                </div>
                <div class="card-body p-4">
                    <?= $this->Form->create($project, ['class' => 'd-flex flex-column gap-3']) ?>
                    <div class="row g-3">
                        <div class="col-12">
                            <?= $this->Form->control('project_name', [
                                'class' => 'form-control',
                                'label' => ['class' => 'form-label fw-semibold'],
                                'placeholder' => 'Enter project name'
                            ]) ?>
                        </div>

                        <div class="col-12">
                            <?= $this->Form->control('description', [
                                'class' => 'form-control',
                                'label' => ['class' => 'form-label fw-semibold'],
                                'rows' => 4,
                                'placeholder' => 'Enter project description'
                            ]) ?>
                        </div>

                        <div class="col-12">
                            <?= $this->Form->control('management_tool_link', [
                                'class' => 'form-control',
                                'label' => ['class' => 'form-label fw-semibold'],
                                'placeholder' => 'https://'
                            ]) ?>
                        </div>

                        <div class="col-md-6">
                            <?= $this->Form->control('project_due_date', [
                                'class' => 'form-control',
                                'label' => ['class' => 'form-label fw-semibold'],
                                'type' => 'date'
                            ]) ?>
                        </div>

                        <div class="col-md-6">
                            <?= $this->Form->control('last_checked', [
                                'class' => 'form-control',
                                'label' => ['class' => 'form-label fw-semibold'],
                                'type' => 'date'
                            ]) ?>
                        </div>

                        <div class="col-12 my-3">
                            <div class="form-check form-switch">
                                <?= $this->Form->control('complete', [
                                    'type' => 'checkbox',
                                    'label' => 'Mark as Complete',
                                    'class' => 'form-check-input',
                                    'label' => ['class' => 'form-check-label fw-semibold'],
                                    'templates' => [
                                        'nestingLabel' => '{{input}}<label{{attrs}}>{{text}}</label>',
                                    ]
                                ]) ?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <?= $this->Form->control('contractor_id', [
                                'options' => $contractors,
                                'empty' => 'Select contractor',
                                'class' => 'form-control',
                                'label' => ['class' => 'form-label fw-semibold']
                            ]) ?>
                        </div>

                        <div class="col-md-6">
                            <?= $this->Form->control('organisation_id', [
                                'options' => $organisations,
                                'empty' => 'Select organisation',
                                'class' => 'form-control',
                                'label' => ['class' => 'form-label fw-semibold']
                            ]) ?>
                        </div>

                        <div class="col-12">
                            <?= $this->Form->control('skills._ids', [
                                'options' => $skills,
                                'class' => 'form-control',
                                'label' => ['class' => 'form-label fw-semibold'],
                                'multiple' => 'multiple',
                                'data-placeholder' => 'Select required skills'
                            ]) ?>
                        </div>
                    </div>

                    <div class="pt-4">
                        <?= $this->Html->link(__('Cancel'), ['action' => 'index'], [
                            'class' => 'btn btn-outline-secondary me-2'
                        ]) ?>
                        <?= $this->Form->button(__('Create Project'), [
                            'class' => 'btn btn-primary px-4',
                        ]) ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
