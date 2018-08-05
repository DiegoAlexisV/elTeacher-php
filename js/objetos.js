function alimento(tipo,nombre,icono,proteinas,carbohi,fibra,calorias){
	this.tipo=tipo;
	this.nombre=nombre;
	this.icono=icono;
	this.proteinas=proteinas;
	this.carbohi=carbohi;
	this.fibra=fibra;
	this.calorias=calorias;
}


var a1= new alimento('fruta','banana','banana',0,0,0,0);
var a2 = new alimento('fruta','papaya','papaya',0,0,0,0);
var a3 = new alimento('fruta','naranja','naranja',0,0,0,0);

var alimentos = [a1,a2,a3];

var galeria = document.getElementById('galeria');

for ( var i=0; i<=2;i++){
	var imagen = alimentos[i].icono;

	galeria.innerHTML += `

			<div class="card col-xs-6 col-md-4">
				<a href="#" data-toggle="modal" data-target="#id${imagen}" class="thumbnail">
					<img class="card-img-top img-responsive" src="images/${imagen}.jpg">
				</a>
			</div>
			<div class="modal fade " id="id${imagen}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  					<div class="modal-dialog modal-lg modal-dialog-centered col-xs-12 col-md-6" role="document" id="mod">
  						<img src="images/${imagen}.jpg" alt=""  class="col-xs-12 col-md-6" id="imagen">
  						<div class="col-xs-12 col-md-6" id="cap">
  						<h3 class="col-xs-6">proteinas <br> carbohidratos<br> fibra<br> calorias</h3>
  						<h3 class="col-xs-6">.....${alimentos[i].proteinas} <br>.....${alimentos[i].carbohi}<br>.....${alimentos[i].fibra}<br>.....${alimentos[i].calorias}</h3>
  						</div>
  					</div>
  					
			</div>
	`;
} 