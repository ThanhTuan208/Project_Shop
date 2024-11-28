<?php
include "header.php";
include "sidebar.php";

?>
<!-- BEGIN CONTENT -->
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
        <h1>Manage Items</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><a href="form.html"> <i class="icon-plus"></i>
                            </a></span>
                        <h5>Items</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered
                                    table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Title</th>
                                    <th>Excerpt</th>
                                    <th>Category</th>
                                    <th>Feature</th>
                                    <th>View</th>
                                    <th>Author</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            $getAllItem = $item->getAllItemByAllTable();
                            foreach ($getAllItem as $key => $value) :
                                $dateFormat = date('M, d, Y', strtotime($value['created_at']));
                            ?>
                                <tbody>
                                    <tr class="">
                                        <td width="250">
                                            <img src="..//anh/<?php echo $value['image'] ?>" />
                                        </td>
                                        <td><?php echo $value['name'] ?></td>
                                        <td><?php echo $value['nameManu'] ?></td>
                                        <td><?php echo $value['nameType'] ?></td>
                                        <td><?php echo substr($value['description'], 0, 200) ?> ...</td>
                                        <td>$<?php echo $value['price'] ?>.00</td>
                                        <td><?php echo $value['authors'] ?></td>
                                        <td><?php echo $dateFormat ?></td>
                                        <td>
                                            <a href="#45" class="btn
                                                    btn-success btn-mini">Edit</a>
                                            <a href="#45" class="btn
                                                    btn-danger btn-mini">Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php endforeach ?>
                        </table>
                        <div class="row" style="margin-left: 18px;">
                            <ul class="pagination">
                                <li class="active"><a href="">1</a>
                                </li>
                                <li><a href="">2</a></li>
                                <li><a href="">3</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END CONTENT -->
<div class="row-fluid">
    <div id="footer" class="span12"> 2017 &copy; TDC - Lập trình web 1</div>
</div>
<?php include "footer.php" ?>