<?php
    require_once dirname(__FILE__).'/../../config.php';

    $is_login = isset($_SESSION['role']);
?>
<nav>
    <a href="<?= _CALC_PATH ?>">Kalkulator</a>
    <a href="<?= _CREDIT_PATH ?>">Kredyt</a>

    <?php if ($is_login): ?>
        <a href="/app/views/security/logout.php">Wyloguj</a>
    <?php endif ?>
</nav>