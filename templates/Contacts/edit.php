<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contact $contact
 * @var string[]|\Cake\Collection\CollectionInterface $organisations
 * @var string[]|\Cake\Collection\CollectionInterface $contractors
 */
$this->setLayout('admin')
?>
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <h3 class="card-title text-primary mb-0 fw-bold"><?= __('Edit Contact Assignment') ?></h3>
                </div>
                <div class="card-body p-4">
                    <?= $this->Form->create($contact, ['class' => 'd-flex flex-column gap-3']) ?>
                    <div class="row g-3">
                        <!-- Read-only contact information -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold"><?= __('First Name') ?></label>
                            <input type="text" class="form-control" value="<?= h($contact->first_name) ?>" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold"><?= __('Last Name') ?></label>
                            <input type="text" class="form-control" value="<?= h($contact->last_name) ?>" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold"><?= __('Email') ?></label>
                            <input type="email" class="form-control" value="<?= h($contact->email) ?>" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold"><?= __('Phone Number') ?></label>
                            <input type="text" class="form-control" value="<?= h($contact->phone_number) ?>" readonly>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold"><?= __('Message') ?></label>
                            <textarea class="form-control" rows="4" readonly><?= h($contact->message) ?></textarea>
                        </div>

                        <!-- Editable assignment fields -->
                        <div class="col-md-6">
                            <?= $this->Form->control('organisation_id', [
                                'options' => $organisations,
                                'empty' => 'Select organisation',
                                'class' => 'form-control',
                                'label' => ['class' => 'form-label fw-semibold']
                            ]) ?>
                        </div>

                        <div class="col-md-6">
                            <?= $this->Form->control('contractor_id', [
                                'options' => $contractors,
                                'empty' => 'Select contractor',
                                'class' => 'form-control',
                                'label' => ['class' => 'form-label fw-semibold']
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
                            <?= $this->Form->button(__('Update Assignment'), [
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
