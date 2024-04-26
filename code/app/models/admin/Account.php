<?php

namespace App\Models\Admin;

use App\Models\BaseModel;

class Account extends BaseModel
{

    protected $table = "account";
    // lấy danh sách sản phẩm

    public function getAccount($field, $where = 1)
    {
        $sql = "select $field from $this->table WHERE $where";
        $this->setQuery($sql);
        // echo "<pre>";
        // print_r($this->loadAllRows());
        // echo "</pre>";
        return $this->loadAllRows();
    }

    public function getOrderRequestConfirm($field, $where = null)
    {
        $sql = "
        SELECT $field 
        FROM $this->table 
        INNER JOIN account ON orders.id_user = account.id
        LEFT JOIN orderdetail ON orderdetail.id_order = orders.id 
        WHERE orders.status = 1
        GROUP BY orders.id
        ORDER BY time_order";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function getTotalStatus($idStatus, $field)
    {
        if ($idStatus != null) {
            $idStatus = "WHERE status = $idStatus";
        };
        $sql = "select $field from $this->table 
        $idStatus";
        $this->setQuery($sql);
        // echo "<pre>";
        // print_r($this->loadAllRows());
        // echo "</pre>";
        return $this->loadAllRows();
    }



    /**
     * =============================================================================
     *                                         
     * =============================================================================
     */
    // xây dựng hàm thêm sản phẩm
    public function addOrder($id, $tenSp, $gia)
    {
        //$sql = "INSERT INTO `Orders`(`id`, `ten_sp`, `gia`) VALUES ('[value-1]','[value-2]','[value-3]')";
        $sql = "insert into $this->table values (?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id, $tenSp, $gia]);
    }

    // hàm truyền vào id để lấy ra chi tiết sản phẩm

    // xây dựng hàm sửa sản phẩm
    public function updateOrder($id, $tenSp, $gia)
    {
        $sql = "update $this->table set ten_sp = ?, gia = ? where id = ?";
        $this->setQuery($sql);
        return $this->execute([$tenSp, $gia, $id]);
    }

    // xây dựng hàm xóa sản phẩm
    public function deleteOrder($id)
    {
        $sql = "delete from $this->table where id = ?";
        $this->setQuery($sql);
        return $this->execute($id);
    }
}