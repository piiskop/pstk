/**
 * 	igakordsel veebilehe laadimisel on taustavärv juhuslik
 * 
 * 	@author erika
 */

function ran_col() { 				//funktsioon juhuslik_värv
    var color = '#'; 				// 16-ndsüsteemis värvi esitähis
    var letters = '0123456789ABCDEF'.split(''); //kõik 16-ndsüsteemi numbrid ja tähed lahutatakse üksikus ühikuks

    //i võrdub algselt 0, i-d suurendatakse ühe võrra kuni 5-ni, igakordsel tsükli läbimisel lisatakse muutujale color, 
    //mis sisaldab # tähist, üks juhuslikult valitud number või täht kuniks moodustubki värvi nr nt #3487BA
    for (var i = 0; i < 6; i++) {
        color += letters[Math.round(Math.random() * 15)]; //15 = 0123456789A(10)B(11)C(12)D(13)E(14)F(15) ehk arv 0-st 15-ni
    }													  //Math.random() = juhuslik arv 0-st 15-ni
    													  //Math.round = ümardab juhusliku arvu lähima täisarvuni
    													  //color += juhuslik arv lisatakse color muutujale, kus on juba ees # märk
    document.body.style.background = color; // paneb juhusliku värvi body elemendi külge
};