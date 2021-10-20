<div class="header-content container">
    <ul>
        <li><a href="<?php echo _WEB_ROOT; ?>/admin/" id="requireUsers"><i class="fa fa-users"></i> Users</a></li>
        <li><a href="<?php echo _WEB_ROOT; ?>/admin/post" id="requirePosts"><i class="fa fa-clipboard"></i> Posts</a></li>
        <li><a href="<?php echo _WEB_ROOT; ?>/admin/tag" id="requireTag"><i class="fa fa-tags"></i> Tag</a></li>
        <li><a href="<?php echo _WEB_ROOT; ?>/admin/category" id="requireCategory"><i class="fa fa-android"></i> Category</a></li>
        <li><a href="<?php echo _WEB_ROOT; ?>/user/" id=""><i class="fa fa-eye"></i> View User</a></li>
    </ul>
</div>

<style>
    .header-content ul li a{
        color: black !important;
        font-size: 16px;
    }.header-content ul li a:hover{
             color: #5f5f5f !important;
     }
    .header-content ul li {
        margin: 12px 0;
    }
    .header-content ul li:last-child {
        margin-top: 20px;
    }
</style>