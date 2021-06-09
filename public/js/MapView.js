

let data = []
let arr = []
let url_imagen = "https://sivem.blindin.mx/assets/images/medios/"
// let medio = ""
let imagenNoDisponible = url_imagen + 'imagen_nodisponible.png'
// const inputMedio = document.getElementById('medio')


// inputMedio.addEventListener('change', function(e){
//     console.log(e.target.value)
//     getData(e.target.value)
// })

function getData(medio = ""){
    if(medio == ""){
    $.get('/getData', function(response){
        console.log(response)
        data = response
        for(let i=0; i<data.length;i++){
            arr[i] = new ol.Feature(new ol.geom.Point([data[i].longitud, data[i].latitud]))
            arr[i].setId(data[i].id)
    
        }
        makeData()

    })
    }else{
        $.ajax({
            url:'/getinfo',
            data:{medio},
        })
        .done(function(response){
            console.log(response)
        })
        .fail(function(err){
            console.log(err)
        })
        makeData()
    }
}

getData()


function makeData(){

    var map = new ol.Map({
        target: 'map',
        // layers: arr,
        layers: [
            new ol.layer.Tile({
                source: new ol.source.OSM()
              }),
              new ol.layer.Vector({
                source: new ol.source.Vector({
                  features: arr,
                }),
                style: new ol.style.Style({
                  image: new ol.style.Circle({
                    radius: 6,
                    fill: new ol.style.Fill({color: 'red'}),
                  }),
                }),
               })
         ],
        view: new ol.View({
          center: ol.proj.fromLonLat([-96.7205, 17.0581]),
          zoom: 11
        }),
    });

    map.on('click', function(e){
        var feature = map.getFeaturesAtPixel(e.pixel)[0];
        $("#modal").modal("show")
        let datainfo = data.filter(info => info.id == feature.id_)
        console.log(datainfo)
        postDataModal(datainfo)
    })
    ol.proj.useGeographic();
}

function postDataModal(inf){
    inf.map(element => {
        document.getElementById('modalTitle').innerHTML = element.municipio
        // la url de las imagenes estan enlazadas a la direccion de sivem, si se cambian, debera cambiar esta url
        document.getElementById('img1').setAttribute('src', element.vista_larga ? `${url_imagen}${element.vista_larga}` : "" ) 
        document.getElementById('img2').setAttribute('src', element.vista_media ? `${url_imagen}${element.vista_media}` : "" ) 
        document.getElementById('img3').setAttribute('src', element.vista_corta ? `${url_imagen}${element.vista_corta}` : "" ) 
        document.getElementById("modalContent").innerHTML = `
            <p><span class="titleText">CALLE:</span> ${element.calle}</p>
            <p><span class="titleText">COLONIA:</span> ${element.colonia}</p>
            <p><span class="titleText">LOCALIDAD:</span> ${element.localidad}</p>
            <p><span class="titleText">REFERENCIA:</span> ${element.referencias}</p>
        `
    })
}

$('.owl-carousel').owlCarousel({
    stagePadding: 10,
    loop:true,
    margin:0,
    // nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})


   

