<?php
class Transaction_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }

    function getOrderList_model($indexSearch = '')
    {
        $this->db->select("T_Id,T_Data,U_Name,S_Name,S_Tel,S_Types,transaction.S_Id");
        $this->db->from("transaction");
        $this->db->join("user","user.U_Id = transaction.U_Id");
        $this->db->join("store","store.S_Id = transaction.S_Id");
        if (!empty($indexSearch)) {
            $this->db->like("S_Name", $indexSearch);
        }
        return $this->db->get();
    }

    function deleteOrder_model($id)//刪除
    {
        $this->db->where("T_Id", $id);//哪一項
        return $this->db->delete("transaction");//哪一個table
    }
    function addOrder_model($addData,$addUser,$addStore){//新增
        $data = array(
                'T_Data' => $addData,
                'U_Id' => $addUser,
                'S_Id' => $addStore,
        );
        return $this->db->insert('transaction',$data);
        // $this->db->insert into 'transaction' ("T_Id, T_Data, U_Id , S_Id");
        // $htis->db->VALUES (NULL, '2018-11-21', '17113120', '3');
    }
    function updateOrder_model($updateId,$updateData,$updateUser,$updateStore){//更新
        $data = array(
            'T_Data' => $updateData,
            'U_Id' => $updateUser,
            'S_Id' => $updateStore,
        );
        $this->db->where('T_Id', $updateId);
        return $this->db->update('transaction', $data);
    }
    // commodity
    function getCommodityList_model(){
        $this->db->select("C_Name,C_Price");
        $this->db->from("commodity");

        return $this->db->get();
    }


}
?>