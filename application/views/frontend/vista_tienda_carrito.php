<div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1">Formulario de pedido</h1>
            <p>
                Revisa los productos agregados a tu carrito y completa el formulario para finalizar la compra
            </p>
        </div>
    </div>

    <!-- Start Contact -->
    <div class="container py-5">
        <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-md-8 mb-4">
          <!--Card-->
          <div class="card">
            <!--Card content-->
            <form class="card-body">
              <!--Grid row-->
              <div class="row">
                <!--Grid column-->
                <div class="col-md-6 mb-3">
                  <!--firstName-->
                  <div class="md-form ">
                    <input type="text" id="firstName" class="form-control" placeholder="Tus nombres">
                    <label for="firstName" class="">Nombres (*)</label>
                  </div>
                </div>
                <!--Grid column-->
                <!--Grid column-->
                <div class="col-md-6 mb-3">
                  <!--lastName-->
                  <div class="md-form">
                    <input type="text" id="lastName" class="form-control" placeholder="Tus apellidos">
                    <label for="lastName" class="">Apellido(s) (*)</label>
                  </div>
                </div>
                <!--Grid column-->
              </div>
              <!--Grid row-->

              <!--email-->
              <div class="md-form mb-3">
                <input type="text" id="email" class="form-control" placeholder="tucorreo@ejemplo.com">
                <label for="email" class="">Correo electronico (*)</label>
              </div>

              <!--address-->
              <div class="md-form mb-3">
                <input type="text" id="address" class="form-control" placeholder="Av. principal Nº 12345 Z/ Central">
                <label for="address" class="">Dirección (*)</label>
              </div>

              <div class="md-form mb-3">
                <input type="text" id="address-2" class="form-control" placeholder="0000000">
                <label for="address-2" class="">Numero de telefono (*)</label>
              </div>

              <hr>

              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="same-address">
                <label class="custom-control-label" for="same-address">Declaro la veracidad del formulario</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="save-info">
                <label class="custom-control-label" for="save-info">Acepto los terminos y condiciones de entrega del pedido</label>
              </div>

              <hr>
              
              <button class="btn btn-primary btn-lg btn-block" type="submit">Finalizar pedido</button>
            </form>
          </div>
          <!--/.Card-->
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-4 mb-4">
          <!-- Heading -->
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Tu carrito</span>
            <span class="badge badge-secondary badge-pill">3</span>
          </h4>

          <!-- Cart -->
          <ul class="list-group mb-3 z-depth-1">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">poleron teddy</h6>
                <small class="text-muted">Cantidad: 100 Unidades</small>
              </div>
              <span class="text-muted">bs. 5.99</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (bs.)</span>
              <strong>bs. 400</strong>
            </li>
          </ul>
          <!-- Cart -->

          <!-- Promo code -->
          <form class="card p-2">
            <div class="input-group">
              <div class="input-group-append">
                <button class="btn btn-secondary btn-md waves-effect m-0" type="button">Enviar</button>
              </div>
            </div>
          </form>
          <!-- Promo code -->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->
    </div>