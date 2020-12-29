<hr>

<footer class="footer-distributed">

			<div class="footer-left">

				<img src="{{Storage::url("logo2.png")}}" alt=""/>

				<p class="footer-links">
					<a href="{{ route('home') }}">Inicio</a> |
					<a href="{{ route('servicios') }}">Servicios</a> |
					<a href="{{ route('acerca') }}">Acerca de Nosotros</a> |
					<a href="{{ route('contactanos') }}">Contáctanos</a>
				</p>

				<p class="footer-company-name">© {{ date('Y') }} CeSVet, Centro de Servicios Veterinarios</p>
			</div>

			<div class="footer-center">

				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>Calle Héctor Israel Ortiz Ortiz</span> <span>S/N Colonia Nuevo Progreso</span>Huamantla Tlaxcala</p>
				</div>

				<div>
					<i class="fa fa-phone"></i>
					<p>01 52 247 100 0073 </p>
				</div>

				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:support@company.com">cesvet@gmail.com</a></p>
				</div>

			</div>

			<div class="footer-right">

				<p class="footer-company-about">
					<span>Acerca de Nosotros</span>
					Somos un equipo multidiciplinario de Medicos Veterinarios y personal capacitado para la atención integral de las mascotas.<br>
					<a href="{{ route('terminos') }}">Términos y Condiciones</a>

				</p>

				<div class="footer-icons">

					<a href="#"><i class="fab fa-facebook"></i></a>
					<a href="#"><i class="fab fa-instagram"></i></a>
					<a href="#"><i class="fab fa-whatsapp"></i></a>
					<a href="#"><i class="fa fa-envelope"></i></a>

				</div>

			</div>

		</footer>