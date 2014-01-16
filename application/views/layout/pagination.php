<?php
$max_pages = 10;

// Total element count



$current = isset($current) ? $current : Request::current()->param('page');
?>
<center>
    <div class="pagination" >

        <ul>
            <?php if (Request::current()->param('page') > 1) : ?>
                <li><?php echo HTML::anchor(Pagination::uri(Request::current()->param('page') - 1), "&lt;&lt;"); ?></li>
            <?php endif; ?>


            <?php
            for ($i = Request::current()->param('page') - $max_pages / 2; $i < $max_pages; $i++) :
                if ($i < 1) {
                    $i = 1;
                }
                ?>



                <li <?php echo HTML::attributes(array("class" => Request::current()->param('page') == $i ? "active" : "")) ?> ><?php
            echo HTML::anchor(Pagination::uri($i), $i);
                ?></li>


            <?php endfor; ?>

            <?php if (Request::current()->param('page') < $count) : ?>
                <li><?php echo HTML::anchor(Pagination::uri(Request::current()->param('page') + 1), "&gt;&gt;") ?></li>
            <?php endif; ?>
        </ul>



    </div>
</center>

