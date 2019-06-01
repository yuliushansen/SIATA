<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\History_Barang;
use Illuminate\Database\Eloquent\ModelNotFoundExceptionuse;
use Illuminate\Http\Response;
use App\Http\Resources\Transaksi as TransaksiResource;
use Illuminate\Support\Facades\DB;



class TransaksiController extends Controller
{
    //
    public function index(Request $request)
    {
        // return Transaksi::all();
        $search = $request->search;
        $transaksi = Transaksi::where('id_transaksi','LIKE',"%$search%")->paginate(5);
        // return response()->json($akun, 200);
        return TransaksiResource::collection($transaksi);
    }
    public function laporanpendapatanpertahun($tahun)
    {
        // $users = DB::select("SELECT MONTHNAME(STR_TO_DATE((m.bulan), '%m'))AS bulan, SUM(s.sub_totals)AS service,SUM(pe.sub_totals)AS penjualan, SUM(p.total_harga) AS total FROM (SELECT '01' AS
        // bulan
        // UNION SELECT '02' AS
        // bulan
        // UNION SELECT '03' AS
        // bulan
        // UNION SELECT '04' AS
        // bulan
        // UNION SELECT '05' AS
        // bulan
        // UNION SELECT '06' AS
        // bulan
        // UNION SELECT '07'AS
        // bulan
        // UNION SELECT '08'AS
        // bulan
        // UNION SELECT '09' AS
        // bulan
        // UNION SELECT '10' AS
        // bulan
        // UNION SELECT '11' AS
        // bulan
        // UNION SELECT '12' AS
        // bulan
        // ) AS m LEFT JOIN (SELECT * FROM transaksi WHERE YEAR(tanggal)=$tahun )as p ON MONTHNAME(p.tanggal) = MONTHNAME(STR_TO_DATE((m.bulan), '%m'))
        // LEFT JOIN (select *,sum(sub_total) as sub_totals from transaksi_service group by id_transaksi) as s ON p.id_transaksi = s.id_transaksi 
        // LEFT JOIN (select *,sum(sub_total) as sub_totals from transaksi_penjualan group by id_transaksi)as pe ON p.id_transaksi = pe.id_transaksi
      
        // GROUP BY YEAR(p.tanggal),m.bulan
        // ORDER by m.bulan");
        $users = DB::select("SELECT if(MONTHNAME(STR_TO_DATE((A.bulan), '%m'))is null, 0,MONTHNAME(STR_TO_DATE((A.bulan), '%m'))) as bulan,
        if(jasa_service is null, 0,jasa_service)  as service,if(spareparts is null, 0,spareparts) as penjualan,if(total is null,0, total) as total
        FROM (SELECT 1 AS bulan
              UNION SELECT 2 AS bulan
              UNION SELECT 3 AS bulan
              UNION SELECT 4 AS bulan
              UNION SELECT 5 AS bulan
              UNION SELECT 6 AS bulan
              UNION SELECT 7 AS bulan
              UNION SELECT 8 AS bulan
              UNION SELECT 9 AS bulan
              UNION SELECT 10 AS bulan
              UNION SELECT 11 AS bulan
              UNION SELECT 12 AS bulan
             ) AS A
        LEFT JOIN (SELECT bulan, MIN(jasa_service) AS jasa_service, MIN(spareparts) AS spareparts, if(MIN(jasa_service) is null,0,(MIN(jasa_service)))+if(MIN(spareparts)is null,0,MIN(spareparts)) AS total
                   FROM (SELECT MONTH(p.tanggal) AS bulan, SUM(dp.sub_total) AS jasa_service, null AS spareparts
                         FROM transaksi p
                         JOIN transaksi_service dp ON (dp.id_transaksi = p.id_transaksi)
                         WHERE YEAR(p.tanggal) = $tahun
                         AND p.status_transaksi = 'Lunas'
                         GROUP BY bulan
                         UNION
                         SELECT MONTH(p.tanggal) AS bulan, null AS jasa_service, SUM(dpjs.sub_total) AS spareparts
                         FROM transaksi p
                         JOIN transaksi_penjualan dpjs ON (dpjs.id_transaksi = p.id_transaksi)
                         WHERE YEAR(p.tanggal) = $tahun 
                         AND p.status_transaksi = 'Lunas'
                         GROUP BY bulan
                        ) AS T
                   GROUP BY bulan
                  ) AS B ON B.bulan = A.bulan
        ORDER BY A.bulan");
        return ($users);
    }
    public function laporanpengeluaran($tahun)
    {
        $users = DB::select("SELECT if(MONTHNAME(STR_TO_DATE((m.bulan), '%m'))is null, 0,MONTHNAME(STR_TO_DATE((m.bulan), '%m')))AS bulan, if(SUM(p.total_harga)is null,0,SUM(p.total_harga)) AS total FROM (SELECT '01' AS
        bulan
        UNION SELECT '02' AS
        bulan
        UNION SELECT '03' AS
        bulan
        UNION SELECT '04' AS
        bulan
        UNION SELECT '05' AS
        bulan
        UNION SELECT '06' AS
        bulan
        UNION SELECT '07'AS
        bulan
        UNION SELECT '08'AS
        bulan
        UNION SELECT '09' AS
        bulan
        UNION SELECT '10' AS
        bulan
        UNION SELECT '11' AS
        bulan
        UNION SELECT '12' AS
        bulan
        ) AS m LEFT JOIN (SELECT * FROM transaksi_pengadaan WHERE YEAR(tanggal)=$tahun and status_pengadaan = 'Selesai')as p ON MONTHNAME(p.tanggal) = MONTHNAME(STR_TO_DATE((m.bulan), '%m'))
      
        GROUP BY YEAR(p.tanggal),m.bulan
        ORDER by m.bulan");
        return ($users);
    }
    public function laporanstok($tahun,$tipe)
    {
//         $users = DB::select("SELECT MONTHNAME(STR_TO_DATE((m.bulan), '%m')) as bulan , IF(b.jumlah is null, 0, b.jumlah)as jumlah from (SELECT '01' AS
//         bulan
//         UNION SELECT '02' AS
//         bulan
//         UNION SELECT '03' AS
//         bulan
//         UNION SELECT '04' AS
//         bulan
//         UNION SELECT '05' AS
//         bulan
//         UNION SELECT '06' AS
//         bulan
//         UNION SELECT '07'AS
//         bulan
//         UNION SELECT '08'AS
//         bulan
//         UNION SELECT '09' AS
//         bulan
//         UNION SELECT '10' AS
//         bulan
//         UNION SELECT '11' AS
//         bulan
//         UNION SELECT '12' AS
//         bulan
//         ) AS m left join(SELECT (a.bulan), MAX(balance)as jumlah from (SELECT MONTH(hb.tanggal) as bulan,(@b := @b + (hb.jumlah_masuk) - (hb.jumlah_keluar))  AS balance
// FROM
//     (SELECT @b := 0.0) AS dummy CROSS JOIN
//            history_barang hb
//            JOIN sparepart s ON (hb.id_sparepart = s.id_sparepart)
//            WHERE YEAR(hb.tanggal) = $tahun AND s.tipe_sparepart = '$tipe')as a
//            GROUP BY a.bulan) as b on m.bulan = b.bulan");
$users = DB::select("SELECT MONTHNAME(STR_TO_DATE((m.bulan), '%m')) as bulan , IF(b.jumlah is null, 0, b.jumlah)as jumlah from (SELECT '01' AS
        bulan
        UNION SELECT '02' AS
        bulan
        UNION SELECT '03' AS
        bulan
        UNION SELECT '04' AS
        bulan
        UNION SELECT '05' AS
        bulan
        UNION SELECT '06' AS
        bulan
        UNION SELECT '07'AS
        bulan
        UNION SELECT '08'AS
        bulan
        UNION SELECT '09' AS
        bulan
        UNION SELECT '10' AS
        bulan
        UNION SELECT '11' AS
        bulan
        UNION SELECT '12' AS
        bulan
        ) AS m left join(SELECT MONTH(hb.tanggal) AS bulan, (SUM(hb.jumlah_masuk)-SUM(hb.jumlah_keluar)) AS jumlah
           FROM history_barang hb
           JOIN sparepart s ON (hb.id_sparepart = s.id_sparepart)
           WHERE YEAR(hb.tanggal) = $tahun AND s.tipe_sparepart = '$tipe'
           GROUP BY bulan) as b on m.bulan = b.bulan");
        return ($users);
    }
    public function laporanpendapatanpertahunbycabang()
    {
        $users = DB::select("SELECT YEAR(t.tanggal) as tahun, c.nama_cabang as nama_cabang, sum(t.total_harga) AS total_harga FROM transaksi t
        JOIN cabang c ON t.id_cabang = c.id_cabang
        where status_transaksi = 'Lunas'
        GROUP BY YEAR(t.tanggal), (c.nama_cabang)");
        return ($users);
    }
    public function laporanjasa($tahun,$bulan)
    {
        $users = DB::select("SELECT motor.merk_motor, motor.tipe_motor, jasa_service.nama_jasa, sum(transaksi_service.jumlah_jasa)as jumlah_jasa
        FROM transaksi_service
        LEFT JOIN detail_motor ON transaksi_service.id_detail = detail_motor.id_detail
        LEFT JOIN motor on detail_motor.id_motor = motor.id_motor
        LEFT JOIN jasa_service ON transaksi_service.id_jasa = jasa_service.id_jasa
        LEFT JOIN transaksi ON transaksi_service.id_transaksi = transaksi.id_transaksi
        WHERE YEAR(transaksi.tanggal) = $tahun
        AND Monthname(transaksi.tanggal) = '$bulan'
        AND transaksi.status_transaksi = 'Lunas'
        GROUP BY transaksi_service.id_jasa, motor.id_motor
        ORDER BY motor.id_motor");
        return ($users);
    }
    public function laporansparepartterlaris($tahun)
    {
        $users = DB::select("SELECT MONTHNAME(STR_TO_DATE((m.bulan), '%m')) as Bulan, 
        Coalesce((select s.nama_sparepart from transaksi_penjualan t inner join sparepart s on t.id_sparepart = s.id_sparepart inner join transaksi ts on t.id_transaksi= ts.id_transaksi where YEAR(ts.tanggal)=$tahun AND ts.status_transaksi = 'Lunas' AND MONTHNAME(ts.tanggal) = MONTHNAME(STR_TO_DATE((m.bulan), '%m')) group by t.id_sparepart order by sum(t.jumlah_sparepart) DESC LIMIT 1), '-') AS NamaBarang,
        Coalesce((select s.tipe_sparepart from transaksi_penjualan t inner join sparepart s on t.id_sparepart = s.id_sparepart inner join transaksi ts on t.id_transaksi= ts.id_transaksi where YEAR(ts.tanggal)=$tahun AND ts.status_transaksi = 'Lunas' AND MONTHNAME(ts.tanggal) = MONTHNAME(STR_TO_DATE((m.bulan), '%m')) group by t.id_sparepart order by sum(t.jumlah_sparepart) DESC LIMIT 1), '-') AS TipeBarang,
        CAST(Coalesce((select sum(t.jumlah_sparepart) from transaksi_penjualan t inner join transaksi ts on t.id_transaksi= ts.id_transaksi where YEAR(ts.tanggal)=$tahun AND ts.status_transaksi = 'Lunas' AND MONTHNAME(ts.tanggal) = MONTHNAME(STR_TO_DATE((m.bulan), '%m')) group by id_sparepart order by sum(t.jumlah_sparepart) DESC LIMIT 1), 0)as UNSIGNED) AS JumlahPenjualan
        FROM(
               SELECT '01' AS
               bulan
               UNION SELECT '02' AS
               bulan
               UNION SELECT '03' AS
               bulan
               UNION SELECT '04' AS
               bulan
               UNION SELECT '05' AS
               bulan
               UNION SELECT '06' AS
               bulan
               UNION SELECT '07'AS
               bulan
               UNION SELECT '08'AS
               bulan
               UNION SELECT '09' AS
               bulan
               UNION SELECT '10' AS
               bulan
               UNION SELECT '11' AS
               bulan
               UNION SELECT '12' AS
               bulan
        ) AS m");
        return ($users);
    }

    public function tampilservice(Request $request)
    {
        // return Transaksi::all();
        $search = $request->search;
        $transaksi = Transaksi::whereHas('transaksi_service', function ($query) use ($search) {
            Transaksi::where(['id_transaksi','LIKE',"%$search%"]);
        })->orderBy('tanggal', 'DESC')->paginate(5);
        // return response()->json($akun, 200);
        return TransaksiResource::collection($transaksi);
    }

    public function servicebymotor($nomor_polisi,$nomor_pelanggan)
    {
       
           // return Transaksi::all();
        $transaksi = Transaksi::whereHas('transaksi_service', function ($query) use ($nomor_polisi,$nomor_pelanggan) {
            $query->whereHas('detail_motor', function ($query) use ($nomor_polisi,$nomor_pelanggan) {
                $query->whereHas('motor', function ($query) use ($nomor_polisi,$nomor_pelanggan) {
                    $query->whereHas('pelanggan', function ($query) use ($nomor_polisi,$nomor_pelanggan) {
                        $query->where([['nomor_polisi', '=',$nomor_polisi],['status_transaksi', '=', 'Lunas'],['nomor_pelanggan', '=', $nomor_pelanggan]]);
                    });
                });
            });
        })->orderBy('tanggal', 'DESC')->get();
        // return response()->json($akun, 200);
        return TransaksiResource::collection($transaksi);
        
        
    }
    public function penjualanbynomor($nomor_polisi,$nomor_pelanggan)
    {
        
          // return Transaksi::all();
        $transaksi = Transaksi::whereHas('transaksi_penjualan', function ($query) use ($nomor_polisi,$nomor_pelanggan) {
            $query->whereHas('detail_motor', function ($query) use ($nomor_polisi,$nomor_pelanggan) {
                $query->whereHas('motor', function ($query) use ($nomor_polisi,$nomor_pelanggan) {
                    $query->whereHas('pelanggan', function ($query) use ($nomor_polisi,$nomor_pelanggan) {
                        $query->where([['nomor_polisi', '=', $nomor_polisi],['status_transaksi', '=', 'Lunas'],['nomor_pelanggan', '=', $nomor_pelanggan]]);
                    });
                });
            });
        })->orderBy('tanggal', 'DESC')->get();
        // return response()->json($akun, 200);

       
    }

    public function getLast(){
        $transaksi = Transaksi::latest()->first();
        return response()->json($transaksi,200);
    }

    public function showLengkap($id)
    {
        try{
            $transaksi = Transaksi::findorFail($id);
            return new TransaksiResource($transaksi);
        }
        catch(ModelNotFoundException $e){
            return $this->sendNotFoundResponse('transaksi_tidak_ada');

        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
     }
 
    public function show($id)
    {
        try{
            $transaksi = Transaksi::findorFail($id);
            return response()->json($transaksi,200);
        }
        catch(ModelNotFoundException $e){
            return $this->sendNotFoundResponse('transaksi_tidak_ada');

        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
     }

    public function store(Request $request)
    {
        try{
            $data = $request->all();
            $transaksi = Transaksi::create([
                'id_cabang'=>$data['id_cabang'],
                'id_kasir'=>$data['id_kasir'],
                'id_cs'=>$data['id_cs'],
                'id_pelanggan'=>$data['id_pelanggan'],
                'jenis_transaksi'=>$data['jenis_transaksi'],
                'tanggal'=>$data['tanggal'],
                'status_transaksi'=>$data['status_transaksi'],
                'total_harga'=>$data['total_harga']
            ]);
            return response()->json($transaksi,201);
        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
    }
    public function storeHistory(Request $request)
    {
        try{
            $data = $request->all();
            $transaksi = History_Barang::create([
                'id_sparepart'=>$data['id_sparepart'],
                'tanggal'=>$data['tanggal'],
                'jumlah_masuk'=>$data['jumlah_masuk'],
                'jumlah_keluar'=>$data['jumlah_keluar'],
            ]);
            return response()->json($transaksi,201);
        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try{
            $transaksi = Transaksi::findOrFail($id);
            $transaksi->update([
                'id_cabang'=>$data['id_cabang'],
                'id_kasir'=>$data['id_kasir'],
                'id_cs'=>$data['id_cs'],
                'id_pelanggan'=>$data['id_pelanggan'],
                'jenis_transaksi'=>$data['jenis_transaksi'],
                'tanggal'=>$data['tanggal'],
                'status_transaksi'=>$data['status_transaksi'],
                'total_harga'=>$data['total_harga']
           ]);
           $transaksi->save();
            return response()->json($transaksi,201);
        }
        catch(ModelNotFoundException $e){
            return $this->sendNotFoundResponse('transaksi_tidak_ada');

        }
        catch(Exception $e){
            return $this->sendIseResponse($e->getMessage());
        }
        
    }

    public function delete($id)
    {
        $id_del=$id;
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        return response('transaksi berhasil di hapus');
    }
}
