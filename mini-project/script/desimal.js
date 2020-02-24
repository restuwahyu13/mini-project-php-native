function desimal(ongkos) {
    var titik = '.';
    var nilai = new String(ongkos);
    var pecah = [];
    while (nilai.length > 3) {
        var asd = nilai.substr(nilai.length - 3);
        pecah.unshift(asd);
        nilai = nilai.substr(0, nilai.length - 3);
    }

    if (nilai.length > 0) {
        pecah.unshift(nilai);
    }
    nilai = pecah.join(titik);
    return nilai;
}



$(() => {


 $("#kot").on('change', (e) => {

    const x = document.getElementById('kot').selectedIndex;
    const z = document.getElementById('kot').options;
    console.log(z[x].text);

    $("#kota").val(z[x].text);

    const a = document.getElementById('kot').value;
    console.log(a)

 });

});