<?php if($tipe_informasi == "WIDGET"):?>
<div class = "row">
    <h3><?php echo strtoupper($title);?></h3>
    <div class="col-lg-12">
        <div class="card p-30 flex-row justify-content-between">
            <div class="counter counter-md counter text-right">
                <div class="counter-number-group">
                    <span class="counter-number" style = "font-size:18px"><?php echo $result[0][$data["select"]["value"][0]];?></span><br/>
                    <span class="counter-number-related text-capitalize"><?php echo $data["select"]["value"][0];?></span>
                </div>
                <?php if(isset($data["where"])):?>
                <div class="counter-label text-capitalize font-size-16">
                    Condition:<br/>
                    <?php for($b = 0; $b<count($data["where"]["value"]); $b++):?>
                        <strong><?php echo $data["where"]["value"][$b]["key"];?>: </strong><?php echo $data["where"]["value"][$b]["value"];?><br/>
                    <?php endfor;?>
                </div>
                <?php endif;?>
                <br/>
                <?php if(isset($data["group by"])):?>
                <div class="counter-label text-capitalize font-size-16">
                    Group By:<br/>
                    <?php for($b = 0; $b<count($data["group by"]["value"]); $b++):?>
                        <strong><?php echo $data["group by"]["value"][$b];?><br/>
                    <?php endfor;?>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
<?php elseif($tipe_informasi == "CHART"):?>
<div class = "row">
    <div class="col-lg-12 col-xl-12">
    <!-- Example Bar -->
        <div class="example-wrap">
            <h4 class="example-title">KPI</h4>
            <div class="example text-center">
                <canvas id="exampleChartjsBar" style = "width:100%"></canvas>
            </div>
        </div>
    <!-- End Example Bar -->
    </div>
</div>
<?php elseif($tipe_informasi == "TABLE"):?>

<h3><?php echo strtoupper($title);?></h3>
<?php if(isset($data["where"])):?>
<div class="counter-label text-capitalize font-size-16">
    Condition:<br/>
    <?php for($b = 0; $b<count($data["where"]["value"]); $b++):?>
        <strong><?php echo $data["where"]["value"][$b]["key"];?>: </strong><?php echo $data["where"]["value"][$b]["value"];?><br/>
    <?php endfor;?>
</div>
<?php endif;?>
<br/>
<?php if(isset($data["group by"])):?>
<div class="counter-label text-capitalize font-size-16">
    Group By:<br/>
    <?php for($b = 0; $b<count($data["group by"]["value"]); $b++):?>
        <strong><?php echo $data["group by"]["value"][$b];?><br/>
    <?php endfor;?>
</div>
<?php endif;?>
<hr/>
<table class = "table table-striped table-hover table-bordered" style = "width:100%" data-plugin = "dataTable">
    <thead>
        <?php for($b = 0;$b<count($data["select"]["value"]); $b++):?>
        <th><?php echo $data["select"]["value"][$b];?></th>
        <?php endfor;?>
    </thead>
    <tbody>
        <?php for($a = 0; $a<count($result); $a++):?>
        <tr>
            <?php for($b = 0;$b<count($data["select"]["value"]); $b++):?>
            <td><?php echo $result[$a][$data["select"]["value"][$b]];?></td>
            <?php endfor;?>
        </tr>
        <?php endfor;?>
    </tbody>
</table>
<br/>
<?php endif;?>
<a href = "<?php echo base_url();?>master/intent" class = "btn btn-primary btn-sm">BACK</a>