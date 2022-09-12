<p>
  <label>UTM Source</label>
  <br/>
  <input type='text' list='utmSourceList' placeholder='Enter UTM Source Here' id='utm-source'/>
  <datalist id='utmSourceList'>
    <?php
      $utm_sources = get_option('utm_source');
      foreach ($utm_sources as $source) {
        ?>
          <option>
            <?php echo $source; ?>
          </option>
        <?php
      }
    ?>
  </datalist>
  <br/>
  <label>UTM Medium</label>
  <br>
  <input type='text' list='utmMediumList' placeholder='Enter UTM Medium Here' id='utm-medium'/>
  <datalist id='utmMediumList'>
    <option>social</option>
    <option>cpc</option>
    <option>banner</option>
    <option>email</option>
  </datalist>
  <br/>
  <label>Campaign</label>
  <br/>
  <input type='text' placeholder='Enter UTM Campaign Here' id='campaign'/>
  <br/>
  <button type='submit' id='save-link'>Save & Copy Link</button>
</p>