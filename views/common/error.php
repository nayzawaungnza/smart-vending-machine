<?php if (isset($this->errors) && count($this->errors) > 0): ?>
<div class="alert alert-danger">
    <h4 class="alert-heading">Errors:</h4>
    <ul style="">
        <?php foreach ($this->errors as $error): ?>
        <li style="margin:0 0 5px 0px;text-align:left;"><?php echo htmlspecialchars($error); ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>