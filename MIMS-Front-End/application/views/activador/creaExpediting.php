<div class="container">
    <div class="row">
        <div class="col-md col-md-offset well">


        <fieldset>
            
            <div class="form-group">
            <div class="row colbox">
            
            <div class="col-md-4">
                <label for="ponumber" class="control-label">PO Number</label>
            </div>
            <div class="col-md-8">
                <input id="PONumber" name="PONumber" placeholder="PO Number" type="text"  class="form-control"  value="" />
            </div>
            </div>
            </div>

            <div class="form-group">
            <div class="row colbox">
            <div class="col-md-4">
                <label for="PurchaseOrderDescription" class="control-label">Purchase Order Description</label>
            </div>
            <div class="col-md-8">
                <input id="PurchaseOrderDescription" name="PurchaseOrderDescription" placeholder="PurchaseOrderDescription" type="text" class="form-control"  value="" />
               </div>
            </div>
            </div>
            
            <div class="form-group">
            <div class="row colbox">
            <div class="col-md-4">
                <label for="SupplierID" class="control-label">Supplier ID</label>
            </div>
            <div class="col-md-8">
            <select class="form-control">
            <?php foreach ($arrEmployees as $arrEmployee)
                echo '<option values="'.$arrEmployee['ID'].'">'.$arrEmployee['FirstName'].' '.$arrEmployee['LastName'].'</option>';
            ?>
            </select>
              
            </div>
            </div>
            </div>

            <div class="form-group">
            <div class="row colbox">
            <div class="col-md-4">
                <label for="ExpeditingAssigned" class="control-label">Expediting Assigned</label>
            </div>
            <div class="col-md-8">
            <select class="form-control">
            <?php foreach ($arrSuppliers as $arrSupplier)
                echo '<option values="'.$arrSupplier['SupplierID'].'">'.$arrSupplier['SupplierName'].'</option>';
            ?>
            </select>
            </div>   
            </div>
            </div>

            
            <div class="form-group">
            <div class="row colbox">
            <div class="col-md-4">
                <label for="OrderDate" class="control-label">Order Date</label>
            </div>
            <div class="col-md-8">
                <input id="OrderDate" name="OrderDate" placeholder="OrderDate" type="text" class="form-control"  value="" />
                </div>
            </div>
            </div>
           
            <div class="form-group">
            <div class="row colbox">
            <div class="col-md-4">
                <label for="DateRequired" class="control-label">Date Required</label>
            </div>
            <div class="col-md-8">
                <input id="Date Required" name="Date Required" placeholder="Date Required" type="text" class="form-control"  value="" />
                </div>
            </div>
            </div>

            
            
            <div class="form-group">
            <div class="col-sm-offset-4 col-md-8 text-left">
                <input id="btn_update" name="btn_update" type="submit" class="btn btn-primary" value="Registrar" />
                <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-danger" value="Cancelar" />
            </div>
            </div>
        </fieldset>
      
        </div>
    </div>
    </div>