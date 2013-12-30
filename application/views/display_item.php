      <div class="container">
        <div class="page-header">
          <h1>Week {weekID} <small>of {year}</small></h1>
        </div>

        <div class="col-sm-12">

          {items}
          <ul class="media-list">
            <li class="media">
              <a class="pull-left" href="#">
                <img class="media-object" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAACsklEQVR4Xu2Y24upYRTGl0PI0JSimHDjMIVETVMzpvzrziLSTIkiLpTcjJLzcfaziuz2Njufsb8La93o+3jX+65nHX55NZ+fnzu6YdOIAFIB0gIyA254BpIMQaGAUEAoIBQQCtywAoJBwaBgUDAoGLxhCMifIcGgYFAwKBgUDAoGb1iBizHYbDap3+/Tbrcjp9NJwWCQNBrNQdJflKF6vU5ms5lisdhv353S/Ro+T+11kQCNRoN6vR7p9Xr2v16vyev1kt/v52eIkkql+L3BYKBEIkFarfbberuGz+82VCzAZrOhdDrNGX17e6PVakXdbpesVis9PDzwnq1Wi9/BTCYTvb6+0mQyoff3d9LpdBSPx2k8HhOCNhqNFIlEKJvNnu3zuOLO7WbFAiyXSz7sdrvloOfzObdAIBDgM8xmM8rlcuTxeGg0GtF0OmWhcNhKpULD4ZBsNhuvw3eoGqxX6vPcwPe/VywAertarbIftADKHIYgQqEQlctlzm4ymaRSqUSLxeIgwLF4WHN/f09PT090ic//LgAynM/nuXRfXl44i8VikXs9HA6zOHd3d+R2u6ndbnOl+Hw+foZ1Oh1+D3t+fuYqutSnEhEUVwAyjhmA3oYA+2cI8Pj4SLVa7Y/zYACiIjAcM5nMoWrsdjtFo9GDDyU+/zVcT4mjWAAEgQpA1lwuF3+irx0OB1cAyhyGg6EdIBAyjeA+Pj5oMBiQxWLhykF1YABirVKfSrKPNYoFwGIMsEKhQCACDO2AXkaQx4bWgACgAAYiBNnTA0KA+5gje5qc61MVChwHiGEHQ0Z/yq7h829nu6gCfipYNf2IAHIjJDdCciMkN0JqTmG19xYKCAWEAkIBoYDak1jN/YUCQgGhgFBAKKDmFFZ7b6GAUEAoIBQQCqg9idXcXyhw6xT4AgyAjZ+ww1kxAAAAAElFTkSuQmCC" alt="...">
              </a>
              <div class="media-body">
                <h4 class="media-heading">{summary}</h4>
                {body}
                <br>
                <small title="{user_email}">by {user_publicName}</small>
              </div>
            </li>
          </ul>
          {/items}

      </div>
    </div>
