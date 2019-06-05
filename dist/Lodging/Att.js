function genatt(picpath,attname,htext,price,id,){
            var div=document.createElement('div');
            div.className="attopt";
            div.id=id;
            var image= document.createElement('img');
            var h1=document.createElement('h1');
            h1.textContent=attname;
            h1.className="attTitle";
            var path=`inc/att/${picpath}`;
            image.src=path;
            image.alt="";
            image.height="300";
            image.width="400";
            image.className="attimage";
            var titlebox=document.createElement('div');
            titlebox.className="atttitlebox";
            titlebox.appendChild(image);
            titlebox.appendChild(h1);
            div.appendChild(titlebox);
            var df=document.createDocumentFragment();
            for (var line in htext){
                var p=document.createElement('p');
                p.textContent=htext[line];
                p.className="attHtext";
                df.append(p);
            }
            
            var overlay=document.createElement('div');
            overlay.className="attoptOverlay";
            
            
            var h1o=document.createElement('h1');
            h1o.textContent=attname;
            h1o.className="attOtitle";
            var bracket=document.createElement('img');
            bracket.src="inc/icons/bracket.png";
            bracket.alt="";
            bracket.className="bracket";
            bracket.width="330";
            bracket.height="45";
            var block=document.createElement('block');
            block.className="attpopup";
            activeoptiondiv.appendChild(div);
            overlay.appendChild(block);
            overlay.appendChild(h1o);
            overlay.appendChild(bracket);
            overlay.appendChild(df);
            document.createElement('div');
            div.appendChild(overlay);
        }

var row = "0"; 


activeoptiondiv=document.getElementById('activeoptiondiv');
    genatt("CEextra4.jpeg","MACHU PICCHU",["One of the seven wonders of the world and Peru's treasure, a sacred city constructed by the infamous Inca Pachacutec."],46,"dispatt14");
    genatt("CEextra.jpeg","MACHU PICCHU + HUAYNAPICCHU",["One of the seven wonders of the world and Peru's treasure, a sacred city constructed by the infamous Inca Pachacutec.","Machu Picchu's sacred mountain with any archeological remains and exceptional views"],61,"dispatt15");
    genatt("market.jpg","MAIN BUNDLE",["Includes Pisaq, Tipon, Chincheros, Museums, Saqsaywaman, Moray, and Ollantaytambo"],46,"dispattmain");
    genatt("cebundle.png","CALDERON ESCAPE BUNDLE",["Includes Salineras, Corichancha, Seven Color Mountain, Laguna de Humantay, Iglesia Andahuaylillas, and Piquillacta"],25,"dispattce");
    genatt("saqsaywaman.jpg","SAQSAYWAMAN",["Large archeological park consisting of:", "Quenco: meaning Labyrinth is an astronomical site where the Incas used natural rocks for their architecture.", "Pucapucara: Forts where Inca soldiers would normally train and where you catch a glimpse of different valleys." ,"Tambomachay: A resting place where people would obtain their drinking water from natural water fountains."],15,"dispatt5");
    genatt("Pisac.jpg","PISAQ",["an archeological park with amazing landscapes that Is known for the unique Ccsana cemetery and the popular Pisaq market here tourists can purchase Peruvian arts and crafts."],10,"dispatt1");

    genatt("Moray.jpeg","MORAY",["An experimental site where Incas discovered a natural hole that had a natural drainage to help cultivation and was significant in their agriculture."],10,"dispatt6");

    genatt("Tipon.jpg","TIPON",["A ceremonial and archeological site that won a prize for its unique hydraulic canal systems made by the Incas. Beginner hikes include views of natural water fountains and beautiful terraces. The intermediate hike includes views of more breath-taking landscapes and canal system where the water comes from Pachatusan (base of the earth) mountain."],15,"dispatt2");

    genatt("ollantaytambo2.jpeg","OLLANTAYTAMBO",["Archeological site with markets containing artisanal crats and souvenirs and where tourist board he Peru Rail trains to head to Machu Picchu."],10,"dispatt7");

    genatt("Chincheros.jpg","CHINCHEROS",["Archeological site where there are joint Peruvian terraces and where town people showcase how they make traditional crafts, blankets, and arts."],10,"dispatt3");
    genatt("mainbundle.png","MUSEUMS",[""],10,"dispatt4");
    genatt("salineras.jpeg","SALINERAS",["Organic salt mines that have existed for millions of years and where used by the Incas."],10,"dispatt8");
    genatt("Coricancha.jpg","CORICHANCHA",[""],8,"dispatt9");
    genatt("seven.jpg","SEVEN COLOR MOUNTAIN",["Beautiful seven colored mountain recently discovered by a foreigner while exploring"],10,"dispatt10");
    genatt("laguna.jpeg","LAGUNA DE HUMANTAY",["A clear blue lake formed by the flowing water of the sacred snow mountain called Ausangate."],10,"dispatt11");
    genatt("Andahuaylillas.jpg","IGLESIA ANDAHUAYLILLAS",["A Spanish colonial style church that is home to beautiful catholic paintings."],5,"dispatt12");
    genatt("piq.jpg","PIQUILLACTA",["An Archeological site made before the Incas by the Wari culture"],5,"dispatt13");

