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
    <div class='utm-source'>Google</div>
  </div>
</div>
<input id='new-utm-source'/>
<button id="add-utm-source">Add a New Source</button>

<h2>UTM Medium</h2>
<div id='utm-medium-table'>
  <div class='utm-mediums'>
    <div class='utm-medium'>
      Banner
    </div>
  </div>
</div>
<input id='new-utm-medium'/>
<button id="add-utm-medium">Add a New Source</button>

<h2>UTM Campaign</h2>
<div id='utm-campaign-table'>
  <div class='utm-campaigns'>
    <div class='utm-campaign'>
      Spring_sale
    </div>
  </div>
</div>
<input id='new-utm-campaign'/>
<button id="add-utm-campaign">Add a New Source</button>

<script>

  let utmSourceSubmit = document.querySelector('#add-utm-source')
  if(utmSourceSubmit) {
    utmSourceSubmit.onclick = () => {
      console.log('submitting utm source')
      let source = document.querySelector('#new-utm-source')
      console.log(source.value)

      let ajaxData = {
        action: 'save_utm_options',
        type: 'source'
      }

      jQuery.post(ajaxurl, ajaxData, function(response) {
        console.log(response)
      })
    }
  }

</script>