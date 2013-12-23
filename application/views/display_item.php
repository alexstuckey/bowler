      <div class="container">
        <div class="page-header">
          <h1>Item <small>№ <?php print($item->id); ?></small></h1>
        </div>

        <div>
          <dl class="dl-horizontal">
            <dt>id</dt>
            <dd><?php print($item->id); ?></dd>

            <dt>Summary</dt>
            <dd><?php print($item->summary); ?></dd>

            <dt>Body</dt>
            <dd><?php print($item->body); ?></dd>

            <dt>Year</dt>
            <dd><?php print($item->year); ?></dd>

            <dt>Week</dt>
            <dd><?php print($item->weekID); ?></dd>

            <dt>Created by</dt>
            <dd><?php print($item->created_by); ?></dd>
          </dl>
        </div>
      </div>