      <div class="container">
        <div class="page-header">
          <h1>Schedule <small>List</small></h1>
        </div>

        <div class="panel-group" id="accordion">
          {quarters}
          <div class="panel panel-default">
              <div class="panel-heading quarterHeading">
                <h3 class="panel-title">{type}</h3>
                {start_date} — {end_date}
                <br>
                {half_start} — {half_end}
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse{id}">
                  <i class="fa fa-caret-square-o-down pull-right"></i>
                </a>
              </div>
            <div id="collapse{id}" class="panel-collapse collapse">
              <div class="panel-body">
                <button type="button" class="btn btn-danger">Delete</button>
                {numberOfWeeks}: {numberOfWeeksOfHalfTerm}
              </div>
            </div>
            <ul class="list-group">
              {weeks}
              <li class="list-group-item"><span class="badge">{numberOfItems}</span>Week {number}</li>
              {/weeks}
            </ul>
          </div>
          {/quarters}
        </div>

      </div>