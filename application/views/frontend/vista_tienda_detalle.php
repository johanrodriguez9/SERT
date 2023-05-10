<section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <?php foreach ($listar_producto_detalle as $value): ?>
                            <img class="card-img img-fluid" src="<?= base_url();?>assets/img_producto/<?php echo $value->producto_imagen; ?>" alt="Card image cap" id="product-detail">
                        <?php endforeach ?> 
                        
                    </div>
                    <div class="row">
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-dark fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </div>
                        <!--End Controls-->
                        <!--Start Carousel Wrapper-->
                        <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                            <!--Start Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">

                                <!--First slide-->
                                <div class="carousel-item active">
                                    <div class="row">
                                        <?php $count=1; foreach ($listar_galeria as $value): ?>
                                            <div class="col-4">
                                                <a href="#">
                                                    <img class="card-img img-fluid" src="<?php echo base_url();?>assets/img_producto/<?php echo $value->galeria_imagen; ?>" alt="Product Image 1">
                                                </a>
                                            </div>
                                        <?php endforeach ?> 
                                        
                                    </div>
                                </div>
                                <!--/.First slide-->

                                <!--Second slide-->
                                <div class="carousel-item">
                                    <div class="row">
                                        <?php $count=1; foreach ($listar_galeria as $value): ?>
                                            <div class="col-4">
                                                <a href="#">
                                                    <img class="card-img img-fluid" src="<?php echo base_url();?>assets/img_producto/<?php echo $value->galeria_imagen; ?>" alt="Product Image 1">
                                                </a>
                                            </div>
                                        <?php endforeach ?> 
                                    </div>
                                </div>
                                <!--/.Second slide-->
                            </div>
                            <!--End Slides-->
                        </div>
                        <!--End Carousel Wrapper-->
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            
                            <?php foreach ($listar_producto_detalle as $value): ?>
                                <h1 class="h2"><?php echo $value->producto_titulo; ?></h1>
                            <?php endforeach ?> 
                            
                            <p class="h3 py-2">Bs. <?php echo $value->producto_costo; ?></p>
                            <!-- <p class="py-2">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <span class="list-inline-item text-dark">Rating 4/5 | 40 comentarios</span>
                            </p> -->
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Manejo:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>facil de usar</strong></p>
                                </li>
                            </ul>

                            <h6>Descripcion:</h6>
                            <?php foreach ($listar_producto_detalle as $value): ?>
                                <p><?php echo $value->producto_descripcion; ?></p>
                            <?php endforeach ?> 
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Colores disponibles :</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>AMARILLO /ROJO / VERDE /AZUL/ NARANJA /CAFE /NEGRO / CELESTE/ROSADO</strong></p>
                                </li>
                            </ul>

                            <h6>Especificaciones:</h6>
                            <ul class="list-unstyled pb-3">
                                <li>tela del producto de alta calidad</li>
                                <li>material duradero</li>
                                <li>disponibilidad de colores</li>
                                <li>para toda la familia</li>
                                <li>Tallas S/M/L/XL/XXL/XXXL NIÑOS DESDE LOS 2 AÑOS</li>
                            </ul>

                            <form action="" method="GET">
                                <input type="hidden" name="product-title" value="Activewear">
                                <div class="row">
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item">color :
                                                <input type="hidden" name="product-size" id="product-size" value="S">
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-outline-white btn-size">B</span></li>
                                            <li class="list-inline-item"><span class="btn btn-outline-dark btn-size" style="border-color: #0101010;">N</span></li>
                                            <li class="list-inline-item"><span class="btn btn-outline-gray btn-size" style="border-color: rgb(128, 127, 127);">P</span></li>
                                            <li class="list-inline-item"><span class="btn btn-outline-dark btn-size" style="border-color: #000;">R</span></li>
                                        </ul>
                                    </div>
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item text-right">
                                                Cantidad
                                                <input type="hidden" name="product-quanity" id="product-quanity" value="1">
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li>
                                            <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col d-grid">
                                        <button type="submit" class="btn btn-success btn-lg"  name="submit" value="buy">Comprar</button>
                                    </div>
                                    <div class="col d-grid">
                                        <a class="btn btn-success btn-lg"  href="<?php echo base_url(Hasher::make(100,$value->producto_id))?>">Agregar a carrito</a>
                                        <!-- <a class="btn btn-success btn-lg" id="app-agregar" data-id='<?php echo $value->producto_id;?>'>Agregar a carrito</a> -->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <a href="#" class="app-btn-flotante" id="btnCarrito">Carrito <span class="badge bg-success" id="carrito">0</span></a>


<!-- <script src="<?php echo base_url();?>assets/admin/assets/plugins/jquery/jquery.min.js"></script> -->

<script type="text/javascript">
    
    let productos = [];
        let items = {
            id: 0
    }
    
    mostrar();


    $('#app-agregar').click(function(e){    
        e.preventDefault();
        const id = $(this).data('id');
        console.log(id);
        items = {
            id: id
        }
        productos.push(items);
        localStorage.setItem('productos', JSON.stringify(productos));
        mostrar();
    });

    $('#btnCarrito').click(function(e){
        $('#btnCarrito').attr('href','reservacion-producto.php');
    })

    function mostrar(){
        if (localStorage.getItem("productos") != null) {
            let array = JSON.parse(localStorage.getItem('productos'));
            if (array) {
                $('#carrito').text(array.length);
            }
        }
    }

    
	$('#app-tresd').click(function(){
        idprod = $('#app-dom').val();
        console.log(idprod);

		$.ajax({
            type : "post",
            url  : '<?php echo base_url(); ?>Controller_techbo/productotresd',
            dataType : "json", 
            data : {
                id : idprod
            },
            success: function(data){
	
				const range = document.getElementById("range");
				const img = document.getElementById("img");

				img.setAttribute("src", '<?php echo base_url();?>assets/img_producto3d/'+data[0].galeria_imagen);

				range.addEventListener("input", (e) => {
					let value = e.target.value;
					img.setAttribute("src", '<?php echo base_url();?>assets/img_producto3d/'+data[value].galeria_imagen);
				});
				range.setAttribute("max", data.length);
	
            }
        });
        return true;

    });


</script>

<style>


	  .app-container3d img {
		width: 100%;
		height: auto;
		border-radius: 4px;
		transition: all .2s ease-in-out;
	  }

      .app-container3d {
        margin: 0 auto;
        width: 300px;
        text-align: center;
        z-index: 5;
    }

      
	  #range[type="range"] {
        -webkit-appearance: none;
    margin: auto;
    width: 300px;
    display: block;
    cursor: pointer;
    background-color: transparent;
    border-radius: 50px;
    /* border: 2px solid #168eea; */
    z-index: 5;
    color: transparent;
    height: 25em;
    position: relative;
    top: -28em;
    margin-bottom: -25em;
      }
      #range[type="range"]:focus {
        outline: none;
      }

      #range[type="range"]::slider-runnable-track {
        width: 300px;
        height: 10px;
        cursor: pointer;
        box-shadow: 0px 0px 10px #000000;
        background: red;
        border-radius: 5px;
      }

      #range[type="range"]::slider-thumb {
        box-shadow: 0 0 5px #000000;
        background-color: crimson;
        height: 30px;
        width: 20px;
        border-radius: 5px;
        cursor: pointer;
        -webkit-appearance: none;
        margin-top: -11px;
      }

</style>