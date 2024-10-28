<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Skill $skill
 * @var string[]|\Cake\Collection\CollectionInterface $contractors
 * @var string[]|\Cake\Collection\CollectionInterface $projects
 */
$this->setLayout('admin')
?>
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <h3 class="card-title text-primary mb-0 fw-bold"><?= __('Edit Skill') ?></h3>
                </div>
                <div class="card-body p-4">
                    <?= $this->Form->create($skill, ['class' => 'd-flex flex-column gap-3']) ?>
                    <div class="row g-3">
                        <div class="col-12">
                            <?= $this->Form->control('skill_name', [
                                'class' => 'form-control',
                                'label' => ['class' => 'form-label fw-semibold'],
                                'placeholder' => 'Enter skill name'
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
                            <?= $this->Form->button(__('Update Skill'), [
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
