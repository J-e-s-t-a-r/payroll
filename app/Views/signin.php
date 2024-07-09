 <?php if(!$session()->getFlashdata('msg')): ?>
    <!-- <br> -->
    <!-- <div class="alert alert-warning"> -->
    <?= $session()->getFlashdata('msg') ?>
    <!-- </div> -->
<?php endif; ?>