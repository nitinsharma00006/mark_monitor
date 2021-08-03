<?php
namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class DbHelper extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
        $this->request = \Config\Services::request();
        $this->session = \Config\Services::session();
    }

    public function select($select, $table, $where = false, $or_where = false, $order_by = FALSE, $limit = FALSE, $offset = FALSE, $or_like = false, $group_by = false)
    {
        $builder = $this->db->table($table);
        $builder->select($select);
        if ($where)
            $builder->where($where);
        if ($or_where)
            $builder->orWhere($or_where);
        if ($or_like)
            $builder->orLike($or_like);
        if ($order_by)
            $builder->orderBy($order_by);
        if ($group_by)
            $builder->groupBy($group_by);
        if ($limit)
            $builder->limit($limit);
        if ($offset)
            $builder->offset($offset);
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function selectDistinct($select, $table, $where = false, $or_where = false, $order_by = FALSE, $limit = FALSE, $offset = FALSE, $or_like = false, $group_by = false)
    {
        $builder = $this->db->table($table);
        $builder->distinct();
        $builder->select($select);
        if ($where)
            $builder->where($where);
        if ($or_where)
            $builder->orWhere($or_where);
        if ($or_like)
            $builder->orLike($or_like);
        if ($order_by)
            $builder->orderBy($order_by);
        if ($group_by)
            $builder->groupBy($group_by);
        if ($limit)
            $builder->limit($limit);
        if ($offset)
            $builder->offset($offset);
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function insert_row($table, $data = null)
    {
        $builder = $this->db->table($table);
        if ($builder->insert($data)) {
            return $this->db->insertID();
        }
        return false;
    }
    public function batchInsert($table, $data)
    {
        $builder = $this->db->table($table);
        $builder->insertBatch($data);
    }
    public function updateRow($table, $data, $where)
    {
        $builder = $this->db->table($table);
        $builder->where($where);
        if ($builder->update($data)) {
            $affected_rows = $this->db->affectedRows();
            if ($affected_rows > 0) {
                return true;
            }
        }
        return false;
    }
    public function deleteRow($table, $where)
    {
        $builder = $this->db->table($table);
        $builder->where($where);
        if ($builder->delete()) {
            $affected_rows = $this->db->affectedRows();
            if ($affected_rows > 0) {
                return true;
            }
        }
        return false;
    }
    public function dataExists($table, $where = FALSE, $or_where = FALSE)
    {
        $builder = $this->db->table($table);
        $builder->select('id');
        if ($where)
            $builder->where($where);
        if ($or_where)
            $builder->orWhere($or_where);
        $query = $builder->get();
        $data = $query->getResultArray();
        if ($data) {
            return $data[0]['id'];
        }
        return false;
    }
    public function countRows($id, $table, $where = FALSE, $or_where = FALSE, $or_like = FALSE, $group_by = FALSE)
    {
        $builder = $this->db->table($table);
        $builder->select("COUNT($table.$id) as numrows");
        if ($where)
            $builder->where($where);
        if ($or_where)
            $builder->orWhere($or_where);
        if ($or_like)
            $builder->orLike($or_like);

        if ($group_by)
            $builder->groupBy($group_by);

        $query = $builder->get();
        $row = $query->getRow();
        if ($row != null && $row->numrows != null) {
            return $row->numrows;
        }
        return false;
    }
    public function customQuery($query)
    {
        $query = $this->db->query($query);
        return $query->getResultArray();
    }
    public function sumColumn($table, $column, $where = FALSE, $or_where = FALSE, $or_like = FALSE, $group_by = FALSE)
    {
        $builder = $this->db->table($table);
        $builder->select('sum(' . $column . ') as sumrows');
        if ($where)
            $builder->where($where);
        if ($or_where)
            $builder->orWhere($or_where);
        if ($or_like)
            $builder->orLike($or_like);
        if ($group_by)
            $builder->groupBy($group_by);
        $query = $builder->get();
        $data = $query->getResultArray();
        if ($data[0]['sumrows'] != '') {
            return $data[0]['sumrows'];
        }
        return 0;
    }
    public function lastQuery()
    {
        echo (string) $this->db->getLastQuery();
    }

}
