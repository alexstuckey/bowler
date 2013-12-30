      <div class="container">
        <div class="page-header">
          <h1>Items <small>List</small></h1>
        </div>

        <div class="col-sm-12">
          {quarters}
          <h2>{type} 2013/4</h2>
          <table class="table table-condensed">
            <thead>
              <tr>
                <th>№</th>
                <th>Week</th>
                <th>Summary</th>
                <th>Set by</th>
              </tr>
            </thead>
            <tbody>
              {items}
              <tr>
                <td>{item-id}</td>
                <td>{weekID}</td>
                <td>{summary}</td>
                <td title="{user_email}">{user_publicName}</td>
              </tr>
              <tr>
                <td colspan="4">{body}</td>
              </tr>
              {/items}
            </tbody>
          </table>
          {/quarters}
        </div>

      </div>
