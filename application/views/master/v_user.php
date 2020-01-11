<div class="page-header">
    <h1 class="page-title">MASTER USER</h1>
    <br/>
    <ol class="breadcrumb breadcrumb-arrow">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active">User</li>
    </ol>
</div>
<br/>
<div class="page-body">
    <button type = "button" class = "btn btn-primary btn-sm" data-toggle = "modal" data-target = "#tambahUser">+ ADD USER</button>
    <br/><br/>
    <table class = "table table-striped table-hover table-bordered" id = "table_driver" data-plugin = "dataTable">
        <thead>
            <th style = "width:5%">#</th>
            <th style = "width:10%">Nama User</th>
            <th style = "width:10%">Email User</th>
            <th style = "width:10%">Date User Add</th>
            <th style = "width:10%">Date User Edit</th>
            <th style = "width:5%">Status User</th>
            <th style = "width:5%">Action</th>
        </thead>
        <tbody>
            <?php for($a = 0; $a<count($user); $a++):?>
            <tr>
                <td><?php echo $a+1;?></td>
                <td><?php echo $user[$a]["nama_user"];?></td>
                <td><?php echo $user[$a]["email_user"];?></td>
                <td><?php echo $user[$a]["tgl_user_add"];?></td>
                <td><?php echo $user[$a]["tgl_user_edit"];?></td>
                <td>
                    <?php if($user[$a]["status_aktif_user"] == 1):?>
                    <button type = "button" class = "btn btn-primary btn-sm col-lg-12">ACTIVE</button>
                    <?php else:?>
                    <button type = "button" class = "btn btn-danger btn-sm col-lg-12">NOT ACTIVE</button>
                    <?php endif;?>
                </td>
                <td>
                    <button type = "button" data-toggle = "modal" class = "btn btn-primary btn-sm col-lg-12" data-target = "#editUser<?php echo $user[$a]["id_submit_user"];?>">EDIT</button>
                    <button type = "button" data-toggle = "modal" class = "btn btn-light btn-sm col-lg-12" data-target = "#overridePassword<?php echo $user[$a]["id_submit_user"];?>">PASSWORD</button>
                    
                    <?php if($user[$a]["status_aktif_user"] == 1):?>
                    <a href = "<?php echo base_url();?>user/deactive/<?php echo $user[$a]["id_submit_user"];?>" class = "btn btn-danger btn-sm col-lg-12">DEACTIVE</a>
                    <?php else:?>
                    <a href = "<?php echo base_url();?>user/activate/<?php echo $user[$a]["id_submit_user"];?>" class = "btn btn-primary btn-sm col-lg-12">ACTIVATE</a>
                    <?php endif;?>
                </td>
            </tr>
            <?php endfor;?>
        </tbody>
    </table>
</div>
<div class = "modal fade" id = "tambahUser">
    <div class = "modal-dialog modal-center">
        <div class = "modal-content">
            <div class = "modal-header">
                <h4>Add User</h4>
            </div>
            <div class = "modal-body">
                <form action = "<?php echo base_url();?>user/insert" method = "POST">
                    <div class = "form-group">
                        <h5>Nama User</h5>
                        <input type = "text" class = "form-control" name = "nama_user">
                    </div>
                    <div class = "form-group">
                        <h5>Email User</h5>
                        <input type = "text" class = "form-control" name = "email_user">
                    </div>
                    <div class = "form-group">
                        <h5>Password User</h5>
                        <input type = "password" class = "form-control" name = "password_user">
                    </div>
                    <div class = "form-group">
                        <button type = "submit" class = "btn btn-primary btn-sm">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php for($a = 0; $a<count($user); $a++):?>
<div class = "modal fade" id = "editUser<?php echo $user[$a]["id_submit_user"];?>">
    <div class = "modal-dialog modal-center">
        <div class = "modal-content">
            <div class = "modal-header">
                <h4>Edit User</h4>
            </div>
            <div class = "modal-body">
                <form action = "<?php echo base_url();?>user/update" method = "POST">
                    <input type = "hidden" name = "id_submit_user" value = "<?php echo $user[$a]["id_submit_user"];?>">
                    <div class = "form-group">
                        <h5>Nama User</h5>
                        <input type = "text" class = "form-control" value = "<?php echo $user[$a]["nama_user"];?>" name = "nama_user">
                    </div>
                    <div class = "form-group">
                        <h5>Email User</h5>
                        <input type = "text" class = "form-control" value = "<?php echo $user[$a]["email_user"];?>" name = "email_user">
                    </div>
                    <div class = "form-group">
                        <button type = "submit" class = "btn btn-primary btn-sm">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class = "modal fade" id = "overridePassword<?php echo $user[$a]["id_submit_user"];?>">
    <div class = "modal-dialog modal-center">
        <div class = "modal-content">
            <div class = "modal-header">
                <h4>Edit PASSWORD</h4>
            </div>
            <div class = "modal-body">
                <form action = "<?php echo base_url();?>user/update_password" method = "POST">
                    <input type = "hidden" name = "id_submit_user" value = "<?php echo $user[$a]["id_submit_user"];?>">
                    <div class = "form-group">
                        <h5>Password User</h5>
                        <input type = "password" class = "form-control" name = "password_user">
                    </div>
                    <div class = "form-group">
                        <button type = "submit" class = "btn btn-primary btn-sm">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endfor;?>