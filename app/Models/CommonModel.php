<?php
namespace App\Models;
use CodeIgniter\Model;

class CommonModel extends Model{


    public function getGenericData($table){
        $db = \Config\Database::connect();
        
        $query = $db->query("SELECT * FROM $table WHERE status = 1");
        return $result = $query->getResult();
    }

    public function add_record($table,$data){
        $db = \Config\Database::connect();
        $query = $db->table($table)->insert($data);
        if($query){
            return true;
        }else{
            return false;
        }
    }


    public function insert_record(string $table, array $data){
        $db = \Config\Database::connect();
        $builder = $db->table($table);
    
        if ($builder->insert($data)) {
            return $db->insertID();
        } else {
            return false;
        }
    }


    public function updateRecord(string $columnName, $columnValue, string $table, array $data): bool{
        $db = \Config\Database::connect();
        $builder = $db->table($table);
        $builder->where($columnName, $columnValue);
        $query = $builder->update($data);
        //echo $db->getLastQuery();exit;
        return $query;
    }



    public function row_any_record_where(array $columnArray, string $table, array $where_conditions){
        $db      = \Config\Database::connect();
        $builder = $db->table($table);

        $builder->select(implode(',', $columnArray)); 
        $builder->where($where_conditions);

        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getSingleTableData(string $table, $id){
        $db = \Config\Database::connect();

        $builder = $db->table($table);
        $builder->where('id', $id);
        $query = $builder->get();

        return $query->getRow();
    }

    public function deleteRecord(string $columnName, $columnValue, string $table): bool
    {
        $db = \Config\Database::connect();
        $builder = $db->table($table);
        $builder->where($columnName, $columnValue);
        $query = $builder->delete();
        //echo $db->getLastQuery();
        return $query;
    }

    // public function getAllQuestions() {
    //     $builder = $this->db->table('cnk_question_text');
    //     $builder->select('cnk_question_text.*, cnk_question_paper.name as paper_name');
    //     $builder->join('cnk_question_paper', 'cnk_question_paper.id = cnk_question_text.paper_id', 'left');
    //     $builder->where('cnk_question_text.status', 1);
    //     $builder->orderBy('cnk_question_text.id', 'ASC');
    //     return $builder->get()->getResult();
    // }

    public function getAllQuestions() {
        $builder = $this->db->table('cnk_question_text');
        $builder->select('*');
        $builder->where('status', 1);
        $builder->orderBy('id', 'ASC');
        return $builder->get()->getResult();
    }



    public function updateSingleColumn(string $columnName, $columnValue, string $table, string $updateColumn, $updateValue): bool
    {
        $db = \Config\Database::connect();
        $builder = $db->table($table);
        $builder->where($columnName, $columnValue);
        $data = [$updateColumn => $updateValue];
        $query = $builder->update($data);
        return $query;
    }

    public function getTwoTableData(string $table1, string $table2, $id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($table1 . ' t1');
        $builder->select('
            t1.id as t1_id, t1.name as t1_name, t1.short_name,t1.industry,t1.sector,t1.zone,t1.state,t1.city,t1.pincode, t1.address,t1.primary_color,t1.secondary_color,t1.logo,t1.status as t1_status, t1.created_by as t1_created_by,t1.industry,
            t2.id as t2_id, t2.name as t2_name, t2.username, t2.email, t2.designation, t2.phone, t2.role_id, t2.image, t2.pass, t2.password, t2.client_id, t2.status as t2_status, t2.created_by as t2_created_by, t2.created_on as t2_created_on
        ');
        $builder->join($table2 . ' t2', 't2.client_id = t1.id', 'left');
        $builder->where('t1.id', $id);

        $query = $builder->get();
        return $query->getResultArray();
    }

    public function updateRecordIn(string $columnName, $columnValue, string $table, array $data): bool{
        $db = \Config\Database::connect();
        $builder = $db->table($table);
        $builder->whereIn($columnName, $columnValue);
        $query = $builder->update($data);
        //echo $db->getLastQuery();
        return $query;
    }
   
}