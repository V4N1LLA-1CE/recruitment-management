<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 * @var \Cake\Collection\CollectionInterface|string[] $contractors
 * @var \Cake\Collection\CollectionInterface|string[] $organisations
 * @var \Cake\Collection\CollectionInterface|string[] $skills
 */
?>
<div class="row" style="display: flex; flex-wrap: wrap; gap: 20px; padding: 20px;">
    <aside class="column" style="flex: 1 1 20%; max-width: 200px;">
        <div class="side-nav" style="background-color: #f4f4f4; padding: 15px; border-radius: 8px;">
            <h4 class="heading" style="font-size: 1.2em; margin-bottom: 10px;"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Projects'), ['action' => 'index'], [
                'class' => 'side-nav-item',
                'style' => 'display: block; margin: 10px 0; color: #333; text-decoration: none; font-weight: bold;'
            ]) ?>
        </div>
    </aside>
    <div class="column column-80" style="flex: 1 1 75%; max-width: calc(100% - 240px);">
        <div class="projects form content" style="background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);">
            <?= $this->Form->create($project, ['style' => 'display: flex; flex-direction: column; gap: 15px;']) ?>
            <fieldset>
                <legend style="font-size: 1.5em; font-weight: bold; margin-bottom: 10px;"><?= __('Add Project') ?></legend>
                <?php
                echo $this->Form->control('project_name', ['label' => ['class' => 'form-label'], 'style' => 'width: 100%; padding: 10px;']);
                echo $this->Form->control('description', ['label' => ['class' => 'form-label'], 'style' => 'width: 100%; padding: 10px;']);
                echo $this->Form->control('management_tool_link', ['label' => ['class' => 'form-label'], 'style' => 'width: 100%; padding: 10px;']);
                echo $this->Form->control('project_due_date', ['empty' => true, 'label' => ['class' => 'form-label'], 'style' => 'width: 100%; padding: 10px;']);
                echo $this->Form->control('last_checked', ['empty' => true, 'label' => ['class' => 'form-label'], 'style' => 'width: 100%; padding: 10px;']);

                echo '<div style="display: flex; align-items: center; gap: 8px; margin-top: 10px;">';
                echo $this->Form->control('complete', ['type' => 'checkbox', 'label' => false, 'style' => 'transform: scale(1.2);']);
                echo '<label style="font-weight: bold; color: #5a5a5a;">' . __('Complete') . '</label>';
                echo '</div>';

                echo $this->Form->control('contractor_id', ['options' => $contractors, 'empty' => true, 'label' => ['class' => 'form-label'], 'style' => 'width: 100%; padding: 10px;']);
                echo $this->Form->control('organisation_id', ['options' => $organisations, 'empty' => true, 'label' => ['class' => 'form-label'], 'style' => 'width: 100%; padding: 10px;']);
                echo $this->Form->control('skills._ids', ['options' => $skills, 'label' => ['class' => 'form-label'], 'style' => 'width: 100%; padding: 10px;']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), [
                'class' => 'btn btn-primary',
                'style' => 'padding: 10px 20px; background-color: #007bff; color: #fff; border: none; border-radius: 5px; font-size: 1em;'
            ]) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
