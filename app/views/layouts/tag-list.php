<?php if(!isset($_SESSION['login'])&&($_SESSION['admin'])){
    session_start();
    header('Location:'._WEB_ROOT.'/login');
}?>
<html>
<head>

    <title>Quản trị admin website</title>

    <meta charset="utf-8"/>
    <link type="text/css" rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/public/assets/clients/css/style.css"/>
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
                <h5>Tag Table</h5>
                <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#modalAddTag"><i class="fa fa-plus"></i> New Tag</button>
            </div>
            <table class="admin-user-table  table table-striped table-bordered" id="datatable">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Tag Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($this->data as $key=>$value): ?>

                    <tr>
                        <td><?php echo ++$key?></td>
                        <td><?php echo $value['id']?></td>
                        <td><?php echo $value['tagname']?></td>
                        <td class="action">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"data-id="<?php echo $value['id']?>">
                                <i class="fa fa-edit"></i>
                            </button>
                            <form class="" action="deleteTag/ " method="POST" >
                                <input type="text" name="id" hidden value="<?php echo $value['id']?>">
                                <button type="submit" class="btn btn btn-danger"
                                        onclick="return confirm('Xác nhận xóa tag: <?php echo $value['tagname']?> ?')">
                                    <i class="fa fa-trash-o text-white" data-toggle="tooltip" data-placement="bottom"
                                       title="Delete"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Tag</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?php echo _WEB_ROOT; ?>/admin/updateTag" method="post">
                            <div class="modal-body">
                                <div class="control-item">
                                    <input type="hidden" id="input_user_edit" name="id" value="">
                                    <label for="">Category:</label><br/>
                                    <input type="text" placeholder="Tag Name" id="tagname" name="tagname" required value="">
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

        </div>
    </div>
</div>
<?php $this->render('blocks/footer');?>
<div class="modal fade" id="modalAddTag" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddLabel">Add New Tag</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo _WEB_ROOT; ?>/admin/addTag" method="post">
                <div class="modal-body">
                    <div class="control-item">
                        <label for="">Tag:</label><br/>
                        <input type="text" placeholder="Tag Name" name="tagname" required value="">
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo _WEB_ROOT; ?>/public/assets/clients/js/script.js"></script>
<style>

</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function (){
        $('#datatable').DataTable();
    });
    $(document).ready(function(){
        $('button[data-target="#exampleModal"]').each(function () {
            $(this).on('click', function () {
                let id = $(this).attr('data-id');
                $("#input_user_edit").val(id);
                $tr=$(this).closest('tr');
                var data=$tr.children("td").map(function(){
                    return $(this).text();
                }).get();
                $('#tagname').val(data[2]);
            });

        });
    })
</script>
</body>
</html>