      <div class="container">
        <div class="page-header">
          <h1>Schedule <small>Create a quarter</small></h1>
        </div>

        <?php
        if (isset($failedBefore) && $failedBefore) {
          print('<div class="panel panel-danger">
          <div class="panel-heading">
            <h3 class="panel-title">There was something wrong with the data you submitted</h3>
          </div>
          <div class="panel-body">');
            print(validation_errors());
            print('</div>
        </div>');
        }
        ?>

        <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>schedule/sendCreate/quarter" method="post">
          <div class="form-group">
            <label for="inputType" class="col-sm-2 control-label">Type</label>
            <div class="col-sm-4">
              <select class="form-control" id="inputType" name="inputType">
                <option value="Oration Quarter" <?php if(isset($failedBefore) && $failedBefore){ echo set_select('inputType', 'Oration Quarter', TRUE); } ?>>Oration Quarter</option>
                <option value="Long Quarter" <?php if(isset($failedBefore) && $failedBefore){ echo set_select('inputType', 'Long Quarter'); } ?>>Long Quarter</option>
                <option value="Cricket Quarter" <?php if(isset($failedBefore) && $failedBefore){ echo set_select('inputType', 'Cricket Quarter'); } ?>>Cricket Quarter</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputQuarterStart" class="col-sm-2 control-label">Start Date</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="inputQuarterStart" name="inputQuarterStart">
            </div>
          </div>
          <div class="form-group">
            <label for="inputQuarterEnd" class="col-sm-2 control-label">End Date</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="inputQuarterEnd" name="inputQuarterEnd">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary btn-lg">Create quarter</button>
            </div>
          </div>
        </form>

      </div>
