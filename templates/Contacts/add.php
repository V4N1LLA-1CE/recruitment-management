<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contact $contact
 * @var \Cake\Collection\CollectionInterface|string[] $organisations
 * @var \Cake\Collection\CollectionInterface|string[] $contractors
 */
?>
<div class="d-flex justify-content-center align-items-center dvh-100">
    <div class="bg-white shadow p-5 fixed-width-600">
        <?= $this->Form->create($contact) ?>
        <fieldset>
            <div class="mb-5">
                <h1 class="text-center text-muted"><?= __('Contact Us') ?></h1>
                <p class="text-center text-muted mb-4">Fill out the form below and we'll get back to you as soon as possible.</p>
            </div>
            <?php
            echo $this->Form->control('first_name', [
                'required' => true
            ]);
            echo $this->Form->control('last_name', [
                'required' => true
            ]);
            echo $this->Form->control('email', [
                'required' => true
            ]);
            echo $this->Form->control('phone_number', [
                'required' => true
            ]);
            echo $this->Form->control('message', [
                'required' => true,
                'type' => 'textarea',
                'rows' => '4',
                'style' => 'resize: none;'
            ]);
            ?>
        </fieldset>
        <button type="submit" class="btn btn-primary px-5 bold">Send Message</button>
        <?= $this->Form->end() ?>
    </div>
</div>
