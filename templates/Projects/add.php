<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 * @var \Cake\Collection\CollectionInterface|string[] $contractors
 * @var \Cake\Collection\CollectionInterface|string[] $organisations
 * @var \Cake\Collection\CollectionInterface|string[] $skills
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Projects'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projects form content">
            <?= $this->Form->create($project) ?>
            <fieldset>
                <legend><?= __('Add Project') ?></legend>
                <?php
                    echo $this->Form->control('project_name');
                    echo $this->Form->control('description');
                    echo $this->Form->control('management_tool_link');
                    echo $this->Form->control('project_due_date', ['empty' => true]);
                    echo $this->Form->control('last_checked', ['empty' => true]);
                    echo $this->Form->control('complete');
                    echo $this->Form->control('contractor_id', ['options' => $contractors, 'empty' => true]);
                    echo $this->Form->control('organisation_id', ['options' => $organisations, 'empty' => true]);
                    echo $this->Form->control('skills._ids', ['options' => $skills]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
