<style>
  
  .utm-source,
  .utm-medium,
  .utm-campaign {
    font-weight: bold;
  }

</style>
<h1>Settings<h1>

<h2>UTM Sources</h2>
<div id='utm-sources-table'>
  <div class='utm-sources'>
    <?php
      $utm_sources = get_option('utm_source');
      if(empty($utm_sources)) {
        ?>
          <div class='empty'>
            There is no saved source yet
          </div>
        <?php
      } else {
        foreach ($utm_sources as $source) {
          ?>
            <div class='utm-source'>
              <?php echo $source; ?>
            </div>
          <?php
        }
      }
    ?>
  </div>
</div>
<input id='new-utm-source'/>
<button id="add-utm-source">Add a New Source</button>

<h2>UTM Medium</h2>
<div id='utm-medium-table'>
  <div class='utm-mediums'>
    <?php
      $mediums = get_option('utm_medium');
      if (empty($mediums)) {
        ?>
          <div class='empty'>There is no saved medium yet</div>
        <?php
      } else {
        foreach ($mediums as $medium) {
          ?>
            <div class='utm-medium'>
              <?php echo $medium ?>
            </div>
          <?php
        }
      }
    ?>
  </div>
</div>
<input id='new-utm-medium'/>
<button id="add-utm-medium">Add a New Medium</button>

<h2>UTM Campaign</h2>
<div id='utm-campaign-table'>
  <div class='utm-campaigns'>
    <?php
      $campaigns = get_option('utm_campaign');
      if (empty($campaigns)) {
        ?>
          <div class='empty'>There is no saved campaign yet</div>
        <?php
      } else {
        foreach ($campaigns as $campaign) {
        ?>
          <div class='utm-campaign'>
            <?php echo $campaign; ?>
          </div>
        <?php
        }
      }
    ?>
  </div>
</div>
<input id='new-utm-campaign'/>
<button id="add-utm-campaign">Add a New Campaign</button>

<script>

  let utmSourceSubmit = document.querySelector('#add-utm-source')
  if(utmSourceSubmit) {
    utmSourceSubmit.onclick = () => {
      setOnclick('#new-utm-source', 'utm_source')
    }
  }

  let utmMediumSubmit = document.querySelector('#add-utm-medium')
  if(utmMediumSubmit) {
    utmMediumSubmit.onclick = () => {
      setOnclick('#new-utm-medium', 'utm_medium')
    }
  }

  let utmCampaignSubmit = document.querySelector('#add-utm-campaign')
  if(utmCampaignSubmit) {
    utmCampaignSubmit.onclick = () => {
      setOnclick('#new-utm-campaign', 'utm_campaign')
    }
  }
 
  function setOnclick(valueSelector, type) {
    let value = document.querySelector(valueSelector).value

    let data = {
      action: 'save_utm_options',
      type,
      data: value
    }

    saveOption(data)
  }

  function saveOption(data) {
    jQuery.post(ajaxurl, data, function (response) {
      console.log(response)
      location.reload()
    })
  }

</script>