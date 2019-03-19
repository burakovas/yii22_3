<?php
/**
 * Created by PhpStorm.
 * User: burakovas
 * Date: 2019-02-26
 * Time: 21:36
 */

?>
<style>
    a:hover {
        text-decoration: none;
    }
</style>

<div class="alert alert-info">
    <a href="/site/project?id=<?= $model->id ?> text-decoration: none;">
        <h3><?=$model->name?></h3>
        <p><?=$model->description?></p>
    </a>
</div>