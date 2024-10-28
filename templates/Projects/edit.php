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
<div class="d-flex justify-content-center align-items-center">
    <div class="fixed-width-600">
        <div class="projects form">
            <?= $this->Form->create($project, ['class' => 'd-flex flex-column gap-3']) ?>
            <fieldset>
                <h3 class="bold"><?= __('Edit Project') ?></h3>
                <?php
                echo $this->Form->control('project_name', ['class' => 'form-control form-label']);
                echo $this->Form->control('description', ['class' => 'form-control form-label']);
                echo $this->Form->control('management_tool_link', ['class' => 'form-control form-label']);
                echo $this->Form->control('project_due_date', ['class' => 'form-control form-label']);
                echo $this->Form->control('last_checked', ['class' => 'form-control form-label']);
                echo $this->Form->control('complete', ['type' => 'checkbox', 'label' => 'Completed?', 'class' => 'mt-4 mb-2']);
                echo $this->Form->control('contractor_id', ['options' => $contractors, 'empty' => 'Select contractor', 'class' => 'w-100 form-control form-label']);
                echo $this->Form->control('organisation_id', ['options' => $organisations, 'empty' => 'Select organisation', 'class' => 'w-100 form-control form-label']);
                echo $this->Form->control('skills._ids', ['options' => $skills, 'class' => 'w-100 form-control form-label']);
                ?>
            </fieldset>
            <div class="d-flex gap-2 mt-3 mb-5">
                <?= $this->Form->button(__('Submit'), [
                    'class' => 'btn btn-primary w-100',
                ]) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
