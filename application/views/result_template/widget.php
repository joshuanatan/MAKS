<div class="row" >
  <?php for ($a = 0; $a < count($data); $a++) : ?>
    <?php $access_key = $data[$a]["value"]["header"][0]["db_field"]; ?>
    <?php if (array_key_exists($access_key, $data[$a]["value"]["content"][0])) : ?>
      <div class="col-lg-3">
        <div class="card p-30 flex-row justify-content-between" style = "border-style: dashed;border-width:2px; border-color:lightgray">
          <div class="counter-md text-right">
            <div class="counter-number-group">
              <?php if(is_numeric($data[$a]["value"]["content"][0][$access_key])) $data[$a]["value"]["content"][0][$access_key] = number_format($data[$a]["value"]["content"][0][$access_key]);?>
              <span class="" style="font-size:25px"><?php echo $data[$a]["value"]["content"][0][$access_key]; ?></span><br />
              <span class="counter-number-related text-capitalize" style="font-size:15px"><?php echo $data[$a]["title"]; ?></span>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
  <?php endfor; ?>
</div>