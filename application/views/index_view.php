<?php $this->load->view("base/header.php"); ?>

<div class="container">
    <h1><?php echo $headline;?></h1>

    <?php $this->load->view("base/Headmenu.php"); ?>
    <br>
    <br>
    <div class="row">
        <div class="col-8">
            <!-- add Modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus-circle"></i></button>

        </div>
        <div class="col">
            <!-- search -->
            <form id="searchform" method="post" action="<?php echo base_url('Order/searchData')?>">
                <div class="form-group">
                    <input type="text" class="form-control" id="indexSearch" name="indexSearch" value="">
                </div>
            </form>
        </div>
        <div class="col-0">
            <button class="btn btn-dark" id="searchButton"><i class="fas fa-search"></i></button>
        </div>

        <hr>
        <!-- search end -->
    </div>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">加訂</th>
                <th scope="col">lock</th>
                <th scope="col">日期</th>
                <th scope="col">開單者</th>
                <th scope="col">店家</th>
                <th scope="col">類型</th>
                <th scope="col">電話</th>
            </tr>
        </thead>
        <tbody>
            <?php echo $listTable;?>
        </tbody>
    </table>
</div>

<!-- delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <form id="deleteform" method="post" action="Order/deleteOrder">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">刪除訂單</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="delete_message"></p>
                    <input type="text" class="deleteText" id="deleteId" name="deleteId" value="" hidden>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="deleteSend">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- delete Modal -->

<!-- add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <form id="addform" action="Order/addOrder" method="post" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">新增訂單</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="addData">日期：</label>
                        <input type="text" class="form-control addText" name="addData" id="addData">
                    </div>
                    <div class="form-group">
                        <label for="addUser">開單者：</label>
                        <select class="form-control addText" name="addUser" id="addUser">
                            <option value=""></option>
                            <option value="17113120">蘇厚安</option>
                        　  <option value="1945613">小屋</option>
                        　  <option value="1887846">阿布</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="addStore">店家：</label>

                        <select class="form-control addText" name="addStore" id="addStore">
                            <option value=""></option>
                            <option value="1">三商巧福</option>
                        　  <option value="2">拉麵店</option>
                        　  <option value="3">50嵐</option>
                        </select>
                    </div>
                    <!-- <div class="form-group">
                        <label for="addType">類型：</label>
                        <select class="form-control addText" name="addType" id="addType">
                            <option value=""></option>
                            <option value="飯食">飯食</option>
                        　  <option value="麵食">麵食</option>
                        　  <option value="飲料">飲料</option>
                        </select>
                    </div> -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="addClosr">Close</button>
                    <button type="button" class="btn btn-primary" id="addSend">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- add Modal -->

<!-- update Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form id="updateform" method="post" action="Order/updateOrder" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">更新資料 <p id="update_message"></p></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <!-- <label for="updateId">訂單編號：</label> -->
                        <input type="text" class="form-control updateText" name="updateId" id="updateId" hidden>
                    </div>
                    <div class="form-group">
                        <label for="updateData">日期：</label>
                        <input type="text" class="form-control updateText" name="updateData" id="updateData">
                    </div>
                    <div class="form-group">
                        <label for="updateUser">開單者：</label>
                        <select class="form-control updateText" name="updateUser" id="updateUser">
                            <option value=""></option>
                            <option value="17113120">蘇厚安</option>
                            <option value="1945613">小屋</option>
                            <option value="1887846">阿布</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="updateStore">店家：</label>
                        <select class="form-control updateText" name="updateStore" id="updateStore">
                            <option value=""></option>
                            <option value="1">三商巧福</option>
                            <option value="2">拉麵店</option>
                            <option value="3">50嵐</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="updateClose">Close</button>
                    <button type="button" class="btn btn-primary" id="updateSend">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- update Modal -->

<script>
    function deletedata(ob){
        document.getElementById("delete_message").innerHTML = "你確定要刪除  "+ob.value+"  訂單";
        document.querySelector('#deleteId').value = ob.value;
    }
    document.querySelector('#deleteSend').onclick = function(){
        document.querySelector('#deleteform').submit();
    }

    document.querySelector('#addSend').onclick = function() {

        let addText = document.querySelectorAll('.addText');
        let checkNull = false;
        for(let item of addText){
            if(item.value == "" || item.value == undefined){
                checkNull = true;
                item.style.borderColor = 'red';
            }
        }
        if (checkNull) {
            alert(`請輸入完全整`);
        } else {
            document.querySelector('#addform').submit();
        }

    }
    document.querySelector('#searchButton').onclick = function(){
        let indexSearch = document.querySelector('#indexSearch');
        if (indexSearch.value == "" || indexSearch.value == undefined) {
            alert(`請輸入搜尋值`);
        } else {
            document.querySelector('#searchform').submit();
        }
    }
    function updatedata(ob){
        document.getElementById("update_message").innerHTML = "訂單為："+ob.value;
        document.querySelector('#updateId').value = ob.value;
    }
    document.querySelector('#updateSend').onclick = function(){
        document.querySelector('#updateform').submit();

    }

</script>
<?php $this->load->view("base/footer.php"); ?>
