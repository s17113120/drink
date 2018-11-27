<?php

class Commodity extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model("transaction_model","",true);
        $this->load->helper('url');
    }
    public function index($id = '')
	{
        if (!empty($id)) {
            echo "HEY";
        }
        $data['title'] = "Drink | 訂單";
        $data['headline'] = "訂單";

        $arraydata = $this->transaction_model->getCommodityList_model()->result_array();
        $arraydatahow = count($arraydata);
        // echo "$arraydatahow";
        $tableStr = "";
        for($i = 0; $i < $arraydatahow; $i++){
            $tableStr .=
            '<tr>

                <td>
                ' . $arraydata[$i]['C_Name'] . '
                </td>
                <td>
                ' . $arraydata[$i]['C_Price'] . '
                </td>

            </tr>';

        }
        $data['commodityTable'] = $tableStr;
        $this->load->view('commodity_menu_view', $data);
    }
}

?>