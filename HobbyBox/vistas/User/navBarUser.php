<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded-start rounded-end">
  <div class="container-fluid">
    <a class="navbar-brand nav-link" href="#" id="enlace-bibliotecas">Mi Biblioteca</a>
    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item active">
            <a id="enlace-buscados" class="nav-link active" aria-current="page" href="#">Deseados</a>
        </li>
        <li class="nav-item">
            <a id="enlace-amigos" class="nav-link active" href="#">Amigos</a>
        </li>
    </ul>
      <form class="d-flex ms-auto mb-2 mb-lg-0 flex-grow-1" action="buscarAmigos.php" method="post">
      <input class="form-control me-2" type="search" name ="fSearch2" placeholder="Buscar Amigos..." aria-label="Search">
      <button class="btn btn-outline-secondary" type="submit">Buscar</button>
        </button>
      </form>
    </div>
  </div>
</nav>


