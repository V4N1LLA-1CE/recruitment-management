<?php

/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-danger alert-dismissible fade show py-2" onclick="this.classList.add('hidden');" role="alert">
    <?= $message ?>
    <button type="button" class="btn-close small" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
