<?php
require_once('php/verifica_sessao.php');
?>
 <?php if ($usuario_log) : ?>
            <a href="php/logout.php" class="logout-link">Logout</a>
        <?php else : ?>
            <li><a href="contato.php">Cadastre-se</a></li>
        <?php endif; ?>