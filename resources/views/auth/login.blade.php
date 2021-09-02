<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Title -->
    <title>UNPRG | PedritoBot</title>

    <!-- Metadata -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Favicon -->
    <link
      rel="icon"
      type="image/png"
      href="{{ asset('images/icons/PedritoBot-ico-negative.ico') }}"
    />

    <!-- Icons -->
    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}"
    />

    <!-- Animations -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />

    <!-- Others Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}" />
  </head>
  <body>
    <!-- Body -->
    <div class="limiter">
      <div
        class="container-login100"
        style="background-image: url('{{asset('images/background-image.jpg')}}')"
      >
        <div class="wrap-login100">
          <form class="login100-form validate-form">
            <div class="login100-form-avatar m-t-20 m-b-20">
              <img
                src="{{asset('images/PedritoBot-negative.svg')}}"
                alt="Logotipo PedritoBot"
				class="animate__animated animate__pulse animate__infinite"
              />
            </div>

            <p class="login100-form-description p-b-30 txt1">
              Te presentamos a <strong>PedritoBot</strong>, un asistente virtual
              que responderá tus dudas con respecto a tu institución.
            </p>

            <div class="container-login100-form-btn p-t-10">
              <a href="{{url('/auth/google/redirect')}}" class="login100-form-btn" style="text-decoration: none">
                <img
                  src="{{asset('images/icons/icon-google.svg')}}"
                  alt="Ícono de Google"
                  class="p-r-5"
                />
                Ingresar con Correo Institucional
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
