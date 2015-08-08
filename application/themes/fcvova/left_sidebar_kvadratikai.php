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
                $a = new Area('Sidebar');
                $a->display($c);
                ?>
            </div>

                <div class="col-md-4 col-content">
                    <?php
                    $a = new Area('Bottom2');
                    $a->setAreaGridMaximumColumns(4);
                    $a->display($c);
                    ?>
                </div>
                <div class="col-md-5 col-content">
                    <?php
                    $a = new Area('Bottom3');
                    $a->setAreaGridMaximumColumns(5);
                    $a->display($c);
                    ?>
                 </div>

                <div class="col-md-4 col-content">
                    <?php
                    $a = new Area('Bottom4');
                    $a->setAreaGridMaximumColumns(4);
                    $a->display($c);
                    ?>
                </div>
                <div class="col-md-5 col-content">
                    <?php
                    $a = new Area('Bottom5');
                    $a->setAreaGridMaximumColumns(5);
                    $a->display($c);
                    ?>
                </div>
            <div class="col-md-4 col-content">
                <?php
                $a = new Area('Bottom6');
                $a->setAreaGridMaximumColumns(4);
                $a->display($c);
                ?>
            </div>
            <div class="col-md-5 col-content">
                <?php
                $a = new Area('Bottom7');
                $a->setAreaGridMaximumColumns(5);
                $a->display($c);
                ?>
            </div>

        </div>


    </div>

</main>

<?php  $this->inc('elements/footer.php'); ?>
