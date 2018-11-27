<?php $this->load->view("commenu/comheader.php"); ?>

<div class="container">
    <h1><?php echo $headline;?></h1>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">品名</th>
                <th scope="col">價格</th>
            </tr>
        </thead>
        <tbody>
            <?php echo $commodityTable;?>
        </tbody>
    </table>
</div>

<script>

</script>
<?php $this->load->view("commenu/comfooter.php"); ?>