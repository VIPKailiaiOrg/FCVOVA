<?php defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header_top.php');
//$as = new GlobalArea('Header Search');
//$blocks = $as->getTotalBlocksInArea();
//$displayThirdColumn = $blocks > 0 || $c->isEditMode();

?>

<header>
    <div class="container">
        <div class="row">
            <div class="col-sm-2 col-xs-3">
                <?php
                $a = new GlobalArea('Header Site Title');
                $a->display();
                ?>
            </div>
            <div class="col-sm-7 col-xs-2">
                <?php
                $a = new GlobalArea('Header Navigation');
                $a->display();
                ?>
            </div>
                <div class="col-sm-3 col-xs-7">
                    <?php
                    $a = new GlobalArea('Header Search');
                    $a->display(); ?>
                </div>
        </div>
    </div>
</header>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-2635801-2', 'auto');
    ga('send', 'pageview');

</script>