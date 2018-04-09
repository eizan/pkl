<?php
    $start_date = strtotime('2013-05-15 00:00:00');
    $end_date = strtotime(2013-05-20 00:00:00);
    $todays_date = strtotime(date("Y-m-d H:m:s"));
    if ($todays_date >= $start_date && $todays_date <= $end_date)
    {
        //Pendaftaran dibuka
        //Anda bisa masukkan proses yang dilakukan jika pendaftaran dibuka
    }
    else
    {
        if($todays_date < $start_date)
        {
            //Pendaftaran Belum dibuka
            //Anda bisa masukkan pesan atau proses jika belum dibuka
        }
        else
        {
            //Pendaftaran sudah ditutup
            //Anda bisa masukkan pesan atau proses jika sudah ditutup
        }
    }
?>