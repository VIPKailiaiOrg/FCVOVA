<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php'); ?>

<main>
    <?php
//    $a = new Area('Page Header');
//    $a->enableGridContainer();
//    $a->display($c);
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sidebar">
                <?php
                $a = new GlobalArea('Table');
                $a->display($c);
                ?>
            </div>
            <div class="col-md-9 col-content">
                <?php
                $a = new Area('Main');
                $a->setAreaGridMaximumColumns(9);
                $a->display($c);
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sidebar">
                <?php
                $a = new Area('Bottom1');
                $a->display($c);
                ?>
            </div>
            <div class="col-md-3 col-content">
                <?php
                $a = new Area('Bottom2');
                $a->setAreaGridMaximumColumns(9);
                $a->display($c);
                ?>
            </div>
            <div class="col-md-3 col-content">
                <?php
                $a = new Area('Bottom3');
                $a->setAreaGridMaximumColumns(9);
                $a->display($c);
                ?>
            </div>
            <div class="col-md-3 col-content">
                <?php
                $a = new Area('Bottom4');
                $a->setAreaGridMaximumColumns(9);
                $a->display($c);
                ?>
            </div>
        </div>
    </div>

<!--    --><?php
//    $a = new Area('Page Footer');
//    $a->enableGridContainer();
//    $a->display($c);
//    ?>

</main>

<?php  $this->inc('elements/footer.php'); ?>
