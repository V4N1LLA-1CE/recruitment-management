<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Organisation $organisation
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Organisations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="organisations form content">
            <?= $this->Form->create($organisation) ?>
            <fieldset>
                <legend><?= __('Add Organisation') ?></legend>
                <?php
                    echo $this->Form->control('business_name');
                    echo $this->Form->control('contact_first_name');
                    echo $this->Form->control('contact_last_name');
                    echo $this->Form->control('contact_email');
                    echo $this->Form->control('current_website');
                    echo $this->Form->control('industry');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
