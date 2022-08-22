<div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalName">Add User</h5>
                
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="Close" name='Close'></button>
            </div>
            <div class="modal-body">
            <div id="msg" class='msg' style="background-color:lightcoral"></div>
                <form>
                    <div class="form-group">
                        <label for="first-name" class="col-form-label">First Name:</label>
                        <input type="text" name="userId" id="userId" class="form-control" value="" data-set="" maxlength="50">
                        <input type="text" name="name" id="name" class="form-control" value="" maxlength="50" required pattern="[a-zA-Z'-'\s]*" title="Only A-z">
                    </div>
                    <div class="form-group">
                        <label for="last-name" class="col-form-label">Last Name:</label>
                        <input type="text" name="surname" id="surname" class="form-control" value="" maxlength="30" required pattern="[a-zA-Z'-'\s]*" title="Only A-z">
                    </div>
                    <label for="last-name" class="col-form-label">Choose Role:</label>
                    <div class="form-group">
                        <select class="form-select" aria-label="Default select example" id="role" name='role'>
                            <option selected value="no">Set Role</option>
                            <option value="Admin">Admin</option>
                            <option value="User">User</option>
                        </select>
                    </div>
                    <label for="checkbox" class="col-form-label"> Status :</label>
                    <div class='form-group'>
                        <label class="switch">
                            <input type="checkbox" id="status" name='status'>
                            <span class="slider round"></span>
                        </label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="Close" name='Close'>Close</button>
                <button type="submit" class="btn btn-primary" name="save" id='save' value="save" data-name=''>Edit</button>
            </div>
        </div>
    </div>
</div>






<!-- Modal Edit Status-->
<div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Confirm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div style="background-color:red" id='msg2'>
            </div>
            <div id='msg_new'></div>
            <div class="modal-body">
                <p>Do you realy want this action?</p>
                <form action="javascript:void(0)" method="post" id="statusForm">
                    <div class="form-group">
                        <input type="hidden" name="userId" id="userId" class="form-control" value="" maxlength="50">
                        <input type="hidden" name="userName" id="userName" class="form-control" value="" maxlength="50">
                        <input type="hidden" name="userSurname" id="userSurname" class="form-control" value="" maxlength="50">
                        <input type="hidden" name="userRole" id="userRole" class="form-control" value="" maxlength="50">
                    </div>
                    <div class="form-group ">
                        <input type="hidden" name="Editstatus" id="Editstatus" class="form-control" value="" maxlength="30">
                    </div>
                </form>
                <div class='modal-footer'>
                    <button type="button" class="btn btn-secondary"data-bs-toggle="" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="StatusEdit" value="StatusEdit" id="StatusEdit">Action</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- *****************Edit Check Modals********* -->


<div class="modal fade" id="CheckboxCheck" tabindex="-1" aria-labelledby="CheckboxCheck" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Checkbox check</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>You must choose checkbox</p>

            </div>
            <div class='modal-footer'>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="SelectCheck" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Checkbox check</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>You must choose status</p>

            </div>
            <div class='modal-footer'>
                <button type="button" class="btn btn-secondary" data-bs-toggle="" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<!-- **********Modals for delete********  -->

<div class="modal fade" id="DeleteMod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete check </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>You must choose checkbox</p>
            </div>
            <div class='modal-footer'>
                <button type="button" class="btn btn-secondary" data-bs-toggle="" data-bs-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


<div class="modal fade" id="Delete_Mod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div style="background-color:red" id='msg2'>
                </div>
                <h5 class="modal-title" id="exampleModalLabel">Delete confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="oneDel" id="oneDel" value=''>
                <p>Do you want delete person?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="modal-btn-yes">Yes</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="modal-btn-no">Close</button>
            </div>
        </div>

    </div>
</div>


<!-- **************Mass Delete Modal************** -->

<div class="modal fade" id="MassDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Check</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Do you realy want delete ?</p>
                <form action="javascript:void(0)" method="post" id="MassDeleteForm">
                    <div class="form-group">
                        <input type="hidden" name="deleteId" id="deleteId" class="form-control" value="" maxlength="50">
                    </div>
                </form>
                <div class='modal-footer'>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="massDel" value="massDel" id="massDel">Action</button>
                </div>
            </div>
        </div>
    </div>
</div>