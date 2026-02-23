<p>Uno de nuestros docentes considera que le podría interesar conocer la página web <strong>Eportfolio</strong>
    que le ayudará a encontrar los profesionales cuyas competencias mejor se adaptan a las necesidades de su empresa.</p>
@auth
<ul>
    <li>Nombre: {{ Auth::user()->name }}</li>
    <li>Correo electrónico: {{ Auth::user()->email }}</li>
</ul>
@endauth
<p>Para visitarnos, por favor, haga clic en el siguiente enlace:
    <a href="{{ route('home') }}">eportfolio</a></p>
</p>
