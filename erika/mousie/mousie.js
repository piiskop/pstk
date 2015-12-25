/**
 * 
 */

    function show_hide(id) {   //funktsioon, mis võtab parameetriks id

       var divelement = document.getElementById(id);   //dokumendist otsitakse id ja salvestatakse divelemendi muutujasse

       if(divelement.style.display == 'none')		//võrdleb, kas divelement on nähtav, kui EI
          divelement.style.display = 'block';		//näita
       else											//kui JA
          divelement.style.display = 'none';		//peida
    }