<?php if(!isset($_SESSION['login'])&&($_SESSION['admin'])){
    session_start();
    header('Location:'._WEB_ROOT.'/login');
} ?>
<html>
<head>
<style>
    .tag.label.label-info {
        color: red;
        border: 1px solid #333;
        padding: 4px;
    }
    .bootstrap-tagsinput {
        width: 100%;
    }
</style>
    <title>Quản trị admin website</title>

    <meta charset="utf-8"/>
    <link type="text/css" rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/public/assets/clients/css/style.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/public/assets/clients/css/bootstrap-tagsinput.css"/>
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
                <h5>Post Table</h5>


                <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#modalAddPost"><i class="fa fa-plus"></i> New Post</button>
            </div>
            <table class="admin-user-table table table-striped table-bordered" id="datatable">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
<!--                    <th>User</th>-->
<!--                    <th>Tag</th>-->
<!--                    <th>Category</th>-->
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Author</th>
                    <th>Tags</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($this->data as $key=>$value): ?>
                    <tr>
                        <td><?php echo ++$key?></td>
                        <td><?php echo $value['id']?></td>
<!--                        <td>--><?php //echo $value['id_user']?><!--</td>-->
    <!--                        <td>--><?php //echo $value['id_tag']?><!--</td>-->
    <!--                        <td>--><?php //echo $value['id_category']?><!--</td>-->
                        <td><?php echo $value['title']?></td>
                        <td><?php echo $value['description']?></td>
                        <td><img style="width: 40px;height: 40px" src="<?php echo _WEB_ROOT; ?>/public/assets/clients/image/<?php echo $value['image']?>" alt="img"></td>
                        <td><?php if($value['status']==1){
                                echo "Active";
                            }else {
                            echo "Block";
                            }
                            ?>
                        </td>
                        <td><?php echo $value['author']?></td>
                        <td><?php echo $value['tags']?></td>
                        <td class="action">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditPost" data-id="<?php echo $value['id']?>">
                                <i class="fa fa-edit"></i>
                            </button>
                            <form class="" action="deletePost/ " method="POST" >
                                <input type="text" name="id" hidden value="<?php echo $value['id']?>">
                                <button type="submit" class="btn btn btn-danger"
                                        onclick="return confirm('Xác nhận xóa post: <?php echo $value['title']?> ?')">
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
<div class="modal fade" id="modalAddPost" tabindex="-1" role="dialog" aria-labelledby="modalAddUserLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddUserLabel">Add New Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo _WEB_ROOT; ?>/admin/addPost" method="post">
                <div class="modal-body">
                    <div class="control-item">
                        <label for="">Title:</label><br/>
                        <input type="text" placeholder="Title" name="title" required  value="">
                    </div>
                    <div class="control-item">
                        <label for="">Description:</label><br/>
                        <input type="text" placeholder="Description" name="description" required value="">
                    </div>
                    <div class="control-item">
                        <label for="">Image:</label><br/>
                        <input type="file" name="image" id="image" required>
                    </div>
                    <div class="control-item">
                        <label for="">Status:</label><br/>
                        <select name="status" id="status">
                            <option value="1"  id="role-admin">Active</option>
                            <option value="2"  id="role-user">Block</option>
                        </select>
                    </div>
                    <div class="control-item">
                        <label for="">Author:</label><br/>
                        <input type="text" placeholder="Author" name="author" required value="">
                    </div>
                    <div class="control-item">
                        <label for="">Tag:</label><br/>
                        <input type="text" id="tag" name="tags" value="Cairo" data-role="tagsinput">
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
<div class="modal fade" id="modalEditPost" tabindex="-1" role="dialog" aria-labelledby="modalAddUserLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddUserLabel">Update Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo _WEB_ROOT; ?>/admin/updatePost" method="post">
                <div class="modal-body">
                    <input type="hidden" id="input_post_edit" name="id" value="">
                    <div class="control-item">
                        <label for="">Title:</label><br/>
                        <input type="text" placeholder="Title" name="title" required id="title" value="">
                    </div>
                    <div class="control-item">
                        <label for="">Description:</label><br/>
                        <input type="text" placeholder="Description" name="description" id="description" required value="">
                    </div>
                    <div class="control-item">
                        <label for="">Image:</label><br/>
                        <input type="file" name="image" id="image">
                    </div>
                    <div class="control-item">
                        <label for="">Status:</label><br/>
                        <select name="status" id="statusEdit">
                            <option value="1">Active</option>
                            <option value="2">Block</option>
                        </select>
                    </div>
                    <div class="control-item">
                        <label for="">Author:</label><br/>
                        <input type="text" placeholder="Author" name="author" id="author" required value="">
                    </div>
                    <div class="control-item">
                        <label for="">Tag:</label><br/>
                        <input type="text" id="tag tagUpdate" name="tags" value="" data-role="tagsinput">
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
<?php $this->render('blocks/footer');?>
<script type="text/javascript" src="<?php echo _WEB_ROOT; ?>/public/assets/clients/js/script.js"></script>
<script type="text/javascript" src="<?php echo _WEB_ROOT; ?>/public/assets/clients/js/bootstrap-tagsinput.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function (){
    $('#datatable').DataTable();
});
$("#tag").val();
    $(document).ready(function(){
        $('button[data-target="#modalEditPost"]').each(function () {
            $(this).on('click', function () {
                let id = $(this).attr('data-id');
                $("#input_post_edit").val(id);

                $tr=$(this).closest('tr');
                var data=$tr.children("td").map(function(){
                    return $(this).text();
                }).get();
                console.log(data);
                $('#title').val(data[2]);
                $('#description').val(data[3]);
                $('#image').val(data[4]);

                $role=data[5];
                console.log(data);
                if($role=="Active"){
                    $('#statusEdit').val(1);
                }else {
                    $('#statusEdit').val(2);
                }
                $('#author').val(data[6]);
                $('#tagUpdate').val(data[7]);
            });

        });
    })
</script>
</body>
</html>