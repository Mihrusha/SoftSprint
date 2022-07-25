<!-- Modal 1-->
<div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" id="header">
                <h5 class="modal-title" id="ModalName">Edit Modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="Close" name="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" action="javascript:void(0)" method="post" id="ajax-form">
                <form>
                    <div class="form-group">
                        <label for="first-name" class="col-form-label">First Name:</label>
                        <input type="hidden" name="userId" id="userId" class="form-control" value="" maxlength="50">
                        <input type="text" name="name" id="name" class="form-control" value="" maxlength="50" required pattern="[a-zA-Z'-'\s]*" title="Only A-z">
                    </div>
                    <div class="form-group">
                        <label for="last-name" class="col-form-label">Last Name:</label>
                        <input type="text" name="surname" id="surname" class="form-control" value="" maxlength="30" required pattern="[a-zA-Z'-'\s]*" title="Only A-z">
                    </div>

                    <div class='row mt-2 mb-2'>
                        <div class='col'>
                            <div class="form-group">

                                <select class="form-select" aria-label="Default select example" id="role" name='role'>
                                    <option selected value="no">Set Role</option>
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>

                                </select>

                            </div>
                        </div>

                        <div class='col'>
                            <div class='form-group'>
                                <div class='col-5'>
                                    <label class="switch">
                                        <input type="checkbox" id="status" name='status'>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="Close" name='Close'>Close</button>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Add</button>
                    <button type="submit" class="btn btn-danger" name="save" value="save">Save</button>

                </form>



            </div>
        </div>
    </div>
</div>


<!-- Modal Edit Status-->
<div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Check</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-8 col-offset-2">

                        <p>Do you realy want this action?</p>

                        <form action="javascript:void(0)" method="post" id="statusForm">
                            <div class="form-group">

                                <input type="hidden" name="userId" id="userId" class="form-control" value="" maxlength="50">
                            </div>
                            <div class="form-group ">

                                <input type="hidden" name="Editstatus" id="Editstatus" class="form-control" value="" maxlength="30">
                            </div>

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="edit" value="Edit" id="action">Action</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
</div>

<!-- **********Modals for edit********  -->
<div class="modal fade" id="editMod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Check 1</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-8 col-offset-2">

                        <p>You click Ok but not click checbox</p>

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
</div>


<div class="modal fade" id="edit_Mod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Check 2</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-8 col-offset-2">

                        <p>You must choose status</p>

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
</div>

<!-- ******************************* -->

<!-- **********Modals for delete********  -->

<div class="modal fade" id="DeleteMod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete check 1</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-8 col-offset-2">

                        <p>You must choose checkbox</p>

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
</div>

<div class="modal fade" id="Delete_Mod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete check 2</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-8 col-offset-2">

                        <p>Do you want delete person?</p>

                        <button type="button" class="btn btn-primary" id="modal-btn-yes">Yes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="modal-btn-no">Close</button>

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
</div>

<!-- **************Mass Delet Modal************** -->

<div class="modal fade" id="MassDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Check</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-8 col-offset-2">

                        <p>Do you realy want delete ?</p>

                        <form action="javascript:void(0)" method="post" id="MassDeleteForm">
                            <div class="form-group">

                                <input type="hidden" name="deleteId" id="deleteId" class="form-control" value="" maxlength="50">
                            </div>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="edit" value="Edit" id="action">Action</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
</div>