 

    var tanggal=document.getElementById('tanggal').value;
    
    var bulan=tanggal.split("-");

    switch(bulan[1]){
        case "Januari":
         var tanggal="00";
        break;
        case "Februari":
         var tanggal="01";
        break;
        case "Maret":
         var tanggal="02";
        break;
        case "April":
         var tanggal="03";
        break;
        case "Mei":
         var tanggal="04";
        break;
        case "Juni":
         var tanggal="05";
        break;
        case "Juli":
         var tanggal="06";
        break;
        case "Agustus":
         var tanggal="07";
        break;
        case "September":
         var tanggal="08";
        break;
        case "Oktober":
         var tanggal="09";
        break;
        case "November":
         var tanggal="10";
        break;
        case "Desember":
         var tanggal="11";
        break;
    }
    var database=document.getElementById('database').value=bulan[0]+"-"+tanggal+"-"+bulan[2];

    function cek(){
    if (bulan[0]!=hari || bulan[1]!=bulan || bulan[2]!=tahun) {
        var kosong=hari-bulan[0];
        for (var i=1; i < kosong; i++) { 
            document.getElementById("alfa").value=i;
        }
    }
}

    var date=new Date();
    var hari=date.getDate();
    var month=date.getMonth();
    var tahun=date.getFullYear();
    if (hari<10) {
        hari="0"+hari;
    }
    if (month<10) {
        month="0"+month;
    }

    var sekarang=document.getElementById('tanggal_sekarang').value=hari+"-"+month+"-"+date.getFullYear();

    if (database==sekarang) {
        document.getElementById("tambah").style.display="none";
    }
    if (database!=sekarang) {
        document.getElementById("keluar").style.display="none";
        cek();
    }

  

