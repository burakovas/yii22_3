<?php
/**
 * Created by PhpStorm.
 * User: burakovas
 * Date: 2019-02-26
 * Time: 21:36
 */

?>

<style>
    .mydiv {
        background-color: lightgrey;
        border: 3px solid grey; /* задаём границу */
        margin: 0 auto;
        text-align: center

    }


</style>


<a href="/site/project?id=<?= $model->id ?>">

<div class="mydiv">
    <h3><?=$model->name?></h3>
    <p><?=$model->description?></p>
</div>

</a>