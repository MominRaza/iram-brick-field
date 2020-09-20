$awwal1 = document.getElementById('awwal1');
$doyam1 = document.getElementById('doyam1');
$peela1 = document.getElementById('peela1');
$kharapeela1 = document.getElementById('kharapeela1');
$chatka1 = document.getElementById('chatka1');
$addha1 = document.getElementById('addha1');

$gadiwan1 = document.getElementById('gadiwan1');

$awwal = document.getElementById('awwal');
$doyam = document.getElementById('doyam');
$peela = document.getElementById('peela');
$kharapeela = document.getElementById('kharapeela');
$chatka = document.getElementById('chatka');
$addha = document.getElementById('addha');

$gadiwan = document.getElementById('gadiwan');

$awwalrate = document.getElementById('awwalrate');
$doyamrate = document.getElementById('doyamrate');
$peelarate = document.getElementById('peelarate');
$kharapeelarate = document.getElementById('kharapeelarate');
$chatkarate = document.getElementById('chatkarate');
$addharate = document.getElementById('addharate');

$gadiwanrate = document.getElementById('gadiwanrate');

function checkboxclick(i){
    switch(i) {
        case 1: 
            $awwal1.classList.toggle("hide");
            $awwal.disabled = $awwal.disabled == true ? false : true;
            $awwalrate.disabled = $awwalrate.disabled == true ? false : true;
            break;
        case 2: 
            $doyam1.classList.toggle("hide");
            $doyam.disabled = $doyam.disabled == true ? false : true;
            $doyamrate.disabled = $doyamrate.disabled == true ? false : true;
            break;
        case 3: 
            $peela1.classList.toggle("hide"); 
            $peela.disabled = $peela.disabled == true ? false : true;
            $peelarate.disabled = $peelarate.disabled == true ? false : true;
            break;
        case 4: 
            $kharapeela1.classList.toggle("hide");
            $kharapeela.disabled = $kharapeela.disabled == true ? false : true;
            $kharapeelarate.disabled = $kharapeelarate.disabled == true ? false : true; 
            break;
        case 5: 
            $chatka1.classList.toggle("hide"); 
            $chatka.disabled = $chatka.disabled == true ? false : true;
            $chatkarate.disabled = $chatkarate.disabled == true ? false : true;
            break;
        case 6: 
            $addha1.classList.toggle("hide"); 
            $addha.disabled = $addha.disabled == true ? false : true;
            $addharate.disabled = $addharate.disabled == true ? false : true;
            break;
        case 7: 
            $gadiwan1.classList.toggle("hide"); 
            $gadiwan.disabled = $gadiwan.disabled == true ? false : true;
            $gadiwanrate.disabled = $gadiwanrate.disabled == true ? false : true;
            break;
    }
}