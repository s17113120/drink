<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model("transaction_model","",true);
        $this->load->helper('url');
    }

	public function index($indexSearch = '')
	{
		$data['title'] = "Drink | 首頁";
        $data['headline'] = "DRINK";
        if (!empty($indexSearch)) {
            $arraydata = $this->transaction_model->getOrderList_model(urldecode($indexSearch))->result_array();
        } else {
            $arraydata = $this->transaction_model->getOrderList_model()->result_array();
        }
        $arraydatahow = count($arraydata);
        // echo "$arraydatahow";
        $tableStr = "";
        for($i = 0; $i < $arraydatahow; $i++){
            $tableStr .=
            '<tr>
                <td style="width:20%">
                    <!-- update button -->
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#updateModal" id="" onclick="updatedata(this)" value="' . $arraydata[$i]['T_Id'] . '"><i class="fas fa-pencil-alt"></i></button>

                    <!-- add button -->
                    <a href=\'Order/getOrder/' . $arraydata[$i]['S_Id'] . '/fuck\'><button type="button" class="btn btn-primary" value="' . $arraydata[$i]['S_Id'] . '"><i class="fas fa-cart-plus"></i></button></a>


                    <!-- delete button -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" id="" onclick="deletedata(this)" value="' . $arraydata[$i]['T_Id'] . '"><i class="fas fa-trash-alt"></i></button>
                </td>
                <td>

                    <button class="btn' . $arraydata[$i]['T_Id'] . '"><i class="fas fa-lock-open"></i></button>
                </td>
                <td>
                    ' . $arraydata[$i]['T_Data'] . '
                </td>
                <td>
                    ' . $arraydata[$i]['U_Name'] . '
                </td>
                <td>
                    ' . $arraydata[$i]['S_Name'] . '
                </td>
                <td>
                    ' . $arraydata[$i]['S_Types'] . '
                </td>
                <td>
                    ' . $arraydata[$i]['S_Tel'] . '
                </td>
            </tr>';
        }
        $data['listTable'] = $tableStr;
        $this->load->view('index_view', $data);
    }

    public function commodity_menu(){
        $data['title'] = "Drink | 訂單";
        $data['headline'] = "DRINK";

        $this->load->view('commodity_menu_view',$data);
    }

	public function deleteOrder()
	{
         //print_r($_REQUEST);
        if (!empty($_POST['deleteId'])) {
            $result = $this->transaction_model->deleteOrder_model($_POST['deleteId']);
            // var_dump($result);
            if ($result) {
                // echo "刪除成功!";
                header("Location: " . base_url(''));
            } else {
                echo "刪除失敗!";
            }
        }
    }
    public function addOrder()
    {
        // print_r($_POST);
        if (!empty($_POST['addData'] && $_POST['addUser'] && $_POST['addStore'])) {
            // print_r($_REQUEST);
            $result = $this->transaction_model->addOrder_model($_POST['addData'],$_POST['addUser'],$_POST['addStore']);
            if ($result) {
                header("Location: " . base_url(''));
            } else {
                echo "新增失敗!";
                //var_dump($result);
            }

        }

    }
    public function searchData()
    {
        // print_r($_POST);
        if (!empty($_POST['indexSearch'])) {
            $result = $this->transaction_model->getOrderList_model($_POST['indexSearch'])->result_array();
            // var_dump($result);
            $searchString = $_POST['indexSearch'];
            if (count($result) != 0) {
                echo "成功";
                header("Location: " . base_url("/Order/index/".urlencode($searchString).""));
                // index();
            } else {
                echo "查無資料!";
            }
        }


    }
    public function updateOrder()
    {
        //print_r($_POST);
        if (!empty($_POST['updateId'] && $_POST['updateData'] && $_POST['updateUser'] && $_POST['updateStore'])) {
            // print_r($_REQUEST);
            $result = $this->transaction_model->updateOrder_model($_POST['updateId'],$_POST['updateData'],$_POST['updateUser'],$_POST['updateStore']);
            if ($result) {
                header("Location: " . base_url(''));
            } else {
                echo "更新失敗!";
                //var_dump($result);
            }
        }
    }

    public function getOrder($id)
    {
        if (!empty($id)) {
            $result = $this->
            // print_r($id);
        }
        // $data['title'] = "Drink | 訂單";
        // $data['headline'] = "訂單";

        // $arraydata = $this->transaction_model->getCommodityList_model()->result_array();
        // $arraydatahow = count($arraydata);
        // // echo "$arraydatahow";
        // $tableStr = "";
        // for($i = 0; $i < $arraydatahow; $i++){
        //     $tableStr .=
        //     '<tr>

        //         <td>
        //         ' . $arraydata[$i]['C_Name'] . '
        //         </td>
        //         <td>
        //         ' . $arraydata[$i]['C_Price'] . '
        //         </td>

        //     </tr>';

        // }
        // $data['commodityTable'] = $tableStr;
        // $this->load->view('commodity_menu_view', $data);
    }

}
?>
