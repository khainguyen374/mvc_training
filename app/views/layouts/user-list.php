<?php if(!isset($_SESSION['login'])&&($_SESSION['admin'])){
    header('Location:'._WEB_ROOT.'/login');
} ?>
<html>
<head>
    
    <title>Quản trị admin website</title>
    
    <meta charset="utf-8"/>
    <link type="text/css" rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/public/assets/clients/css/style.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
</head>
<body>
    <?php
    $this->render('blocks/header');?>
    <div class="admin-user container-fluid">
        <div class="row">
            <div class="col-2">
                <?php $this->render('blocks/navbar');?>

            </div>
            <div class="col-10">
                <div class="admin-user-heading">
                    <h5>User Table</h5>
                    <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#modalAddUser"><i class="fa fa-plus"></i> New User</button>
                </div>
                <table class="admin-user-table table table-striped table-bordered" id="datatable">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Permission</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($this->data as $key=>$value): ?>

                        <tr>
                            <td><?php echo ++$key?></td>
                            <td><?php echo $value['id']?></td>
                            <td>
                                <?php
                                if($value['permission_id']==1) {
                                    echo "Admin";
                                }else {
                                    echo "User";
                                }
                                ?>
                            </td>
                            <td><?php echo $value['username']?></td>
                            <td><?php echo $value['email']?></td>

                            <td><?php echo $value['phone']?></td>
                            <td class="action">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditUser" data-id="<?php echo $value['id']?>">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <form class="" action="deleteUser/ " method="POST" >
                                    <input type="text" name="id" hidden value="<?php echo $value['id']?>">
                                <button type="submit" class="btn btn btn-danger"
                                        onclick="return confirm('Xác nhận xóa user: <?php echo $value['username']?> ?')">
                                    <i class="fa fa-trash-o text-white" data-toggle="tooltip" data-placement="bottom"
                                       title="Delete"></i>
                                </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php $this->render('blocks/footer');?>
        <div class="modal fade" id="modalAddUser" tabindex="-1" role="dialog" aria-labelledby="modalAddUserLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAddUserLabel">Add New User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="http://localhost:/mvc_training/admin/addUser" method="post">
                        <div class="modal-body">
                            <div class="control-item">
                                <label for="">Username:</label><br/>
                                <input type="text" placeholder="User Name" name="username" required value="">
                            </div>
                            <div class="control-item">
                                <label for="">Email:</label><br/>
                                <input type="email" placeholder="Email" name="email" required  value="">
                            </div>
                            <div class="control-item">
                                <label for="">Password:</label><br/>
                                <input type="password" placeholder="Password" name="password" required value="">
                            </div>
                            <div class="control-item">
                                <label for="">Role:</label><br/>
                                <select name="permission_id" id="permission_id">
                                    <option value="1" id="permission-admin" id="role-admin">Admin</option>
                                    <option value="2" id="permission-user" id="role-user">User</option>
                                </select>
                            </div>
                            <div class="control-item">
                                <label for="">Phone:</label><br/>
                                <input type="text" placeholder="Phone" name="phone"required value="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalEditUser" tabindex="-1" role="dialog" aria-labelledby="modalAddUserLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAddUserLabel">Edit User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="http://localhost:/mvc_training/admin/updateUser" method="post">
                        <div class="modal-body">
                            <input type="hidden" id="input_user_edit" name="id" value="">
                            <div class="control-item">
                                <label for="">Username:</label><br/>
                                <input type="text" placeholder="User Name" id="username" name="username" required value="">
                            </div>
                            <div class="control-item">
                                <label for="">Email:</label><br/>
                                <input type="email" placeholder="Email" id="email" name="email" required  value="">
                            </div>
                            <div class="control-item">
                                <label for="">Password:</label><br/>
                                <input type="password" placeholder="Password" id="password" name="password" value="">
                            </div>
                            <div class="control-item">
                                <label for="">Role:</label><br/>
                                <select name="permission_id" id="role">
                                    <option value="1" name="permission" id="role-admin">Admin</option>
                                    <option value="2" name="permission" id="role-user">User</option>
                                </select>
                            </div>
                            <div class="control-item">
                                <label for="">Phone:</label><br/>
                                <input type="text" placeholder="Phone" id="phone" name="phone"required value="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="sublit" class="btn btn-primary" >Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <script type="text/javascript" src="<?php echo _WEB_ROOT; ?>/public/assets/clients/js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function (){
            $('#datatable').DataTable();
        });
        <?php if(isset($_SESSION['login'])): ?>
            $(document).ready(function() {
                toastr.options.timeOut = 1500;
                toastr.success('Login thanh cong!');
            });
    <?php endif;?>
        $(document).ready(function(){
            $('button[data-target="#modalEditUser"]').each(function () {
                $(this).on('click', function () {
                    let id = $(this).attr('data-id');
                    $("#input_user_edit").val(id);
                    $tr=$(this).closest('tr');
                    var data=$tr.children("td").map(function(){
                        return $(this).text();
                    }).get();
                    $role=data[2];
                    if($role=="Admin"){
                        $('#role').val(1);
                    }else {
                        $('#role').val(2);
                    }
                    $('#username').val(data[3]);
                    $('#email').val(data[4]);
                    $('#phone').val(data[5]);
                });

            });
        })
    </script>
</body>
</html>