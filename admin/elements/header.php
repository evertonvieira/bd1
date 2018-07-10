<nav class="navbar navbar-inverse">
    <div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Gerenciador de Notícias</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
        <li class="active"><a href="<?php get_home();?>/admin/index.php">Home</a></li>
        <li><a href="<?php get_home();?>/admin/categorias.php">Categorias</a></li>
        <li><a href="<?php get_home();?>/admin/noticias.php">Notícias</a></li>
        </ul>
    </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="modal fade" id="confirm-delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Confirmar ação</h4>
      </div>
      <div class="modal-body">
        <p>Tem certeza que deseja excluir?</p>
        <p>Todos os registros relacionado a ele também serão deletados!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <a href="#" class="btn btn-danger danger">Deletar</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
  $('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
  })
</script>


