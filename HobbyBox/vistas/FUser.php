<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded-start rounded-end">
  <div class="container-fluid">
    <a class="navbar-brand" href="./indexUser.php">Mi Biblioteca</a>
    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item active">
          <a class="nav-link" aria-current="page" href="#">Buscados</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Novedades</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Amigos</a>
        </li>
      </ul>
      <form class="d-flex flex-grow-1">
        <input class="form-control me-2 flex-grow-1" type="text" placeholder="Mis Amigos">
        <button class="btn btn-default" type="submit" type="submit">
          <i class="glyphicon glyphicon-search"></i>
        </button>
      </form>
    </div>
  </div>
</nav>


<br>
<main class="bg-secondary d-flex justify-content-between rounded-start rounded-end">

<div class="contenedor1 " style="height: 600px;">
<div class="d-flex align-items-center ">
<img src="./imagenes/no-image.jpg" class="rounded-circle shadow-4"
  style="width: 150px; margin-right: 40px;" alt="Avatar" />
  <br>
  <div class=" contenedor1 d-flex justify-content-between rounded-3 p-2 " style="background-color: #efefef;">
                <div>
                    <p class="small text-muted mb-1">
                                Items
                    </p>
                    <p class="mb-0">41</p>
                </div>
                <div class="px-3">
                    <p class="small text-muted mb-1">
                                Coleccion
                    </p>
                    <p class="mb-0">976</p>
                </div>
                <div>
                    <p class="small text-muted mb-1">
                                Buesquedas
                    </p>
                    <p class="mb-0">8.5</p>
                </div>
            </div>
            </div>
    
  <?php include './vistas/tablas/tablaAmigo.php'; ?>
  </div>
   
    

<section style="padding-right: 12px; margin-top: 1%;">
  <aside class="d-flex flex-column align-items-stretch flex-shrink-0 bg-body-tertiary float-end rounded-start rounded-end"style="width: 380px;">
    <a href="/" class="d-flex align-items-center flex-shrink-0 p-3 link-body-emphasis text-decoration-none border-bottom ">
      
    <svg class="bi pe-none me-2" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-5 fw-semibold">Mis Amigos</span>
    </a>
    <div class="list-group list-group-flush border-bottom scrollarea form input" >
      <a href="#" class=" bg-dark list-group-item list-group-item-action active py-3 lh-sm" aria-current="true">
       
        <div class="d-flex w-100 align-items-center justify-content-between" >         
            <img src="./imagenes/no-image.jpg" alt="Generic placeholder image" class="img-fluid" style="width: 180px; border-radius: 10px;">
        </div>
        <div class="flex-grow-1 ms-3 " >
            <h5 class="mb-1">Danny McLoan</h5>
                <p class="mb-2 pb-1" style="color: #2b2a2a;">
                        Senior Journalist
                </p>
            <div class="d-flex justify-content-start rounded-3 p-2 mb-2" style="background-color: #efefef;">
                <div>
                    <p class="small text-muted mb-1">
                                Items
                    </p>
                    <p class="mb-0">41</p>
                </div>
                <div class="px-3">
                    <p class="small text-muted mb-1">
                                Coleccion
                    </p>
                    <p class="mb-0">976</p>
                </div>
                <div>
                    <p class="small text-muted mb-1">
                                Buesquedas
                    </p>
                    <p class="mb-0">8.5</p>
                </div>
            </div>
            <div class="d-flex w-100 align-items-center justify-content-between btn btn-outline-secondary">
                <button type="button" class="btn btn-outline-primary me-1 flex-grow-1">
                            Chat
                </button> 
            </div>           
        </div>
   
      </a>

      <a href="#" class=" bg-dark list-group-item list-group-item-action py-3 lh-sm">
        
      <div class="d-flex w-100 align-items-center justify-content-between" >         
            <img src="./imagenes/no-image.jpg" alt="Generic placeholder image" class="img-fluid" style="width: 180px; border-radius: 10px;">
        </div>
        <div class="flex-grow-1 ms-3 " >
            <h5 class="mb-1">Danny McLoan</h5>
                <p class="mb-2 pb-1" style="color: #2b2a2a;">
                        Senior Journalist
                </p>
            <div class="d-flex justify-content-start rounded-3 p-2 mb-2" style="background-color: #efefef;">
                <div>
                    <p class="small text-muted mb-1">
                                Articles
                    </p>
                    <p class="mb-0">41</p>
                </div>
                <div class="px-3">
                    <p class="small text-muted mb-1">
                                Followers
                    </p>
                    <p class="mb-0">976</p>
                </div>
                <div>
                    <p class="small text-muted mb-1">
                                Rating
                    </p>
                    <p class="mb-0">8.5</p>
                </div>
            </div>
            <div class="d-flex w-100 align-items-center justify-content-between btn btn-outline-secondary">
                <button type="button" class="btn btn-outline-primary me-1 flex-grow-1">
                            Chat
                </button> 
            </div>           
        </div>

      </a>

      
    </div>
</aside>
</section>

</main>




                        
                        
                        


                        

