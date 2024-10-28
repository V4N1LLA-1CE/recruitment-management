<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Skill $skill
 * @var \Cake\Collection\CollectionInterface|string[] $contractors
 * @var \Cake\Collection\CollectionInterface|string[] $projects
 */
$this->setLayout('admin')
?>
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <h3 class="card-title text-primary mb-0 fw-bold"><?= __('Add Skill') ?></h3>
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

                    <div class="pt-4">
                        <?= $this->Html->link(__('Cancel'), ['action' => 'index'], [
                            'class' => 'btn btn-outline-secondary me-2'
                        ]) ?>
                        <?= $this->Form->button(__('Create Skill'), [
                            'class' => 'btn btn-primary px-4 mx-3',
                        ]) ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
