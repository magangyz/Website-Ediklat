<?php

namespace App\Modules\Diklat\Models;

use CodeIgniter\Model;

class DiklatModel extends Model
{
    
    protected $table = 'data_diklat';
    protected $primaryKey = 'id';
    protected $allowedFields = [
    'no_diklat',
    'instansi_id',
    'fakultas_id',
    'kegiatan_id',
    'ketua',
    'no_telp',
    'ruangan',
    'keterangan',
    'tgl_mulai',
    'tgl_akhir',
    'status_diklat',
    'status_bayar',
    'total_biaya'
    ];


    /**
     * Optimized getAll - menggunakan JOIN statt subquery untuk COUNT dan SUM
     */
    public function getAll($limit = null, $offset = null)
    {
        $builder = $this->db->table('data_diklat d')
            ->select('
                d.*,
                i.nama AS nama_instansi,
                f.nama AS nama_fakultas,
                k.nama AS nama_kegiatan,
                COUNT(DISTINCT p.id) AS peserta,
                COALESCE(SUM(b.subtotal), 0) AS total_biaya
            ')
            ->join('data_instansi i', 'i.id = d.instansi_id', 'left')
            ->join('data_fakultas f', 'f.id = d.fakultas_id', 'left')
            ->join('kegiatan k', 'k.id = d.kegiatan_id', 'left')
            ->join('data_peserta_diklat p', 'p.diklat_id = d.id', 'left')
            ->join('data_biaya_diklat b', 'b.diklat_id = d.id', 'left')
            ->groupBy('d.id')
            ->orderBy('d.id', 'DESC');

        if ($limit !== null) {
        $offset = $offset ?? 0;
        return $builder->get((int)$limit, (int)$offset)->getResultArray();
        }

        return $builder->get()->getResultArray();
    }

    public function getDetail($id)
    {
        return $this->db->table('data_diklat d')
            ->select('
                d.*,
                i.nama AS nama_instansi,
                f.nama AS nama_fakultas,
                k.nama AS nama_kegiatan
            ')
            ->join('data_instansi i','i.id = d.instansi_id','left')
            ->join('data_fakultas f','f.id = d.fakultas_id','left')
            ->join('kegiatan k','k.id = d.kegiatan_id','left')
            ->where('d.id',$id)
            ->get()->getRowArray();
    }

    /**
     * Optimized getFiltered - menggunakan LEFT JOIN statt subquery
     */
    public function getFiltered($filter, $limit = null, $offset = null)
    {
        $builder = $this->db->table('data_diklat d')
            ->select('
                d.*,
                i.nama AS nama_instansi,
                f.nama AS nama_fakultas,
                k.nama AS nama_kegiatan,
                COUNT(DISTINCT p.id) AS peserta,
                COALESCE(SUM(b.subtotal), 0) AS total_biaya
            ')
            ->join('data_instansi i', 'i.id = d.instansi_id', 'left')
            ->join('data_fakultas f', 'f.id = d.fakultas_id', 'left')
            ->join('kegiatan k', 'k.id = d.kegiatan_id', 'left')
            ->join('data_peserta_diklat p', 'p.diklat_id = d.id', 'left')
            ->join('data_biaya_diklat b', 'b.diklat_id = d.id', 'left')
            ->groupBy('d.id')
            ->orderBy('d.id', 'DESC');

        if (!empty($filter['instansi_id'])) {
            $builder->where('d.instansi_id', $filter['instansi_id']);
        }

        if (!empty($filter['fakultas_id'])) {
            $builder->where('d.fakultas_id', $filter['fakultas_id']);
        }

        if (!empty($filter['kegiatan_id'])) {
            $builder->where('d.kegiatan_id', $filter['kegiatan_id']);
        }

        if (!empty($filter['status_diklat']) && $filter['status_diklat'] != 'semua') {
            $builder->where('d.status_diklat', $filter['status_diklat']);
        }

       if ($limit !== null) {
        $offset = $offset ?? 0;
        return $builder->get((int)$limit, (int)$offset)->getResultArray();
    }

        return $builder->get()->getResultArray();
    }

    /**
     * Hitung total records untuk pagination
     */
    public function countFiltered($filter)
    {
        $builder = $this->db->table('data_diklat d')
            ->select('COUNT(DISTINCT d.id) as total')
            ->join('data_instansi i', 'i.id = d.instansi_id', 'left')
            ->join('data_fakultas f', 'f.id = d.fakultas_id', 'left');

        if (!empty($filter['instansi_id'])) {
            $builder->where('d.instansi_id', $filter['instansi_id']);
        }

        if (!empty($filter['fakultas_id'])) {
            $builder->where('d.fakultas_id', $filter['fakultas_id']);
        }

        if (!empty($filter['kegiatan_id'])) {
            $builder->where('d.kegiatan_id', $filter['kegiatan_id']);
        }

        if (!empty($filter['status_diklat']) && $filter['status_diklat'] != 'semua') {
            $builder->where('d.status_diklat', $filter['status_diklat']);
        }

        return $builder->get()->getRowArray()['total'] ?? 0;
    }

    /**
     * Get data untuk dropdown/select options - dengan caching
     */
    public function getDropdownData($cacheMinutes = 30)
    {
        $cache = \Config\Services::cache();
        $cacheKey = 'diklat_dropdown_data';
        
        $data = $cache->get($cacheKey);
        
        if ($data === null) {
            $data = [
                'instansi' => $this->db->table('data_instansi')->get()->getResultArray(),
                'fakultas' => $this->db->table('data_fakultas')->get()->getResultArray(),
                'kegiatan' => $this->db->table('kegiatan')->get()->getResultArray(),
            ];
            $cache->save($cacheKey, $data, $cacheMinutes * 60);
        }
        
        return $data;
    }
}
