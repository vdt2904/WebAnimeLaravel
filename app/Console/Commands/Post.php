<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
class Post extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $a = DB::select('SELECT DISTINCT MaND FROM tb_thanhtoan ORDER BY NgayHetHan DESC');

    foreach ($a as $item) {
        $b = DB::select('SELECT MAX(NgayHetHan) as nhh FROM tb_thanhtoan WHERE MaND = ?', [$item->MaND]);

        if (!empty($b)) {
            $firstResult = reset($b); // Lấy phần tử đầu tiên của mảng
            $nhh = $firstResult->nhh;

        DB::select('UPDATE tb_nguoidung SET LoaiND = 0 WHERE MaND = (SELECT MaND FROM tb_thanhtoan WHERE NgayHetHan = ? AND NgayHetHan < ?)', [$nhh, now()]);
     }
    }

        
    }
}
